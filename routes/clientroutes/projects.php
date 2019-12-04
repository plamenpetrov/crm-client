<?php

Route::group(['prefix' => 'projects'], function () {
    Route::get('/', ['as' => 'projects', 'uses' => 'ProjectsController@index']);
    
    Route::group(['prefix' => 'documents'], function () {
        Route::get('/', ['as' => 'documents_index', 'uses' => 'ProjectsController@index']);
    });
});