<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Role extends Model
{
    protected $table = 'roles';

    public function users() {
        return $this->belongsToMany(User::class, 'role_users', 'role_id', 'user_id')
        ->withPivot(['name'])
        ->withTimestamps();
    }
}
