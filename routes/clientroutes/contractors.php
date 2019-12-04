<?php

Route::group(['prefix' => 'contractors'], function () {
    Route::get('/', ['as' => 'contractors', 'uses' => 'ContractorsController@index']);
});