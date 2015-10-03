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
Route::post('createUser', 'adminController@createUser');
Route::post('showEditUser','adminController@showEditUser');
Route::post('updateUser', 'adminController@updateUser');
Route::post('editAdminProfile', 'adminController@editAdminProfile');
Route::get('adminLogout', 'adminController@logout');
Route::post('deleteUser', 'adminController@deleteUser');
Route::resource('users', 'adminController');
Route::resource('files', 'adminController');

// Customer
Route::get('customerHome', 'customerController@home');
Route::get('customerProfile', 'customerController@showUser');
Route::post('customerProfile', 'customerController@updateProfile');
Route::get('customerUpload', 'customerController@showUploader');
Route::post('customerUpload', 'customerController@uploadFile');
Route::get('customerLogout', 'customerController@logout');
Route::post('cancelOrder', 'customerController@cancelOrder');
Route::resource('users', 'customerController');
Route::resource('files', 'customerController');
Route::resource('status', 'customerController');

// Agent
Route::get('agentHome', 'agentController@home');
Route::post('agentProfile', 'agentController@updateProfile');
Route::get('agentFiles', 'agentController@showFiles');
Route::get('agentLogout', 'agentController@logout');
Route::post('updateQueue', 'agentController@updateQueue');
Route::post('updatePrinted', 'agentController@updatePrinted');
Route::get('getFile', 'agentController@getFile');
Route::resource('users', 'agentController');
Route::resource('files', 'agentController');
Route::resource('status', 'agentController');
