<?php namespace DarkShare\Handlers\Commands;

use Carbon\Carbon;
use DarkShare\Commands\StoreNewFileCommand;

use DarkShare\Submissions\Files\File;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Queue\InteractsWithQueue;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreNewFileCommandHandler {

	/**
	 * @var Guard
	 */
	private $auth;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle the command.
	 *
	 * @param  StoreNewFileCommand  $command
	 * @return void
	 */
	public function handle(StoreNewFileCommand $command)
	{
		$command->path = $this->handleUploadedFile($command->file);

		return File::create([
			'user_id' => ($this->auth->user()) ? $this->auth->user()->id : null,
			'title' => $command->title,
			'path'  => $command->path,
			'password' => $command->password,
		]);
	}

	private function handleUploadedFile(UploadedFile $file)
	{
		$filename = $this->getFileName($file);
		$location = storage_path('app/');

		$resultFile = $this->storeFile($file, $location, $filename);

		return $resultFile->getRealPath();
	}

	private function storeFile(UploadedFile $file, $location, $filename)
	{
		return $file->move($location, $filename);
	}

	private function getFilename(UploadedFile $file)
	{
		$path = date('Y-m-d_H-i-s');
		$path .= '_' . md5($file->getClientOriginalName());
		$path .= '.' . $file->getClientOriginalExtension();

		return $path;
	}

}
