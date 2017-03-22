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
 Route::get('/','HomeController@index');
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/create_post', 'HomeController@index3');
Route::get('/create','HomeController@index2');
/*Route::get('/login',function(){
	return view('welcome');
});*/
Route::get('/edit/{id?}','HomeController@edit');
Route::get('/delete/{id?}','HomeController@delete');
Route::post('/edit/{id?}','HomeController@edit');
Route::post('/details','HomeController@store');
Route::get('/ajax1','HomeController@ajax1');

