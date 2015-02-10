<?php namespace DarkShare\Http\Controllers;

use DarkShare\Commands\StoreNewSnippetCommand;
use DarkShare\Commands\UpdateSnippetCommand;
use DarkShare\Http\Requests;
use DarkShare\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DarkShare\Http\Requests\SnippetsRequest;
use DarkShare\Submissions\Snippets\Snippet;

class SnippetsController extends Controller {

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
	public function store(SnippetsRequest $request)
	{
		$this->dispatchFrom(StoreNewSnippetCommand::class, $request);

		flash('Snippet was successfully created.');

		return redirect()->route('snippets.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Snippet $snippet)
	{
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
	public function destroy($id)
	{
		Snippet::destroy($id);

		return redirect()->route('snippets.index');
	}

}
