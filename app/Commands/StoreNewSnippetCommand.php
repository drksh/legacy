<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;

class StoreNewSnippetCommand extends Command {

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
	 * @var
	 */
	public $password;

	/**
	 * Create a new command instance.
	 *
	 * @param $title
	 * @param $body
	 * @param $mode
	 * @param $password
	 */
	public function __construct($title, $body, $mode, $password)
	{
		//
		$this->title = $title;
		$this->body = $body;
		$this->mode = $mode;
		$this->password = $password;
	}

}
