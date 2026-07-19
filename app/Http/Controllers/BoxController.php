<?php

namespace App\Http\Controllers;

use App\Http\Requests\Box\StoreRequest;
use App\Models\Box;
use App\Models\BoxDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public function storeToBox(StoreRequest $request){
        $userLoggedId = Auth::id();

        $user = User::where('id', $userLoggedId)->first();

        $box = Box::firstOrCreate(['user_id' => $user->id]);

        $data = $request->validated();

        $detail = $box->details()->where('product_id', $data['product_id'])->first();

        if($detail) {
            $detail->increment('quantity', $data['quantity']);
        } else{

            $detail = $box->details()->create([
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
            ]);
        }

        return back()->with('success', 'Kue cubit berhasil dimasukkan ke dalam box');
    }

    public function subtractOneFromBox(BoxDetail $detail){
        if ($detail->quantity > 1){
            $detail->decrement('quantity');
        } else {
            $detail->delete();
        }

        return back()->with('success', 'Kue cubit berhasil dikurangkan');
    }

    public function deleteBoxDetail(BoxDetail $detail){
        $detail->delete();

        return back()->with('success', 'Kue cubit dihapus dari ');
    }


}
