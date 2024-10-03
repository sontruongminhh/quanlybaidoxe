<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDetail extends Model
{
    use HasFactory;

    protected $table = 'prescription_details';
    protected $primaryKey = 'DetailID';
    public $timestamps = false;

    protected $fillable = [
        'PrescriptionID',
        'MedicineID',
        'Quantity',
        'Dosage',
        'Instructions',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'CreatedAt',
        'UpdatedAt'
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'PrescriptionID');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'MedicineID');
    }
}
