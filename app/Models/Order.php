<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['user_id', 'pemesanan_pada', 'pemrosesan_pada', 'pengiriman_pada', 'selesai_pada'])]
#[Appends(['total_harga', 'status'])]
class Order extends Model
{
    use HasUlids, SoftDeletes;
    protected $table = 'orders';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function getTotalHargaAttribute(){
        return $this->details->sum('sub_total');
    }

    public function getStatusAttribute(): string{
        if($this->selesai_pada) return 'Selesai';
        if($this->pengiriman_pada) return'Dikirim';
        if($this->pemrosesan_pada) return 'Diproses';

        return 'Dipesan';
    }

    public function scopeToday(): Builder{
        return $this->whereDate('create_at', today());
    }
}
