<?php

Route::group(['prefix' => 'events'], function () {
    Route::get('/', ['as' => 'events', 'uses' => 'EventsController@index']);

    Route::get('/create', ['as' => 'event_create', 'uses' => 'EventsController@create']);
    Route::get('/{id}/edit', ['as' => 'event_edit', 'uses' => 'EventsController@edit']);

    Route::get('/show/{id}', ['as' => 'event_show', 'uses' => 'EventsController@show']);
    
    Route::post('/store', ['as' => 'event_store', 'uses' => 'EventsController@store']);
    Route::patch('/update', ['as' => 'event_update', 'uses' => 'EventsController@update']);

    Route::patch('/change/duration', ['as' => 'event_change_duration', 'uses' => 'EventsController@changeDuration']);
    
});
