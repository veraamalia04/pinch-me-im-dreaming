<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['order_id', 'product_id', 'quantity', 'harga_rupiah'])]

class OrderDetail extends Model
{
    protected $table = 'order_details';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
