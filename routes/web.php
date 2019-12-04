<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/login', array(
    'as' => 'login_get',
    'uses' => 'AuthController@getLogin'
));

Route::post('/login', array(
    'as' => 'login_post',
    'uses' => 'AuthController@postLogin'
));

Route::group(['middleware' => ['authenticate']], function () {
    Route::get('/logout', array(
        'as' => 'logout',
        'uses' => 'AuthController@getLogout'
    ));
    
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    
    Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile']);
    Route::get('/settings', ['as' => 'settings', 'uses' => 'HomeController@settings']);
    
    Route::get('/lang/{lang}', ['as' => 'language_chooser', 'uses' => 'LanguageController@langSetter']);
    Route::get('/changelayout/{style}', ['as' => 'changelayout', 'uses' => 'UIController@changeLayout']);
     Route::get('/changedisplaytype/{type}', ['as' => 'changedisplaytype', 'uses' => 'UIController@changeDisplayType']);
   
    ##
    foreach (glob(__DIR__ . '/clientroutes/*.php') as $route_file) {
        require $route_file;
    }
    ##
});
