<?php namespace DarkShare\Http\Controllers\Admin;

use DarkShare\Http\Requests;
use DarkShare\Http\Controllers\Controller;

use DarkShare\Submissions\Snippets\Snippet;
use DarkShare\Users\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AdminController extends Controller {

    function __construct(Request $request)
    {
        $this->middleware('admin.protect');
    }

    /**
     * Display a listing of most active users
     * - ordered by snippets, files and urls
     *
     * @return \DarkShare\Http\Controllers\Admin\Response
     */
	public function index()
	{
        $snippetsUsers = User::with('snippets')->get()->sortByDesc(function($query)
        {
            return $query->snippets->count();
        })->take(15);

        $filesUsers = User::with('files')->get()->sortByDesc(function($query)
        {
            return $query->files->count();
        })->take(15);

        $urlsUsers = User::with('urls')->get()->sortByDesc(function($query)
        {
            return $query->urls->count();
        })->take(15);

		return view('admin.index', compact('snippetsUsers', 'filesUsers', 'urlsUsers'));
	}

    /**
     * Display a listing of a users latest content
     *
     * @param                       $code
     * @param \DarkShare\Users\User $user
     * @return \Illuminate\View\View
     */
    public function user($code, User $user)
    {
        $user->load(['snippets', 'files', 'urls']);

        return view('admin.users', compact('user'));
    }

    public function snippets($code, User $user)
    {
        $snippets = $user->snippets;

        return view('admin.snippets', compact('snippets'));
    }

    public function files($code, User $user)
    {
        $files = $user->files;

        return view('admin.files', compact('files'));
    }

    public function urls($code, User $user)
    {
        $urls = $user->urls;

        return view('admin.urls', compact('urls'));
    }


}
