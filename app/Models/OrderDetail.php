<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'float',
        // 'discount_on_medicaldevice' => 'float',
        // 'total_add_on_price' => 'float',
        'tax_amount' => 'float',
        'medical_device_id' => 'integer',
        'order_id' => 'integer',
        'quantity' => 'integer',
    ];

    protected $primaryKey   = 'id';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function medicaldevice()
    {
        return $this->belongsTo(MedicalDevice::class, 'medical_device_id');
    }
}
