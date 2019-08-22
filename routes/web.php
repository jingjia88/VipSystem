<?php

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
//後台管理
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    //會員管理
    Route::get('/', 'HomeController@index');
    Route::get('/add','HomeController@add');
    Route::post('/','HomeController@store');
    Route::delete('/{id}','HomeController@delete');
    Route::get('/{id}/edit','HomeController@edit');
    Route::put('/{id}','HomeController@update');
    //郵件管理
    Route::get('/mail','MailController@index');
    Route::get('/mail/send','MailController@send');
    Route::get('/mail/sms','MailController@sms');
    //群組管理
    Route::resource('group', 'GroupController');
    //回覆管理
    Route::get('/reply','ReplyController@index');
    
});
Auth::routes();

Route::get('/home', 'Admin\HomeController@index')->name('home');
