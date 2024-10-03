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
    protected $primaryKey = 'UserID';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'Remember_token',
        'password',
        'Admin',
        'Created_at',
        'Updated_at'
    ];

    protected $dates = ['Created_at', 'Updated_at'];

    const ROLE = [
        "ADMIN" => 1,
        "DOCTOR" => 0
    ];

    // If you want Laravel to handle the timestamps
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';
}
