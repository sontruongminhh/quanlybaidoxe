<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $primaryKey = 'AppointmentID';
    public $timestamps = false;

    protected $fillable = [
        'PatientID',
        'DoctorID',
        'AppointmentDate',
        'Description',
        'Status',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'AppointmentDate',
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
}
