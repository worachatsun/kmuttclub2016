<?php
Route::get('/_debugbar/assets/stylesheets', [
    'as' => 'debugbar-css',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@css'
]);

Route::get('/_debugbar/assets/javascript', [
    'as' => 'debugbar-js',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js'
]);

Route::group(['middleware' => ['web']], function () {

    Route::controller('auth','Auth\AuthController');

    Route::group(['middleware' => ['auth']], function () {
        Route::controller('organization', 'OrgController');
        Route::controller('/','MainController');
    });

});



Route::get('/home', 'HomeController@index');



//Route::get('/home', 'HomeController@index');

//Route::auth();

//Route::get('/home', 'HomeController@index');

