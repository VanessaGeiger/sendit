<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('admin_template');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	//Auth::loginUsingId(1);
	//Auth::logout();

   	Route::get('upload', ['as' => 'upload', 'uses' =>'UploadController@index']);
	Route::get('settings', ['as' => 'profile', 'uses' =>'SettingController@index']);
	Route::get('history', ['as' => 'history', 'uses' =>'HistoryController@index']);

	// Authentication routes...
	Route::get('auth/login', ['as' => 'login', 'uses' =>'Auth\AuthController@getLogin']);
	Route::post('auth/login', ['as' => 'login', 'uses' =>'Auth\AuthController@postLogin']);
	Route::get('auth/logout', ['as' => 'logout', 'uses' =>'Auth\AuthController@getLogout']);
});


