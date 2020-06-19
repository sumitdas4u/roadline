<?php

namespace App;

use App\Traits\HasGoodsTypes;
use App\Traits\HasProducts;
use App\Traits\HasUsers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use hasUsers;
    protected $fillable = [
        'enquiry_id','quotation_id', 'user_id', 'amount',
        'payment_date', 'payment_mode', 'status'
    ];
    protected $appends = ['user_name'];

    protected $dates = [
        'payment_date',
    ];

}
