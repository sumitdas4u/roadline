<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'PagesController@index');
Route::get('/new-enquiry', 'PagesController@enquiry_popoup');

Route::get('change-password', 'Auth\ChangePasswordController@index');
Route::post('change-password', 'Auth\ChangePasswordController@store')->name('change.password');
// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Auth::routes(['verify' => true]);

/*Route::group(['middleware'=>'user'], function()
{

    //Write you route here
}*/
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/password/change', 'PagesController@passwordChange')->name('password-change');
Route::get('/owner/registration', 'PagesController@ownerRegistration');
Route::post('/owner/registration', 'Auth\RegisterController@createOwner')->name('register-owner');


