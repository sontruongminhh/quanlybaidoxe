<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $table = 'medical_records';
    protected $primaryKey = 'RecordID';
    public $timestamps = false;

    protected $fillable = [
        'PatientID',
        'DoctorID',
        'DepartmentID',
        'AppointmentID',
        'ServiceID',
        'RecordDate',
        'Diagnosis',
        'Prescription',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'RecordDate',
        'CreatedAt',
        'UpdatedAt'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID', 'PatientID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID', 'DoctorID');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'AppointmentID', 'AppointmentID');
    }

    public function service()
    {
        return $this->belongsTo(MedicalService::class, 'ServiceID', 'ServiceID');
    }
}
