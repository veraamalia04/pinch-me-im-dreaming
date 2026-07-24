<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function transferBoxToOrder(){
        $userLoggedId = Auth::id();
        $user = User::where('id', $userLoggedId)->first();

        if(!$user->box || $user->box->details->isEmpty()) return back('error', 'Tidak ada produk dalam box');

        $order = $user->orders()->create(['user_id', $user->id, 'pemesanan_pada' => now()]);

        foreach($user->box->details as $detail) {

            $order->details()->create([
                'product_id' => $detail->product_id,
                'quantity' => $detail->quantity,
                'harga_rupiah' => $detail->product->current_price,
            ]);
        }

        $deleteBox = $user->box->details()->delete();

        return back()->with('success', 'Produk di order');
    }
}
