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

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
    /*
	|--------------------------------------------------------------------------
	| Back End Routing
	|--------------------------------------------------------------------------
	*/
    Route::resource('settings', 'SettingsController');
});

Route::group(['middleware' => 'web'], function () {

    /*
	|--------------------------------------------------------------------------
	| Front End Routing
	|--------------------------------------------------------------------------
	*/
    Route::get('/', 'HomeController@index');

});
