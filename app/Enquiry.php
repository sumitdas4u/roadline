<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'truck_type_id', 'goods_type_id', 'user_id',
        'pickup_address', 'drop_address', 'shipment_date',
        'shipment_weight', 'status'
    ];
    protected $casts = [
        'goods_type_id' => 'array'
    ];
}
