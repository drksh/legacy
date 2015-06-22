<?php namespace DarkShare\Providers;

use DarkShare\Submissions\Files\FileSlug;
use DarkShare\Submissions\Snippets\SnippetSlug;
use DarkShare\Submissions\Urls\UrlSlug;
use DarkShare\Users\User;
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

	protected $apiNamespace = 'DarkShare\Http\Controllers\Api';

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
		$router->bind('username', function($value) {
		    return User::where('username', $value)->first();
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

        $requestUserAgent = app()->request->headers->get('user-agent');

        $isCurl = strpos(strtolower($requestUserAgent), 'curl') !== false;
        $isWget = strpos(strtolower($requestUserAgent), 'wget') !== false;

        // The host starts with with "api."
        if($isCurl || $isWget || $this->app->runningInConsole()) {
            $router->group(['namespace' => $this->apiNamespace], function($router) {
                require app_path('Http/routes-api.php');
            });
        } else {
            $router->group(['namespace' => $this->adminNamespace], function($router) {
                require app_path('Http/routes-admin.php');
            });

            $router->group(['namespace' => $this->namespace], function ($router) {
                require app_path('Http/routes.php');
            });
        }


	}

}
