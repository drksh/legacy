<?php namespace DarkShare\Http\Controllers;

use DarkShare\Commands\StoreNewSnippetCommand;
use DarkShare\Commands\UpdateSnippetCommand;
use DarkShare\Http\Controllers\Traits\ProtectedTrait;
use DarkShare\Http\Requests;
use DarkShare\Http\Requests\SnippetsRequest;
use DarkShare\Submissions\Snippets\Snippet;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class SnippetsController extends Controller {

	use ProtectedTrait;

	/**
	 * Create a new snippets controller instance.
	 */
	function __construct()
	{
		$this->middleware('app.space', ['only' => ['create', 'store']]);
	}

	/**
	 * Display a listing of the snippets.
	 *
	 * @return Response
	 */
	public function index()
	{
	    return view('snippets.create');
	}

	/**
	 * Show the form for creating a new snippet.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('snippets.create');
	}

	/**
	 * Store a newly created snippet in storage.
	 *
	 * @param SnippetsRequest $request
	 * @return Response
	 */
	public function store(SnippetsRequest $request, Guard $auth)
	{
		$data = ['user_id' => ($auth->user()) ? $auth->user()->id : null];

		$snippet = $this->dispatchFrom(StoreNewSnippetCommand::class, $request, $data);

		flash('Snippet was successfully created.');

		return redirect()->route('snippets.show', $snippet->slug->slug);
	}

    /**
     * Show the form for logging into a protected snippet.
     *
     * @param Snippet $snippet
     * @return \Illuminate\View\View
     */
	public function login(Snippet $snippet)
	{
		return view('snippets.login', compact('snippet'));
	}

    /**
     * Authenticate to a protected snippet.
     *
     * @param Snippet                   $snippet
     * @param \Illuminate\Http\Request  $request
     * @param \Illuminate\Session\Store $session
     * @return \Illuminate\Http\RedirectResponse
     */
	public function authenticate(Snippet $snippet, Request $request, Store $session)
	{
		if ( ! $snippet->authenticate($request->input('password'))) {
			flash()->warning('Wrong password');
			return redirect()->back();
		}

		$session->flash('snippets_auth', true);

		return redirect()->route('snippets.show', $snippet->slug->slug);
	}

    /**
     * Display the specified snippet.
     *
     * @param \DarkShare\Submissions\Snippets\Snippet $snippet
     * @param \Illuminate\Session\Store               $session
     * @return \DarkShare\Http\Controllers\Response
     */
	public function show(Snippet $snippet, Store $session)
	{
		if ($this->protect($snippet, $session)) {
			return redirect()->route('snippets.login', $snippet->slug->slug);
		}

		return view('snippets.show', compact('snippet'));
	}

    /**
     * Show the form for editing the specified snippet.
     *
     * @param \DarkShare\Submissions\Snippets\Snippet $snippet
     * @return \DarkShare\Http\Controllers\Response
     */
	public function edit(Snippet $snippet)
	{
		return view('snippets.edit', compact('snippet'));
	}

    /**
     * Update the specified snippet in storage.
     *
     * @param \DarkShare\Submissions\Snippets\Snippet  $snippet
     * @param \DarkShare\Http\Requests\SnippetsRequest $request
     * @return \DarkShare\Http\Controllers\Response
     */
	public function update(Snippet $snippet, SnippetsRequest $request)
	{
		$this->dispatchFrom(UpdateSnippetCommand::class, $request, compact('snippet'));

		flash('Snippet was successfully updated.');

		return redirect()->route('snippets.show', $snippet->slug->slug);
	}

    /**
     * Remove the specified snippet from storage.
     *
     * @param \DarkShare\Submissions\Snippets\Snippet $snippet
     * @return \DarkShare\Http\Controllers\Response
     * @throws \Exception
     */
	public function destroy(Snippet $snippet)
	{
		$snippet->delete();

		return redirect()->back();
	}

}
