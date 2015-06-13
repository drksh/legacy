<?php namespace DarkShare\Providers;

use DarkShare\Services\Validators\FileValidator;
use DarkShare\Services\Validators\UrlValidator;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @param Validator $validator
	 */
	public function boot(Validator $validator)
	{
		// File validator
		$validator->resolver(function ($translator, $data, $rules, $messages) {
			return new FileValidator($translator, $data, $rules, $messages);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
	}

}
