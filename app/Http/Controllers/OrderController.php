<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function transferBoxToOrder(){
        $userLoggedId = Auth::id();
        $user = User::with('addresses')->where('id', $userLoggedId)->first();
        $activeAddress = $user->addresses()->where('is_active', true)->first();

        if($activeAddress === null) return back('error', 'Tidak ada alamat utama');
        if(!$user->box || $user->box->details->isEmpty()) return back('error', 'Tidak ada produk dalam box');

        $order = $user->orders()->create([
            'user_id', $user->id, 
            'pemesanan_pada' => now(),
            'address_id' => $activeAddress->id,
        ]);

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

    public function menandaiDiproses(Order $order){
        $order = $order->update(['pemrosesan_pada' => now()]);

        return back()->with('success', 'Order ditandai sedang diproses');
    }

    public function mengirimOrder(Order $order){
        $order = $order->update(['pengiriman_pada' => now()]);

        return back()->with('success', 'Order ditandai sedang dikirim');
    }

    public function menandaiSelesai(Order $order){
        $userLoggedId = Auth::id();

        if(!$order->pengiriman_pada || !$order->pemrosesan_pada || $order->selesai_pada) return back()->with('error', 'Tidak bisa melakukan ini');
        if($userLoggedId != $order->user_id) return back()->with('error', 'Tidak bisa melakukan ini');
        $order = $order->update(['selesai_pada' => now()]);

        return back()->with('success', 'Order telah selesai');
    }
}
