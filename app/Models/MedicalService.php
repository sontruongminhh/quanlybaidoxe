<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalService extends Model
{
    use HasFactory;
    protected $table = 'medical_services';
    protected $primaryKey = 'ServiceID';
    public $timestamps = false;

    protected $fillable = [
        'ServiceName',
        'Description',
        'Price'
    ];
}
