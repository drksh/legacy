<?php namespace DarkShare\Handlers\Commands;

use DarkShare\Commands\DeleteFileCommand;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Queue\InteractsWithQueue;

class DeleteFileCommandHandler {

	/**
	 * A filesystem instance.
	 *
	 * @var Filesystem
	 */
	private $filesystem;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(Filesystem $filesystem)
	{
		$this->filesystem = $filesystem;
	}

	/**
	 * Handle the action of deleting a file.
	 *
	 * @param  DeleteFileCommand $command
	 * @return void
	 */
	public function handle(DeleteFileCommand $command)
	{
		$path = str_replace(storage_path('app/'), '', $command->file->path);

		$command->file->delete();

		$this->filesystem->delete($path);
	}

}
