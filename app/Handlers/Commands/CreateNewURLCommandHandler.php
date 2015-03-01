<?php namespace DarkShare\Handlers\Commands;

use DarkShare\Commands\CreateNewURLCommand;

use DarkShare\Submissions\Urls\Url;
use Illuminate\Auth\Guard;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewURLCommandHandler {

	/**
	 * Eloquent authentication guard
	 *
	 * @var Guard
	 */
	private $auth;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle the creation of a new URL
	 *
	 * @param  CreateNewURLCommand  $command
	 * @return void
	 */
	public function handle(CreateNewURLCommand $command)
	{
		return Url::create([
			'user_id' => ($this->auth->user()) ? $this->auth->user()->id : null,
			'destination' => $command->destination,
			'password' => $command->password,
		]);
	}

}
