<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreNewFileCommand extends Command {

	/**
	 * File title
	 *
	 * @var string
	 */
	public $title;

	/**
	 * File path
	 *
	 * @var string
	 */
	public $path;

	/**
	 * File password
	 *
	 * @var string
	 */
	public $password;

	/**
	 * The uploaded file
	 *
	 * @var UploadedFile
	 */
	public $file;

	/**
	 * Create a new command instance.
	 *
	 * @param string       $title
	 * @param string       $path
	 * @param string       $password
	 * @param UploadedFile $file
	 */
	public function __construct($title, $path, $password, UploadedFile $file)
	{
		$this->title = $title;
		$this->path = $path;
		$this->password = $password;
		$this->file = $file;
	}

}
