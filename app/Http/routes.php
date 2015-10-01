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

// Guest 
Route::get('/', 'guestController@index');
Route::get('register', 'guestController@register');
Route::post('register', 'guestController@create');
Route::get('login', 'guestController@showLogin');
Route::post('login', 'guestController@login');
Route::resource('files','guestController');
Route::resource('users', 'guestController');

// Admin
Route::get('adminDashboard', 'adminController@index');
Route::post('adminDashboard', 'adminController@changePassword');
Route::get('adminUsers', 'adminController@usersView');
Route::post('createUser', 'adminController@createUser');
Route::post('editUser', 'adminController@editUser');
Route::post('updateUser', 'adminController@updateUser');
Route::get('adminFiles', 'adminController@showFiles');
Route::get('adminLogout', 'adminController@logout');
Route::post('deleteUser', 'adminController@deleteUser');
Route::resource('users', 'adminController');
Route::resource('files', 'adminController');

// Customer
Route::get('customerHome', 'customerController@home');
Route::get('customerProfile', 'customerController@showUser');
Route::post('customerProfile', 'customerController@updateProfile');
Route::get('customerUpload', 'customerController@uploadFile');
Route::get('customerLogout', 'customerController@logout');
Route::post('cancelOrder', 'customerController@cancelOrder');
Route::resource('users', 'customerController');
Route::resource('files', 'customerController');
Route::resource('status', 'customerController');

// Agent
