<?php namespace DarkShare\Handlers\Commands;

use DarkShare\Commands\StoreNewFileCommand;

use DarkShare\Submissions\Files\File;
use Illuminate\Queue\InteractsWithQueue;

class StoreNewFileCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  StoreNewFileCommand  $command
	 * @return void
	 */
	public function handle(StoreNewFileCommand $command)
	{
		$command->path = $this->handleUploadedFile($command->path);

		return File::create([
			'title' => $command->title,
			'path'  => $command->path,
			'password' => $command->password
		]);
	}

}
