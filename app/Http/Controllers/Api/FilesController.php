<?php namespace DarkShare\Http\Controllers\Api;

use DarkShare\Commands\DeleteFileCommand;
use DarkShare\Commands\StoreNewFileCommand;
use DarkShare\Http\Controllers\Controller;
use DarkShare\Http\Requests\FilesRequest;
use DarkShare\Submissions\Files\File;

use Illuminate\Auth\Guard;

class FilesController extends Controller {

    /**
     * Authentication instance
     *
     * @var \Illuminate\Auth\Guard
     */
    protected $auth;


    /**
     * Create a new files controller instance.
     *
     * @param \Illuminate\Auth\Guard $auth
     */
	public function __construct(Guard $auth)
	{
        $this->auth = $auth;

		$this->middleware('app.space', ['only' => ['create', 'store']]);
    }

    /**
     * Display the specified file.
     *
     * @param File  $file
     * @return Response
     * @internal param int $id
     */
    public function show(File $file)
    {
        if( ! $file->isProtected())
            return response()->download($file->path);

        if(is_null($file->user))
            return "Not authorized" . PHP_EOL;

        if( ! $this->auth->check())
            return "Not authorized" . PHP_EOL;

        if($this->auth->id() != $file->user->id)
            return "Not authorized" . PHP_EOL;

        return response()->download($file->path);
    }

	/**
	 * Store a newly created file in storage.
	 *
	 * @param FilesRequest $request
	 * @return Response
	 */
	public function store(FilesRequest $request)
	{
        $data = [
          'title'   => ($request->input('title') ?: null),
          'password' => ($request->input('password') ?: null),
          'file' => $request->file('path'),
        ];


		$file = $this->dispatchFrom(StoreNewFileCommand::class, $request, $data);

        return 'Success! http://drk.sh/' . $file->slug->slug . PHP_EOL;
	}

	/**
	 * Remove the specified file from storage.
	 *
	 * @param  int  File $file
	 * @return Response
	 */
	public function destroy(File $file)
	{

        if( ! $file->user)
            return "Not authorized." . PHP_EOL;

        if( ! $this->auth->check())
            return "Not authorized." . PHP_EOL;

        if($this->auth->id() != $file->user->id)
            return "Not authorized." . PHP_EOL;

        $this->dispatchFromArray(DeleteFileCommand::class, compact('file'));

        return "File deleted!" . PHP_EOL;
	}

}
