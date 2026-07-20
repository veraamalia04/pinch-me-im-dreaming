<?php

namespace App\Models;

use App\Models\BoxDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

#[Fillable('user_id')]
#[Appends(['total_harga'])]
class Box extends Model
{
    use HasUlids;
    protected $table = 'boxes';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details(){
        return $this->hasMany(BoxDetail::class, 'box_id');
    }

    public function getTotalHargaAttribute(){
        return $this->details->sum('sub_total');
    }
}
