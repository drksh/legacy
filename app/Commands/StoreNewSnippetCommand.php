<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;

class StoreNewSnippetCommand extends Command {

	/**
	 * Snippet title
	 * @var string
	 */
	public $title;

	/**
	 * Snippet body
	 * @var string
	 */
	public $body;

	/**
	 * Snippet text mode
	 * @var string
	 */
	public $mode;

	/**
	 * Snippet password
	 * @var string
	 */
	public $password;

	/**
	 * Snippet owner
	 * @var integer
	 */
	public $user_id;

	/**
	 * Create a new command instance.
	 *
	 * @param string    $title
	 * @param string    $body
	 * @param string    $mode
	 * @param string    $password
	 * @param integer   $user_id
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
