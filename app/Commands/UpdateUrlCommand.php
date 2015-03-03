<?php namespace DarkShare\Commands;

use DarkShare\Submissions\Urls\Url;

class UpdateUrlCommand extends Command {

	/**
	 * @var Url
	 */
	public $url;

	/**
	 * @var
	 */
	public $destination;

	/**
	 * Create a new command instance.
	 *
	 * @param Url       $url
	 * @param string    $destination
	 */
	public function __construct(Url $url, $destination)
	{
		$this->url = $url;
		$this->destination = $destination;
	}

}
