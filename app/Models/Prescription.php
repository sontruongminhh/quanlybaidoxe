<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';
    protected $primaryKey = 'PrescriptionID';
    public $timestamps = false;

    protected $fillable = [
        'PatientID',
        'DoctorID',
        'AppointmentID',
        'PrescriptionDate',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'CreatedAt',
        'UpdatedAt'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'AppointmentID');
    }
}
