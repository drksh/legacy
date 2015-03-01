<?php namespace DarkShare\Commands;

use DarkShare\Commands\Command;
use DarkShare\Submissions\Files\File;

class DeleteFileCommand extends Command {

	/**
	 * The file to be deleted.
	 *
	 * @var File
	 */
	public $file;

	/**
	 * Create a new command instance.
	 *
	 * @param File $file
	 */
	public function __construct(File $file)
	{
		$this->file = $file;
	}

}
