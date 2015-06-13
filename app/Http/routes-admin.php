<?php

/*
 * Admin routes
 */

Route::group(['prefix' => 'adm/{authcode?}'], function () {

    Route::get('/', [
        'as'    => 'admin.index',
        'uses'  => 'AdminController@index',
    ]);

    Route::get('/{username}', [
        'as'    => 'admin.users',
        'uses'  => 'AdminController@user'
    ]);

});

