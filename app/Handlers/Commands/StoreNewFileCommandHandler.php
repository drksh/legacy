<?php namespace DarkShare\Handlers\Commands;

use Carbon\Carbon;
use DarkShare\Commands\StoreNewFileCommand;

use DarkShare\Submissions\Files\File;
use DarkShare\Submissions\Files\FileSlug;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Queue\InteractsWithQueue;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreNewFileCommandHandler {

	/**
	 * A Guard instance
	 *
	 * @var Guard
	 */
	private $auth;

    /**
     * Create the command handler.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle the command.
	 *
	 * @param  StoreNewFileCommand $command
	 * @return void
	 */
	public function handle(StoreNewFileCommand $command)
	{
		$command->path = $this->handleUploadedFile($command->file);

		$file =  File::create([
			'user_id' => ($this->auth->user()) ? $this->auth->user()->id : null,
			'title' => $command->title,
			'path' => $command->path,
			'password' => $command->password,
		]);

		FileSlug::create([
			'file_id'   => $file->id,
			'slug'      => $file,
		]);

		return $file;
	}

	/**
	 * Store the uploaded file and give it's absolute path.
	 *
	 * @param UploadedFile $file
	 * @return string
	 */
	private function handleUploadedFile(UploadedFile $file)
	{
		$filename = $this->getFileName($file);
		$location = storage_path('app/');

		$resultFile = $this->storeFile($file, $location, $filename);

		return $resultFile->getRealPath();
	}

	/**
	 * Store/move the uploaded file to desired location.
	 *
	 * @param UploadedFile $file
	 * @param string       $location
	 * @param string       $filename
	 * @return \Symfony\Component\HttpFoundation\File\File
	 */
	private function storeFile(UploadedFile $file, $location, $filename)
	{
		return $file->move($location, $filename);
	}

	/**
	 * Generate a proper filename.
	 *
	 * @param UploadedFile $file
	 * @return bool|string
	 */
	private function getFilename(UploadedFile $file)
	{
        $path = $file->getClientOriginalName();
		$path .= '_' . dechex(time());
		$path .= '.' . $file->getClientOriginalExtension();

		return $path;
	}

}
