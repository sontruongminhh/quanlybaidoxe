<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{


    protected $table = 'pricing_rules';
    protected $primaryKey = 'pricing_ruleid';
    
    protected $fillable = [
        'price_per_hour',
        'vehicleid',
        'monthly_price'
    ];

    // Nếu không sử dụng timestamps (created_at, updated_at)
    public $timestamps = false;

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicleid');
    }
}
