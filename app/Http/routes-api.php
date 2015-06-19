<?php

Route::group(['middleware' => 'auth.basic:username'], function () {

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

});


