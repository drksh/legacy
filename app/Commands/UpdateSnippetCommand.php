<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;
use DarkShare\Submissions\Snippets\Snippet;

class UpdateSnippetCommand extends Command {

	/**
	 * @var Snippet
	 */
	public $snippet;

	/**
	 * @var
	 */
	public $title;

	/**
	 * @var
	 */
	public $body;

	/**
	 * @var
	 */
	public $mode;

	/**
	 * Create a new command instance.
	 *
	 * @param Snippet $snippet
	 * @param         $title
	 * @param         $body
	 * @param         $mode
	 * @internal param $password
	 */
	public function __construct(Snippet $snippet, $title, $body, $mode)
	{
		$this->snippet = $snippet;
		$this->title = $title;
		$this->body = $body;
		$this->mode = $mode;
	}

}
