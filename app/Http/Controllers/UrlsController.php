<?php namespace DarkShare\Http\Controllers;

use DarkShare\Commands\CreateNewURLCommand;
use DarkShare\Http\Requests;
use DarkShare\Http\Controllers\Controller;

use DarkShare\Http\Requests\UrlsRequest;
use DarkShare\Submissions\Urls\Url;

class UrlsController extends Controller {

	/**
	 * Display a listing of the urls.
	 *
	 * @return Response
	 */
	public function index()
	{
		$urls = Url::all();

		return view('urls.index', compact('urls'));
	}

	/**
	 * Show the form for creating a new url.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('urls.create');
	}

	/**
	 * Store a newly created url in storage.
	 *
	 * @param UrlsRequest $request
	 * @return Response
	 */
	public function store(UrlsRequest $request)
	{
		$this->dispatchFrom(CreateNewUrlCommand::class, $request);

		flash("Short URL successfully created");
		return redirect()->route('urls.index');
	}

	/**
	 * Display the specified url.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified url.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified url in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified url from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
