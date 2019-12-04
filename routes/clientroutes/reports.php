<?php

Route::group(['prefix' => 'reports'], function () {
    Route::get('/', ['as' => 'reports_index', 'uses' => 'ReportsController@index']);
});