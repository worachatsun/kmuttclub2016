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
      Route::controller('club','ClubController');
      Route::controller('regis','RegisterController');
        Route::controller('organization', 'OrgController');
        Route::controller('club','ClubController');
        Route::controller('student','StudentController');
        Route::controller('/','MainController');
    });


});

Route::get('/home', 'HomeController@index');



//Route::get('/home', 'HomeController@index');

//Route::auth();

//Route::get('/home', 'HomeController@index');
