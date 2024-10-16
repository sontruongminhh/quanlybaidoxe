<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles'; // Tên bảng
    protected $primaryKey = 'vehicleid'; // Khóa chính
    public $timestamps = true; // Sử dụng 'create_at' và 'update_at'

    protected $fillable = [
        'ownerid',
        'license_plate',
        'vehicle_type',
        'entry_time',
        'exit_time',
        'parkingid',
        'parking_slotid',
        'create_at',
        'update_at'
    ];

    // Quan hệ với model ParkingSlot
    public function parkingSlot()
    {
        return $this->belongsTo(ParkingSlot::class, 'parking_slotid', 'parking_slotid');
    }

    // Quan hệ với model ParkingLot
    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class, 'parkingid', 'parkingid');
    }
}
