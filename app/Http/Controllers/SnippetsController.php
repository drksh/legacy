<?php namespace DarkShare\Http\Controllers;

use Contracts\Models\ProtectableContract;
use DarkShare\Commands\StoreNewSnippetCommand;
use DarkShare\Commands\UpdateSnippetCommand;
use DarkShare\Http\Controllers\Traits\ProtectedTrait;
use DarkShare\Http\Requests;
use DarkShare\Http\Controllers\Controller;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use DarkShare\Http\Requests\SnippetsRequest;
use DarkShare\Submissions\Snippets\Snippet;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;

class SnippetsController extends Controller {

	use ProtectedTrait;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$snippets = Snippet::all();

		return view('snippets.index', compact('snippets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('snippets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SnippetsRequest $request
	 * @return Response
	 */
	public function store(SnippetsRequest $request, Guard $auth)
	{
		$data = ['user_id' => ($auth->user()) ? $auth->user()->id : null];

		$this->dispatchFrom(StoreNewSnippetCommand::class, $request, $data);

		flash('Snippet was successfully created.');

		return redirect()->route('snippets.index');
	}

	/**
	 * Show the form for logging into a protected Snippet
	 *
	 * @param Snippet $snippet
	 */
	public function login(Snippet $snippet)
	{
		return view('snippets.login', compact('snippet'));
	}

	/**
	 * Authenticate to a protected Snippet
	 *
	 * @param Snippet $snippet
	 */
	public function authenticate(Snippet $snippet, Request $request, Store $session)
	{

		if( ! $snippet->authenticate($request->input('password')))
		{
			flash()->warning('Wrong password');
			return redirect()->back();
		}

		$session->flash('snippets_auth', true);

		return redirect()->route('snippets.show', $snippet->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Snippet $snippet, Store $session)
	{
		if($this->protect($snippet, $session))
		{
			return redirect()->route('snippets.login', compact('snippet'));
		}

		return view('snippets.show', compact('snippet'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Snippet $snippet)
	{
		return view('snippets.edit', compact('snippet'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Snippet $snippet, SnippetsRequest $request)
	{
		$this->dispatchFrom(UpdateSnippetCommand::class, $request, compact('snippet'));

		flash('Snippet was successfully updated.');

		return redirect()->route('snippets.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Snippet $snippet)
	{
		$snippet->delete();

		return redirect()->route('snippets.index');
	}

}
