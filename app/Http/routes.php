<?php

/*
 * Snippets
 */
Route::resource('snippets', 'SnippetsController');
Route::get('snippets/login/{snippets}', [
	'as'    => 'snippets.login',
	'uses'  => 'SnippetsController@login',
]);
Route::post('snippets/authenticate/{snippets}', [
	'as'    => 'snippets.auth',
	'uses'  => 'SnippetsController@authenticate',
]);

/*
 * Files
 */
Route::resource('files', 'FilesController', ['except' => ['edit', 'update']]);
Route::get('files/login/{files}', [
	'as'    => 'files.login',
	'uses'  => 'FilesController@login',
]);
Route::post('files/authenticate/{files}', [
	'as'    => 'files.auth',
	'uses'  => 'FilesController@authenticate',
]);

/*
 * URLs
 */
Route::resource('urls', 'UrlsController');
Route::get('urls/login/{urls}', [
	'as'    => 'urls.login',
	'uses'  => 'UrlsController@login',
]);
Route::post('urls/authenticate/{urls}', [
	'as'    => 'urls.auth',
	'uses'  => 'UrlsController@authenticate',
]);

/*
 * Auth
 */
Route::get('auth/login', [
	'as' => 'auth.login',
	'uses'  => 'AuthController@getLogin'
]);
Route::post('auth/login', [
	'as' => 'auth.login',
	'uses'  => 'AuthController@postLogin'
]);
Route::get('auth/register', [
	'as' => 'auth.register',
	'uses'  => 'AuthController@getRegister'
]);
Route::post('auth/register', [
	'as' => 'auth.register',
	'uses'  => 'AuthController@postRegister'
]);
Route::get('auth/logout', [
	'as' => 'auth.logout',
	'uses'  => 'AuthController@getLogout',
]);

/*
 * Controllers
 */
Route::controllers([
	''  =>  'PagesController',
]);

