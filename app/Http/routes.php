<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use \App\Http\Controllers\PostsController;
Route::get('/', 'PostsController@index');
Route::resource('discussions','PostsController');
Route::resource('comment','CommentsController');
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/user/avatar', 'UsersController@avatar');
Route::post('/avatar', 'UsersController@changeAvatar');
Route::post('/crop/api', 'UsersController@cropAvatar');
Route::post('/post/upload', 'PostsController@upload');
Route::get('/pay','OrdersController@pay');
Route::get('/pay/success','OrdersController@paySuccess');
//Route::get('/pro',function(){
//   $billings = app('billing');
//    dd($billings->charge());
//});
Route::any('/wechat', 'WechatController@serve');

