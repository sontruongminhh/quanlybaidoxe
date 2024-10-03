<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $primaryKey = 'DoctorID';
    public $timestamps = false;

    protected $fillable = [
        'FullName',
        'Specialization',
        'Address',
        'Phone',
        'Email',
        'CreatedAt',
        'UpdatedAt',
        'UserID'
    ];

    protected $dates = [
        'CreatedAt',
        'UpdatedAt'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
}
