<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function transferBoxToOrder(){
        $userLoggedId = Auth::id();
        $user = User::where('id', $userLoggedId)->first();

        if(!$user->box || $user->box->details->isEmpty()) return back('error', 'Tidak ada produk dalam box');

        $order = Order::firstOrCreate(['user_id', $user->id, 'pemesanan_pada' => now()]);

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
