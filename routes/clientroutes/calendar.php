<?php

Route::group(['prefix' => 'calendar'], function () {
    Route::get('/', ['as' => 'calendar_index', 'uses' => 'CalendarController@index']);
    
    Route::get('/events', ['as' => 'calendar_events', 'uses' => 'CalendarController@events']);
    
    Route::get('/events/users', ['as' => 'calendar_events_users', 'uses' => 'CalendarController@eventsUsers']);
});