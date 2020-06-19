<?php

namespace App\Http\Controllers;

use App\Enquiry;

use App\Http\Helper\ResponseBuilderHelper;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\MobileAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        DB::beginTransaction();

        try {
           Enquiry::create([

                'truck_type_id' => $request->truck_type_id,
                'goods_type_id' => collect($request->goods_type_id)->pluck('id'),
                'user_id' => $user_id,
                'pickup_address' => $request->pickup_address,
                'drop_address' =>  $request->drop_address,
                'shipment_date' => $request->shipment_date,
                'shipment_weight' =>  $request->shipment_weight,
                'status' => 1
            ]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return  ResponseBuilderHelper::result('Enquiry created',200,$e->getMessage());


        }

        return  ResponseBuilderHelper::result('Enquiry created',200);





    }

    public function index()
    {

        if(Auth::user()->hasRole('admin')){
            $enquiries = Enquiry::paginate(15);
        }else{
            $enquiries = Enquiry::where('user_id',Auth::user()->id)->paginate(15);
        }

        $page_title = 'Enquiries';
        $page_description = 'List of all enquiries';
    //   echo  json_encode($enquiries);
        return view('pages.enquiry.list', compact('page_title', 'page_description','enquiries'));

    }

/*
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
