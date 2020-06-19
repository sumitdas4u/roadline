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
Route::post('email-exists', 'UserController@emailExists');
Route::post('mobile-login', 'Auth\LoginController@loginMobile');
Route::post('mobile-registration', 'Auth\RegisterController@createWithTempPassword');
Route::get('goods-types', 'GoodsTypeController@goodstypes');


Route::put('categories/update/status', 'CategoriesController@statusUpdateApi')->name('categories.update.status');
Route::put('attribute/update/status', 'AttributeController@statusUpdateApi')->name('attribute.update.status');

Route::put('attribute/value/update/status', 'AttributeController@valueStatusUpdateApi')->name('attribute.value.update.status');


Route::get('product/list/{id?}', 'ProductController@productListApi')->name('product.list');
Route::get('category/list', 'CategoriesController@categoryListApi')->name('category.list');
Route::put('product/update/status', 'ProductController@statusUpdateApi')->name('product.update.status');
Route::post('enquiry/create ', 'EnquiryController@store')->name('product.api.store');

