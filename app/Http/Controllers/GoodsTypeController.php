<?php

namespace App\Http\Controllers;

use App\GoodsType;
use App\Http\Helper\ResponseBuilderHelper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class GoodsTypeController extends BaseController
{

    public function goodstypes()

    {

        $goods = GoodsType::all();
       return  ResponseBuilderHelper::result('list of all goods types',200,$goods);


    }
}
