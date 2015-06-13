<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;
use DarkShare\Submissions\Snippets\Snippet;

class UpdateSnippetCommand extends Command {

	/**
	 * Snippet to update
	 *
	 * @var Snippet
	 */
	public $snippet;

	/**
	 * Snippet title
	 *
	 * @var string
	 */
	public $title;

	/**
	 * Snippet body
	 *
	 * @var string
	 */
	public $body;

	/**
	 * Snippet text mode
	 *
	 * @var string
	 */
	public $mode;

	/**
	 * Create a new command instance.
	 *
	 * @param Snippet $snippet
	 * @param string  $title
	 * @param string  $body
	 * @param string  $mode
	 */
	public function __construct(Snippet $snippet, $title, $body, $mode)
	{
		$this->snippet = $snippet;
		$this->title = $title;
		$this->body = $body;
		$this->mode = $mode;
	}

}
