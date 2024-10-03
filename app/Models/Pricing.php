<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $table = 'pricing';
    protected $primaryKey = 'PricingID';
    public $timestamps = false;

    protected $fillable = [
        'ServiceID',
        'Description',
        'Price',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'CreatedAt',
        'UpdatedAt'
    ];

    public function service()
    {
        return $this->belongsTo(MedicalService::class, 'ServiceID');
    }
}
