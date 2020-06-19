<?php

namespace App;

use App\Traits\HasGoodsTypes;
use App\Traits\HasPayments;
use App\Traits\HasProducts;
use App\Traits\HasQuotations;
use App\Traits\HasUsers;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use hasUsers,hasProducts,HasGoodsTypes,HasQuotations,HasPayments;
    protected $fillable = ['id',
        'truck_type_id', 'goods_type_id', 'user_id',
        'pickup_address', 'drop_address', 'shipment_date',
        'shipment_weight', 'status'
    ];
    protected $casts = [
        'goods_type_id' => 'array'
    ];
    protected $appends = ['user_name','product_name','goods_types_list'];

    public function getStatusAttribute()
    {
        if (count($this->payment)>0){
            return "Payment";
        }elseif( count($this->quotation)>0){
        return "Quotation";
        } else{
            return "Pending";
        }
    }
}
