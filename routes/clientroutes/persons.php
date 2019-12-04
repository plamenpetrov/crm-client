<?php

Route::group(['prefix' => 'persons'], function () {
    Route::get('/', ['as' => 'persons', 'uses' => 'PersonController@index']);
    Route::get('/create', ['as' => 'person_create', 'uses' => 'PersonController@create']);
    Route::get('/{id}/edit', ['as' => 'person_edit', 'uses' => 'PersonController@edit']);

    Route::get('/show/{id}', ['as' => 'person_show', 'uses' => 'PersonController@show']);
    Route::get('/history/{id}', ['as' => 'person_history', 'uses' => 'PersonController@history']);
    
    Route::post('/store', ['as' => 'person_store', 'uses' => 'PersonController@store']);
    Route::patch('/update/{id}', ['as' => 'person_update', 'uses' => 'PersonController@update']);
    
    Route::get('/search/{slug?}', ['as' => 'person_search', 'uses' => 'PersonController@search']);
});
