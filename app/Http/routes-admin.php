<?php

/*
 * Admin routes
 */

Route::group(['prefix' => 'adm/{authcode?}'], function () {

    Route::get('/', [
        'as'    => 'admin.index',
        'uses'  => 'AdminController@index',
    ]);

    /*
     * Users
     */
    Route::get('/{username}', [
        'as'    => 'admin.users',
        'uses'  => 'AdminController@user',
    ]);
    Route::get('/{username}/snippets', [
        'as'    => 'admin.users.snippets',
        'uses'  => 'AdminController@snippets',
    ]);
    Route::get('/{username}/files', [
      'as'    => 'admin.users.files',
      'uses'  => 'AdminController@files',
    ]);
    Route::get('/{username}/urls', [
      'as'    => 'admin.users.urls',
      'uses'  => 'AdminController@urls',
    ]);

});

