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
    | Route::resource
    |--------------------------------------------------------------------------
        Verb				Path					Action		Route Name
        GET					/photo					index		photo.index
        GET					/photo/create			create		photo.create
        POST				/photo					store		photo.store
        GET					/photo/{photo}			show		photo.show
        GET					/photo/{photo}/edit		edit		photo.edit
        PUT/PATCH			/photo/{photo}			update		photo.update
        DELETE				/photo/{photo}			destroy		photo.destroy

    Partial Resource Routes
        Route::resource('photo', 'PhotoController', ['only' => [
            'index', 'show'
        ]]);

        Route::resource('photo', 'PhotoController', ['except' => [
            'create', 'store', 'update', 'destroy'
        ]]);
        
    Manual Naming Resource Routes (to see default: "php artisan route:list")
        Route::resource('faq', 'ProductFaqController', [
            'names' => [
                'index' => 'faq',
                'store' => 'faq.new',
                // etc...
            ]
        ]);
        
    Specify the "as" option to define a prefix for every route name.
        Route::resource('faq', 'ProductFaqController', [
            'as' => 'prefix'
        ]); // This will give you routes name such as prefix.faq.index, prefix.faq.store, etc.
    */
    
    /*
    |--------------------------------------------------------------------------
    | Back End Routing
    |--------------------------------------------------------------------------
    */
    Route::resource('settings', 'SettingsController', ['only' => [
        'index', 'update',
    ]]);
});

Route::group(['middleware' => 'web'], function () {
    
    /*
	|--------------------------------------------------------------------------
	| Login Admin Routing
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'admin'], function(){
        Route::auth();
        
        Route::get('/', function(){
            return redirect('admin/login');
        });
    });
    

    /*
	|--------------------------------------------------------------------------
	| Front End Routing
	|--------------------------------------------------------------------------
	*/
    Route::get('/', 'HomeController@index');

});