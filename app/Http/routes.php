<?php

Route::resource('snippets', 'SnippetsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	''  =>  'PagesController',
]);

