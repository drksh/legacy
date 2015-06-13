<?php namespace DarkShare\Http\Controllers;

use DarkShare\Http\Requests;
use Illuminate\Contracts\Auth\Guard;

class UsersController extends Controller
{

    /**
     * The authenticated user
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    private $auth;

    function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth');
    }

    function snippets()
    {
        $snippets = $this->auth->user()->snippets()->get();

        return view('snippets.index', compact('snippets'));
    }

    function files()
    {
        $files = $this->auth->user()->files()->get();

        return view('files.index', compact('files'));
    }

    function urls()
    {
        $urls = $this->auth->user()->urls()->get();

        return view('urls.index', compact('urls'));
    }
}
