<?php namespace DarkShare\Providers;

use DarkShare\Services\Slugger;
use DarkShare\Submissions\Files\File;
use DarkShare\Submissions\Snippets\Snippet;
use DarkShare\Submissions\Urls\Url;
use DarkShare\Submissions\Urls\UrlSlug;
use Illuminate\Console\Application;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'DarkShare\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
		$router->model('snippets', Snippet::class);
//		$router->bind('snippets', function ($value) {
//			return Snippet::find($value);
//		});
		$router->model('files', File::class);
//		$router->model('urls', Url::class);
		$router->bind('urls', function($value) {
//			dd();
			return UrlSlug::where('slug', $value)->first()->url;
		});
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function ($router) {
			require app_path('Http/routes.php');
		});
	}

}
