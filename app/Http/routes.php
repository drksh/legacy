<?php

Route::get('/', 'PagesController@getIndex');

/*
 * Auth
 */
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [
      'as' => 'auth.login',
      'uses' => 'AuthController@getLogin'
    ]);
    Route::post('login', [
      'as' => 'auth.login',
      'uses' => 'AuthController@postLogin'
    ]);
    Route::get('register', [
      'as' => 'auth.register',
      'uses' => 'AuthController@getRegister'
    ]);
    Route::post('register', [
      'as' => 'auth.register',
      'uses' => 'AuthController@postRegister'
    ]);
    Route::get('logout', [
      'as' => 'auth.logout',
      'uses' => 'AuthController@getLogout',
    ]);
});

/*
 * Controllers
 */
Route::controllers([
  'p/' => 'PagesController',
]);

Route::group(['before' => 'auth', 'prefix' => 'ego'], function () {
    Route::get('s', [
      'as' => 'users.snippets',
      'uses' => 'UsersController@snippets',
    ]);
    Route::get('f', [
      'as'  => 'users.files',
      'uses' => 'UsersController@files',
    ]);
    Route::get('u', [
      'as' => 'users.urls',
      'uses' => 'UsersController@urls',
    ]);
});

/*
 * Snippets
 */
Route::resource('snippets', 'SnippetsController', ['except', 'show']);
Route::get('s/{snippets}', [
  'as' => 'snippets.show',
  'uses' => 'SnippetsController@show',
]);
Route::get('snippets/login/{snippets}', [
  'as' => 'snippets.login',
  'uses' => 'SnippetsController@login',
]);
Route::post('snippets/authenticate/{snippets}', [
  'as' => 'snippets.auth',
  'uses' => 'SnippetsController@authenticate',
]);

/*
 * Files
 */
Route::resource('files', 'FilesController',
  ['except' => ['edit', 'update', 'show']]);
Route::get('f/{files}', [
  'as' => 'files.show',
  'uses' => 'FilesController@show',
]);
Route::get('files/login/{files}', [
  'as' => 'files.login',
  'uses' => 'FilesController@login',
]);
Route::post('files/authenticate/{files}', [
  'as' => 'files.auth',
  'uses' => 'FilesController@authenticate',
]);

/*
 * URLs
 */
Route::resource('urls', 'UrlsController', ['except', 'show']);
Route::get('{urls}', [
  'as' => 'urls.show',
  'uses' => 'UrlsController@show',
]);
Route::get('urls/login/{urls}', [
  'as' => 'urls.login',
  'uses' => 'UrlsController@login',
]);
Route::post('urls/authenticate/{urls}', [
  'as' => 'urls.auth',
  'uses' => 'UrlsController@authenticate',
]);

