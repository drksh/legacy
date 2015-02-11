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
	 * @var
	 */
	public $user_id;

	/**
	 * Create a new command instance.
	 *
	 * @param $title
	 * @param $body
	 * @param $mode
	 * @param $password
	 * @param $user_id
	 */
	public function __construct($title, $body, $mode, $password, $user_id)
	{
		//
		$this->title = $title;
		$this->body = $body;
		$this->mode = $mode;
		$this->password = $password;
		$this->user_id = $user_id;
	}

}
