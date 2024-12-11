<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'reservationid'; // Khóa chính của bảng
    public $timestamps = false; // Laravel sẽ quản lý 'create_at' và 'update_at'

    protected $fillable = [
        'customerid',
        'parking_slotid',
        'reservation_time',
        'start_time',
        'end_time',
        'status'
    ];

    // Quan hệ với bảng users (khách hàng)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customerid', 'userid');
    }

    // Quan hệ với bảng parking_slots (chỗ đỗ xe)
    public function parkingSlot()
    {
        return $this->belongsTo(ParkingSlot::class, 'parking_slotid', 'parking_slotid');
    }
}
