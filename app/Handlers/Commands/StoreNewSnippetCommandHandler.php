<?php namespace DarkShare\Handlers\Commands;

use DarkShare\Commands\StoreNewSnippetCommand;

use DarkShare\Submissions\Snippets\SnippetSlug;
use Illuminate\Queue\InteractsWithQueue;
use DarkShare\Submissions\Snippets\Snippet;

class StoreNewSnippetCommandHandler {

	/**
	 * Handle the command.
	 *
	 * @param  StoreNewSnippetCommand  $command
	 * @return void
	 */
	public function handle(StoreNewSnippetCommand $command)
	{
		$snippet =  Snippet::create([
			'user_id' => $command->user_id,
			'title' => $command->title,
			'body'  => $command->body,
			'mode'  => $command->mode,
			'password' => $command->password,
		]);

		SnippetSlug::create([
			'snippet_id' => $snippet->id,
			'slug'      => $snippet,
		]);

		return $snippet;
	}

}
