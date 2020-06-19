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
Route::get('/', 'PagesController@index');

Route::get('/new-enquiry', 'PagesController@enquiry_popoup');

Route::get('/change-password', 'Auth\ChangePasswordController@index');
Route::post('/change-password', 'Auth\ChangePasswordController@store')->name('change.password');


// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Auth::routes(['verify' => true]);

/*Route::group(['middleware'=>'user'], function()
{

    //Write you route here
}*/
Route::group(['middleware'=>'auth'], function()
{
Route::get('/owner/registration', 'PagesController@ownerRegistration');
Route::post('/owner/registration', 'Auth\RegisterController@createOwner')->name('register-owner');


    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/password/change', 'PagesController@passwordChange')->name('password-change');

     Route::middleware(['role:admin'])->group(function () {
         Route::resources([
             'categories' => 'CategoriesController',
             'attribute' => 'AttributeController',
             'product' => 'ProductController',
         ]);
     });


    Route::resources([
        'enquiry' => 'EnquiryController',
        'quotation' => 'QuotationController',
        'payment' => 'PaymentController',
    ]);

 /*   Route::middleware(['role:admin'])->group(function () {
        Route::get('/categories/filter/search', 'CategoriesController@search')->name('category-search');

    });*/
    Route::get('/categories/filter/search', 'CategoriesController@search')->name('category-search');
    Route::get('/attribute/filter/search', 'AttributeController@search')->name('attribute-search');
    Route::get('/attribute/values/{id}', 'AttributeController@createValues')->name('attribute-values');
    Route::post('/attribute/values/{id}/store', 'AttributeController@storeValues')->name('attribute-values-create');
    Route::get('/attribute/values/{id}/index', 'AttributeController@indexValue')->name('attribute-values-index');
    Route::get('/attribute/values/{id}/edit', 'AttributeController@editValues')->name('attribute-values-edit');
    Route::put('/attribute/values/{id}/update', 'AttributeController@updateValues')->name('attribute-values-update');
    Route::delete('/attribute/values/{id}/delete', 'AttributeController@deleteValues')->name('attribute-values-delete');
    Route::get('/product/filter/search', 'ProductController@search')->name('product-search');
});
/*

Route::middleware(['auth'])->group(function () {

role:ROLE_SUPERADMIN
    //Routes available to all users
    Route::get('leave-type',['as'=>'leave.type', 'uses'=>'LeaveController@getLeaveType']);

    //Routes available to employees
    Route::middleware(['role:employee'])->group(function () {

    });

    //Routes available to Admin, HR Manager and Manager
    Route::middleware(['role:admin|hr-manager|manager'])->group(function () {
        Route::get('employee', ['as'=>'employee', 'uses'=>'EmployeeController@employeeList']);
    });
});*/
