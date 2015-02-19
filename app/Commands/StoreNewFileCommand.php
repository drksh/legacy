<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;

class StoreNewFileCommand extends Command {
	/**
	 * @var
	 */
	public $title;
	/**
	 * @var
	 */
	public $path;
	/**
	 * @var
	 */
	public $password;

	/**
	 * Create a new command instance.
	 *
	 * @param $title
	 * @param $path
	 * @param $password
	 */
	public function __construct($title, $path, $password)
	{
		$this->title = $title;
		$this->path = $path;
		$this->password = $password;
	}

}
