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
 * Controllers
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	''  =>  'PagesController',
]);

