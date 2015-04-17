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

Route::get('/', 'WelcomeController@index');
Route::get('login', 'SessionController@create');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');

Route::group(['middleware' => 'auth'], function ()
{
	Route::get('add-product', 'ProductController@create');
	Route::post('save-product', 'ProductController@store');
});

Route::get('item-details/{item_id}','ProductController@info');
Route::get('bid/{item_id}','ProductController@info');
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
