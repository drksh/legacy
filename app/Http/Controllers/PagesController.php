<?php namespace DarkShare\Http\Controllers;

use DarkShare\Http\Requests;

class PagesController extends Controller {

	/**
	 * Show the index/home page
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{
		return view('pages.index');
	}

}
