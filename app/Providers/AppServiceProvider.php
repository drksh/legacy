<?php namespace DarkShare\Providers;

use DarkShare\Services\Slugger;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {


    /**
     * Bootstrap any application services.
     *
     */
	public function boot()
	{
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'DarkShare\Services\Registrar'
		);

		$this->app->singleton('slugger', function() {
			return new Slugger();
		});
	}

}
