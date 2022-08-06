<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    //use HasFactory;
    protected $table   = 'users';
    protected $hidden  = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles','user_id','role_id');
    }
}
