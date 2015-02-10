<?php namespace MediShare\Handlers\Commands;

use MediShare\Commands\UpdateSnippetCommand;

use Illuminate\Queue\InteractsWithQueue;
use MediShare\Submissions\Snippets\Snippet;

class UpdateSnippetCommandHandler {

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
	 * @param  UpdateSnippetCommand  $command
	 * @return void
	 */
	public function handle(UpdateSnippetCommand $command)
	{
		return $command->snippet->update([
			'title' => $command->title,
			'body'  => $command->body,
			'mode'  => $command->mode
		]);
	}

}
