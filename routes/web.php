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

Route::get('/', function () {
    return view('date');
});

/*
|------------------------
|--- user login route ---
|------------------------
*/


/*
|--user login  route
*/

Route::get('user/login','Admin\LoginController@loginView')->name('user.login');
Route::post('user/logincheck','Admin\LoginController@userLogin')->name('user.logincheck');
Route::get('user/signup','Admin\LoginController@signUp')->name('user.signup');
Route::post('user/register','Admin\LoginController@store')->name('user.register');

Route::get('date/add','Admin\DateController@create')->name('date');
Route::post('date/store','Admin\DateController@store')->name('date.store');
Route::get('date/edit/{user_id}','Admin\DateController@edit')->name('date.edit');





Route::group(['middleware' => ['admin']], function () {

Route::get('role/add','Admin\RoleController@create')->name('role.add');
Route::post('role/store','Admin\RoleController@store')->name('role.store');
Route::get('role/show','Admin\RoleController@index')->name('role.show');
Route::get('role/edit/{role_id}','Admin\RoleController@edit')->name('role.edit');
Route::post('role/update/{role_id}','Admin\RoleController@update')->name('role.update');
Route::get('role/delete/{role_id}','Admin\RoleController@destroy')->name('role.delete');

Route::get('user/add','Admin\UserController@create')->name('user.add');
Route::post('user/store','Admin\UserController@store')->name('user.store');
Route::get('user/show','Admin\UserController@index')->name('user.show');
Route::get('user/edit/{user_id}','Admin\UserController@edit')->name('user.edit');
Route::post('user/update/{user_id}','Admin\UserController@update')->name('user.update');
Route::post('user/imageupdate/{user_id}','Admin\UserController@updateImage')->name('userimage.update');
Route::get('user/delete/{user_id}','Admin\UserController@destroy')->name('user.delete');


Route::get('manager/add','Admin\ManagerController@create')->name('manager.add');
Route::post('manager/store','Admin\ManagerController@store')->name('manager.store');
Route::get('manager/show','Admin\ManagerController@index')->name('manager.show');
Route::get('manager/edit/{manager_id}','Admin\ManagerController@edit')->name('manager.edit');
Route::post('manager/update/{manager_id}','Admin\ManagerController@update')->name('manager.update');
Route::get('manager/delete/{manager_id}','Admin\ManagerController@destroy')->name('manager.delete');

Route::get('user/logout','Admin\LoginController@logout')->name('user.logout');


});







