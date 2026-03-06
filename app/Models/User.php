<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, softDeletes;


    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'fullname',
        'role_id',
        'created_at',
        'update_at',
    ];

    protected $dates = ['deleted_at'];

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

}