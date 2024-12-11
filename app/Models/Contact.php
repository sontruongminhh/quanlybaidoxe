<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'contactid';
    public $timestamps = false;

    protected $fillable = [
        'userid',
        'subject',
        'message',
        'contact_time',
        'status',
        'response',
        'response_time',
    ];

    // Quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');
    }
}
