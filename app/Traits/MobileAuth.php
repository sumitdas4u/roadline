<?php

namespace  App\Traits;
use App\MobileVerification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait MobileAuth {

    public function mobileLogin(Request $request)
    {
        // Check validation

        $this->validate($request, [
            'mobile' => 'required|regex:/[0-9]{10}/|digits:10',
            'code' => 'required'
        ]);

        $mobile_verification=  MobileVerification::where(['mobile' => $request['mobile'],'code'=>$request['code']]);
        if ($mobile_verification->first()){
            // Get user record
            $user = User::where('mobile', $request['mobile'])->first();
            if(empty($user->mobile)) {
                return null;
            }
            // Set Auth Details
           // Auth::login($user);
            return $user ;
        }else{
            return  null;
        }
    }

    protected function createWithMobile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'integer', 'min:10', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return $validator->errors()->getMessages();
        }

        $temp_password = Str::random(12); //generates random 12 characters long string

        $user= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'password' => Hash::make($temp_password),
            'password_change_at' =>null,
            'role'=>0
        ]);
        //data to be used in mail
        $data['subject']            = 'Login Details'; //$this->getEmailSubject();
        $data['email']              = $request['email'];
        $data['temp_password']      = $temp_password;

        //send mail to user
        Mail::send('emails.password_reminder', $data, function($message) use ($data)
        {
            $message->from('noreply@loadline.in', $data['subject']);
            $message->subject($data['subject']);
            $message->to($data['email']);
        });
        return $user;

    }

}
