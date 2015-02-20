<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
	 * @var UploadedFile
	 */
	public $file;

	/**
	 * Create a new command instance.
	 *
	 * @param              $title
	 * @param              $path
	 * @param              $password
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
