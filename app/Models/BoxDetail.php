<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['box_id', 'product_id', 'quantity'])]
class BoxDetail extends Model
{
    protected $table = 'box_details';
}
