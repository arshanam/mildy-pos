<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('/', function()
{
	if (Auth::check())
		return View::make('users.home');
	else
		return Redirect::to('login');
});

Route::group(array('before' => 'guest'), function()
{
	Route::get('login', 'UserController@showLogin');
	Route::post('login', 'UserController@login');
});

Route::group(array('before' => 'auth'), function()
{
	Route::resource('staffs', 'StaffController');
	Route::resource('products', 'ProductController');
});

Route::post('logout', 'UserController@logout');