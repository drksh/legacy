<?php

/*
 * Admin routes
 */

Route::group(['prefix' => 'adm'], function () {

    Route::get('/{authcode}', [
        'as'    => 'admin.index',
        'uses'  => 'AdminController@index',
    ]);

});

