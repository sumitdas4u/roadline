<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helper\ResponseBuilderHelper;
use App\MobileVerification;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Traits\MobileAuth;

class LoginController extends Controller
{
    use MobileAuth;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function loginMobile(Request $request)
    {
         $user= $this->mobileLogin($request);

            if($user !=null){
                    return  ResponseBuilderHelper::result('login with mobile',200,$user);
                }else{
            return  ResponseBuilderHelper::result('Your code  or mobile no not  match in our system..!!',404);
            }
    }
}
