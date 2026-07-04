<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['box_id', 'product_id', 'quantity'])]
class BoxDetail extends Model
{
    protected $table = 'box_details';

    public function box(){
        return $this->belongsTo(Box::class, 'box_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
