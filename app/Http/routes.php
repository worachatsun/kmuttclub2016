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
    Route::controller('ldapload','LDAPLoadController');

    Route::group(['middleware' => ['auth']], function () {
      Route::get('/','RegisterController@getIndex');
      Route::controller('main','RegisterController');
      Route::controller('club','ClubController');
      Route::controller('organization', 'OrgController');
      Route::controller('student','StudentController');
      Route::controller('alchemist','AlchemistController');
    });

});
