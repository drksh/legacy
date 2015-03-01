<?php namespace DarkShare\Http\Controllers;

use DarkShare\Http\Requests;
use DarkShare\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UrlsController extends Controller {

	/**
	 * Display a listing of the urls.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('urls.index');
	}

	/**
	 * Show the form for creating a new url.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created url in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
