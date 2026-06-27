<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['order_id', 'product_id', 'quantity', 'harga_rupiah'])]

class OrderDetail extends Model
{
    protected $table = 'order_details';
}
