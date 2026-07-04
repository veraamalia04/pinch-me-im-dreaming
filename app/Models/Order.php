<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'pemesanan_pada', 'pemrosesan_pada', 'pengiriman_pada', 'selesai_pada'])]
class Order extends Model
{
    use HasUlids;
    protected $table = 'orders';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    
}
