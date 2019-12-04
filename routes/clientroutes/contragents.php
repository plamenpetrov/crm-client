<?php

Route::group(['prefix' => 'contragents'], function () {
    Route::get('/', ['as' => 'contragents', 'uses' => 'ContragentController@index']);
    Route::get('/create', ['as' => 'contragent_create', 'uses' => 'ContragentController@create']);
    Route::get('/{id}/edit', ['as' => 'contragent_edit', 'uses' => 'ContragentController@edit']);

    Route::get('/show/{id}', ['as' => 'contragent_show', 'uses' => 'ContragentController@show']);
    Route::get('/history/{id}', ['as' => 'contragent_history', 'uses' => 'ContragentController@history']);

    Route::post('/store', ['as' => 'contragent_store', 'uses' => 'ContragentController@store']);
    Route::patch('/update/{id}', ['as' => 'contragent_update', 'uses' => 'ContragentController@update']);

    Route::get('/search/{slug?}', ['as' => 'contragent_search', 'uses' => 'ContragentController@search']);

    Route::post('/relation/store', ['as' => 'contragent_relation', 'uses' => 'ContragentController@storeRelation']);

    Route::delete('/relation/delete', ['as' => 'contragent_relation_delete', 'uses' => 'ContragentController@deleteRelation']);

    Route::post('/person/store', ['as' => 'contragent_person', 'uses' => 'ContragentController@storePerson']);

    Route::delete('/person/delete', ['as' => 'contragent_person_delete', 'uses' => 'ContragentController@deletePerson']);
});
