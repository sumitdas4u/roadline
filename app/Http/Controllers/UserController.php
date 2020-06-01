<?php

namespace App\Http\Controllers;

use App\Http\Helper\smsSenderHelper;
use App\MobileVerification;
use App\Rules\MatchOldPassword;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\User;
use App\ChatMetaData;
use App\Http\Helper\ResponseBuilderHelper;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    private  $currentUser;
    public function __construct()
    {        //
      //  $this->currentUser =Auth::user();
    }

    public function emailExists(Request $request)
    {
        $email=  User::where('email', '=', $request->email)
            ->first();

        if(!is_null($email)) {
            return  ResponseBuilderHelper::result('user name already in use',200,true);
        }else{
            return  ResponseBuilderHelper::result('user name is new',200,false);

        }

    }

    function verifyMobile(Request $request){

        $this->validate($request, [
            'mobile' => 'required',
            'code' => 'required'
        ]);

        $mobile_verification=  MobileVerification::where(['mobile' => $request['mobile'],'code'=>$request['code']]);
        if ($mobile_verification->first()){
            //$mobile_verification->delete(); // after verification delete the code
            return response()->json(array(
                'valid' => true,
            ));
         //   return  ResponseBuilderHelper::result('successfully code matched',200,$mobile_verification->first());
        }else{
            return response()->json(array(
                'valid' => false,
            ));

        }


    }

    function sendOtp(Request $request){
        $request->validate([
            'mobile' => 'required',
            'country_code' => 'required'
        ]);


        $otp = rand(1000, 9999);

        $mobile_verification = MobileVerification::updateOrInsert(['mobile' => $request['mobile']],['mobile' => $request['mobile'],'code'=>$otp]);
        $sendSMS= new smsSenderHelper();

        if(!$sendSMS->sendSMS($otp,$request['country_code'].$request['mobile'])['error'])
        {
            return  ResponseBuilderHelper::result('code has been generated and sent to user\'s phone number',200);
        }
        else
        {
            return  ResponseBuilderHelper::result('Something really went wrong.',400);

        }

    }

    //
}
