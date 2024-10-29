<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'logid'; // Khóa chính của bảng
    public $timestamps = true; // Laravel sẽ quản lý 'create_at' và 'update_at'

    protected $fillable = [
        'userid',
        'vehicleid',
        'action',
        'details',
        'create_at'
    ];

    // Quan hệ với bảng users (người dùng thực hiện hành động)
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');
    }

    // Quan hệ với bảng vehicles (xe liên quan đến hành động)
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicleid', 'vehicleid');
    }
}
