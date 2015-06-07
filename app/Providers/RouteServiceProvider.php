<?php namespace DarkShare\Providers;

use DarkShare\Services\Slugger;
use DarkShare\Submissions\Files\File;
use DarkShare\Submissions\Files\FileSlug;
use DarkShare\Submissions\Snippets\Snippet;
use DarkShare\Submissions\Snippets\SnippetSlug;
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

	protected $adminNamespace = 'DarkShare\Http\Controllers\Admin';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		$router->bind('snippets', function ($value) {
			return SnippetSlug::where('slug', $value)->first()->snippet;
		});
		$router->bind('files', function($value) {
			return FileSlug::where('slug', $value)->first()->file;
		});
		$router->bind('urls', function($value) {
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

		$router->group(['namespace' => $this->adminNamespace], function($router) {
		    require app_path('Http/routes-admin.php');
		});
	}

}
