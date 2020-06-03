<?php

namespace App\Http\Controllers;

use App\Enquiry;

use App\Http\Helper\ResponseBuilderHelper;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\MobileAuth;

class EnquiryController extends BaseController
{
    use MobileAuth;

    public function store(Request $request)
    {

        if( $request->mobile_login != 'true')
        {
            $user = $this->createWithMobile($request);

            if($user instanceof User) {
                $user_id=$user->id;
            }else{
                return  $user;
            }

        }else{

            $user_id=$request->user_id;
        }

        $enquiry=Enquiry::create([

            'truck_type_id' => $request->truck_type_id,
            'goods_type_id' => [$request->goods_type_id],
            'user_id' => $user_id,
            'pickup_address' => $request->pickup_address,
            'drop_address' =>  $request->drop_address,
            'shipment_date' => '12-12-12',
            'shipment_weight' =>  $request->shipment_weight,
            'status' => 1
        ]);


        return  ResponseBuilderHelper::result('Enquiry created',200,$enquiry);

    }
/*
    public function index()
    {
        return new PostCollection(Post::all());
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response()->json('successfully deleted');
    }*/


}
