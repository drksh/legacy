<?php namespace DarkShare\Http\Controllers;

use DarkShare\Http\Requests;
use DarkShare\Http\Controllers\Controller;

use DarkShare\Http\Requests\FilesRequest;
use DarkShare\Submissions\Files\File;
use Illuminate\Http\Request;

class FilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('files.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('files.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param FilesRequest $request
	 * @return Response
	 */
	public function store(FilesRequest $request)
	{

		dd($request->file('path'));
		// TODO: dispatch command from request

		flash("File successfully uploaded!");

		return redirect()->route('files.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(File $file)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(File $file)
	{
		return view('files.edit', compact('file'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  File $file
	 * @return Response
	 */
	public function update(File $file, FilesRequest $request)
	{
		// TODO: Dispatch command from request
		flash('File successfully updated');

		return redirect()->route('files.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  File $file
	 * @return Response
	 */
	public function destroy(File $file)
	{
		$file->delete();

		flash('File successfully deleted');

		return redirect()->route('files.index');
	}

}
