<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'userid';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
        'role',
        'name',
        'phone',
        'address',
        'image',
        'status',
        'email_verified_at',
        'remember_token'
    ];

    const ROLE = [
        "ADMIN" => 1,
        "STAFF" => 0,
        "CUSTOMER" => 3
    ];
    
}
