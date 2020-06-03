<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('get-otp', 'UserController@sendOtp');
Route::post('match-otp', 'UserController@verifyMobile');
Route::post('mobile-login', 'Auth\LoginController@loginMobile');
Route::post('mobile-registration', 'Auth\RegisterController@createWithTempPassword');
Route::get('goods-types', 'GoodsTypeController@goodstypes');
Route::resource('enquiry', 'EnquiryController');
