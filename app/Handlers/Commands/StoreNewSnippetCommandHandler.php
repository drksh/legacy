<?php namespace DarkShare\Handlers\Commands;

use DarkShare\Commands\StoreNewSnippetCommand;

use Illuminate\Queue\InteractsWithQueue;
use DarkShare\Submissions\Snippets\Snippet;

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
			'user_id' => $command->user_id,
			'title' => $command->title,
			'body'  => $command->body,
			'mode'  => $command->mode,
			'password'  => $command->password,
		]);

	}

}
