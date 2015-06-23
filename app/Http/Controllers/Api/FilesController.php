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
     */
    public function show(File $file)
    {
        if( $file->isProtected() && \Hash::check(app()->request->password, $file->password))
            return response()->download($file->path);

        if( ! $file->userHasAccess())
            return "Not authorized." . PHP_EOL;

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
	    $this->auth->basic('username');

        $data = [
          'title'   => ($request->input('title') ?: null),
          'password' => ($request->input('password') ?: null),
          'file' => $request->file('path'),
        ];


		$file = $this->dispatchFrom(StoreNewFileCommand::class, $request, $data);

        return 'http://drk.sh/' . $file->slug->slug . PHP_EOL;
	}

}
