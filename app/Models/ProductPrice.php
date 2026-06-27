<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['product_id', 'harga_rupiah'])]
class ProductPrice extends Model
{
    protected $table = 'product_prices';
}
