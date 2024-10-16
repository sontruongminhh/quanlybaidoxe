<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    protected $table = 'parking_slots'; // Tên bảng
    protected $primaryKey = 'parking_slotid'; // Khóa chính
    public $timestamps = true; // Sử dụng 'create_at' và 'update_at'

    protected $fillable = [
        'slot_number',
        'status',
        'vehicleid',
        'position_x',
        'position_y',
        'create_at',
        'update_at'
    ];

    // Quan hệ với model Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicleid', 'vehicleid');
    }

    // Quan hệ với model ParkingLot
    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class, 'parkingid', 'parkingid');
    }
}
