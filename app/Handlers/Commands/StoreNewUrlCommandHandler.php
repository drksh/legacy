<?php namespace DarkShare\Handlers\Commands;

use DarkShare\Commands\StoreNewUrlCommand;

use DarkShare\Submissions\Urls\Url;
use DarkShare\Submissions\Urls\UrlSlug;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Queue\InteractsWithQueue;

class StoreNewUrlCommandHandler {

	/**
	 * Eloquent authentication guard
	 *
	 * @var Guard
	 */
	private $auth;

	/**
	 * @var Application
	 */
	private $app;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(Guard $auth, Application $app)
	{
		$this->auth = $auth;
		$this->app = $app;
	}

	/**
	 * Handle the creation of a new URL

	 *
*@param  StoreNewUrlCommand  $command
	 * @return void
	 */
	public function handle(StoreNewUrlCommand $command)
	{
		$url = Url::create([
			'user_id' => ($this->auth->user()) ? $this->auth->user()->id : null,
			'destination' => $command->destination,
			'password' => $command->password,
		]);

		UrlSlug::create([
			'url_id' => $url->id,
			'slug'  => $url,
		]);

		return $url;
	}

}
