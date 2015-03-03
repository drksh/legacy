<?php namespace DarkShare\Handlers\Commands;

use DarkShare\Commands\UpdateUrlCommand;

use Illuminate\Queue\InteractsWithQueue;

class UpdateUrlCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  UpdateUrlCommand  $command
	 * @return void
	 */
	public function handle(UpdateUrlCommand $command)
	{
		return $command->url->update([
			'destination' => $command->destination,
		]);
	}

}
