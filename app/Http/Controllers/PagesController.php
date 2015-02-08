<?php namespace MediShare\Http\Controllers;

use MediShare\Http\Requests;
use MediShare\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function getIndex()
	{
		return view('pages.index');
	}

}
