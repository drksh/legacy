<?php namespace DarkShare\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider {

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		require_once app_path('Services/Helpers/system.php');
	}

}
