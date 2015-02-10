<?php namespace MediShare\Handlers\Commands;

use MediShare\Commands\StoreNewSnippetCommand;

use Illuminate\Queue\InteractsWithQueue;
use MediShare\Submissions\Snippets\Snippet;

class StoreNewSnippetCommandHandler {

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
	 * @param  StoreNewSnippetCommand  $command
	 * @return void
	 */
	public function handle(StoreNewSnippetCommand $command)
	{
		return Snippet::create([
			'title' => $command->title,
			'body'  => $command->body,
			'mode'  => $command->mode,
			'password'  => $command->password,
		]);

	}

}
