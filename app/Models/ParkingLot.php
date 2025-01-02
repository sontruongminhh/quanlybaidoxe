<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    protected $table = 'parking_lots'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'parkingid'; // Khóa chính của bảng
    public $timestamps = true; // Để sử dụng 'create_at' và 'update_at'

    protected $fillable = [
        'name',
        'location',
        'total_slots',
        'managerid',
        // 'create_at',
        // 'update_at'
    ];

    // Quan hệ với model ParkingSlot
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'parkingid', 'parkingid');
    }

    public function parkingSlots()
    {
        return $this->hasMany(ParkingSlot::class);
    }
}
