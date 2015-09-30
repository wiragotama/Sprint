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
Route::model('users','Users');
Route::model('files','Files');
Route::model('status','Status');

// Use slugs rather than IDs in URLs
Route::bind('users', function($value, $route) {
	return App\Users::whereSlug($value)->first();
});

Route::bind('files', function($value, $route) {
	return App\Files::whereSlug($value)->first();
});

Route::bind('status', function($value, $route) {
	return App\Status::whereSlug($value)->first();
});

Route::get('/', 'guestController@index');
Route::get('register', 'guestController@register');
Route::post('register', 'guestController@create');
Route::resource('users', 'guestController');
Route::get('login', 'guestController@login');
