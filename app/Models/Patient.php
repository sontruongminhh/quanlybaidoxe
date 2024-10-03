<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $primaryKey = 'PatientID';
    public $timestamps = false;

    protected $fillable = [
        'FullName',
        'Dod',
        'Gender',
        'Address',
        'Phone',
        'Email',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'CreatedAt',
        'UpdatedAt'
    ];
}
