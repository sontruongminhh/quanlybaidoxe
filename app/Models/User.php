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
        'remember_token',
        'password',
        'role',
        'name',
        'phone',
        'address',
        'image'
    ];

    const ROLE = [
        "ADMIN" => 1,
        "STAFF" => 0
    ];
    
}
