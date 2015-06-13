<?php namespace DarkShare\Commands;


class StoreNewUrlCommand extends Command {

	/**
	 * Link destination
	 *
	 * @var string
	 */
	public $destination;

	/**
	 * Password string
	 *
	 * @var string
	 */
	public $password;

	/**
	 * Create a new command instance.
	 *
	 * @param string    $destination
	 * @param string    $password
	 */
	public function __construct($destination, $password)
	{
		$this->destination = $destination;
		$this->password = $password;
	}

}
