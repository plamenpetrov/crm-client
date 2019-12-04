<?php

Route::group(['prefix' => 'documents'], function () {
    Route::get('/', ['as' => 'documents', 'uses' => 'DocumentsController@index']);
});