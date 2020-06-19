<?php

namespace App;

use App\Traits\HasGoodsTypes;
use App\Traits\HasPayments;
use App\Traits\HasProducts;
use App\Traits\HasUsers;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use hasUsers,hasProducts,HasGoodsTypes,HasPayments;
    protected $fillable = [
        'enquiry_id','truck_type_id', 'goods_type_id', 'user_id',
        'pickup_address', 'drop_address', 'shipment_date','price','notes',
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
        } else{
            return "Pending";
        }
    }
}
