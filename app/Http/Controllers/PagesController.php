<?php namespace DarkShare\Http\Controllers;

use DarkShare\Http\Requests;
use DarkShare\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function getIndex()
	{
		return view('pages.index');
	}

}
