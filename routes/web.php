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
    return view('welcome');
});
Route::get('log-in','LoginController@logform')->name('log.in');
Route::post('signup','LoginController@index')->name('signup');
Route::get('login','LoginController@login')->name('login');
Route::any('do-login','LoginController@dologin')->name('do.login');
Route::any('user-logout','LoginController@logout')->name('user.logout');




Route::get('admin-login','AdminController@index')->name('admin.login');
Route::any('admin-dashboard','AdminController@login')->name('admin.dashboard');
Route::any('logout','AdminController@logout')->name('admin.logout');
Route::get('users','AdminController@userdetail')->name('user.detail');
Route::get('user-delete/{id}','AdminController@userdelete')->name('user.delete');
Route::get('user-edit/{id}','AdminController@useredit')->name('user.edit');
Route::post('user-change/{id}','AdminController@userchange')->name('user.change');
Route::get('admin-panel','AdminController@adminpanel')->name('admin.panel');
Route::get('car-detail','AdminController@cardetail')->name('car.detail');
Route::get('add-car','AdminController@addcar')->name('add.car');
Route::post('add-new','AdminController@addnewcar')->name('add.newcar');
Route::get('rental-history','AdminController@rentalhistory')->name('rental.history');
Route::get('admin-message','AdminController@message')->name('admin.message');
Route::get('message-delete/{id}','AdminController@messagedelete')->name('message.delete');
Route::get('rent-delete/{id}','UserController@rentdelete')->name('rent.delete');



Route::get('user-message','UserController@message')->name('user.message');
Route::get('rent-car','UserController@rent')->name('rent.car');
Route::get('user-dashboard','UserController@dashboard')->name('user.dashboard');
Route::post('message-submit','UserController@messagesubmit')->name('message.submit');
Route::post('book-car','UserController@bookcar')->name('book.car');



