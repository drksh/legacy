<?php namespace DarkShare\Http\Controllers;

use DarkShare\Commands\DeleteFileCommand;
use DarkShare\Commands\StoreNewFileCommand;
use DarkShare\Http\Controllers\Traits\ProtectedTrait;
use DarkShare\Http\Requests\FilesRequest;
use DarkShare\Submissions\Files\File;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class FilesController extends Controller {

	use ProtectedTrait;

	/**
	 * Create a new files controller instance.
	 */
	public function __construct()
	{
		$this->middleware('app.space', ['only' => ['create', 'store']]);
	}

	/**
	 * Display a listing of files.
	 *
	 * @return Response
	 */
	public function index()
	{
		$files = File::all();

		return view('files.index', compact('files'));
	}

	/**
	 * Show the form for creating a new file.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('files.create');
	}

	/**
	 * Store a newly created file in storage.
	 *
	 * @param FilesRequest $request
	 * @return Response
	 */
	public function store(FilesRequest $request)
	{
		$this->dispatchFrom(StoreNewFileCommand::class, $request, ['file' => $request->file('path')]);

		flash("File successfully uploaded!");

		return redirect()->route('files.index');
	}

	/**
	 * Show the form for logging into a protected file.
	 *
	 * @param File $file
	 * @return \Illuminate\View\View
	 */
	public function login(File $file)
	{
		return view('files.login', compact('file'));
	}

	/**
	 * Authenticate to a protected file.
	 *
	 * @param File    $file
	 * @param Request $request
	 * @param Store   $session
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function authenticate(File $file, Request $request, Store $session)
	{
		if ( ! $file->authenticate($request->input('password'))) {
			flash()->warning('Wrong password');
			return redirect()->back();
		}

		flash("hello");
		$session->flash('files_auth', true);

		return redirect()->route('files.show', $file->id);
	}

	/**
	 * Display the specified file.
	 *
	 * @param File  $file
	 * @param Store $session
	 * @return Response
	 * @internal param int $id
	 */
	public function show(File $file, Store $session)
	{
		if ($this->protect($file, $session)) {
			flash("Authentication required");

			return redirect()->route('files.login', compact('file'));
		}

		return response()->download($file->path);
	}

	/**
	 * Remove the specified file from storage.
	 *
	 * @param  int  File $file
	 * @return Response
	 */
	public function destroy(File $file)
	{
		$this->dispatchFromArray(DeleteFileCommand::class, compact('file'));

		flash('File successfully deleted');

		return redirect()->route('files.index');
	}

}
