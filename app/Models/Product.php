<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'deskripsi', 'foto'])]
class Product extends Model
{
    use HasUlids;
    protected $table = 'products';

    public function prices(){
        return $this->hasMany(ProductPrice::class, 'product_id');
    }
}
