<?php

Route::group([], function () {

    Route::get('limit', [
        'as'    => 'api.limit',
        'uses'  => 'ApiController@limit',
    ]);

    /*
     * Snippets
     */
    Route::get('s/{snippets}', [
      'as'      => 'snippets.show',
      'uses'    => 'SnippetsController@show',
    ]);
    Route::post('s', [
      'as'      => 'snippets.store',
      'uses'    => 'SnippetsController@store',
    ]);

    /*
     * Files
     */
    Route::post('f', [
      'as'    => 'files.store',
      'uses'  => 'FilesController@store'
    ]);
    Route::get('f/{files}', [
      'as'    => 'files.show',
      'uses'  => 'FilesController@show',
    ]);

    /*
     * URL's
     */
    Route::get('{urls}', [
      'as'      => 'urls.show',
      'uses'    => 'UrlsController@show',
    ]);
    Route::post('/', [
      'as'      => 'urls.store',
      'uses'    => 'UrlsController@store',
    ]);

});


