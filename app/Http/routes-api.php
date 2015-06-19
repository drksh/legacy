<?php

Route::group(['middleware' => 'auth.basic:username'], function () {

    /*
     * Snippets
     */
    Route::get('s/{snippets}', [
      'as'      => 'snippets.show',
      'uses'    => 'SnippetsController@show',
    ]);
    Route::delete('s/{snippets}', [
      'as'      => 'snippets.destory',
      'uses'    => 'SnippetsController@destroy'
    ]);
    Route::post('s', [
      'as'      => 'snippets.store',
      'uses'    => 'SnippetsController@store',
    ]);


    /*
     * URL's
     */
    Route::get('{urls}', [
      'as'      => 'urls.show',
      'uses'    => 'UrlsController@show',
    ]);
    Route::delete('{urls}', [
      'as'      => 'urls.destory',
      'uses'    => 'UrlsController@destroy'
    ]);
    Route::post('/', [
      'as'      => 'urls.store',
      'uses'    => 'UrlsController@store',
    ]);

});


