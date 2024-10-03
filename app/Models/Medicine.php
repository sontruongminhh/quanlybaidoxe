<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    
    protected $table = 'medicines';
    protected $primaryKey = 'MedicineID';
    public $timestamps = false;

    protected $fillable = [
        'MedicineName',
        'Description',
        'Manufacturer',
        'DosageForm',
        'Unit',
        'PricePerUnit',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'CreatedAt',
        'UpdatedAt'
    ];
}
