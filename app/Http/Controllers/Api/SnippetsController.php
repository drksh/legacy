<?php namespace DarkShare\Http\Controllers\Api;

use DarkShare\Commands\StoreNewSnippetCommand;
use DarkShare\Commands\UpdateSnippetCommand;
use DarkShare\Http\Controllers\Controller;
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
     * Display the specified snippet.
     *
     * @param \DarkShare\Submissions\Snippets\Snippet $snippet
     * @param \Illuminate\Auth\Guard                  $auth
     * @return string
     */
    public function show(Snippet $snippet, Guard $auth)
    {
        if( ! $snippet->isProtected())
            return $snippet->body;

        if( ! $auth->check())
            return "Not authorized";

        if($auth->id() != $snippet->user->id)
            return "Not authorized";

        return $snippet->body;
    }

    /**
     * Store a newly created snippet in storage.
     *
     * @param SnippetsRequest $request
     * @return Response
     */
    public function store(SnippetsRequest $request, Guard $auth)
    {
        $data = [
            'user_id' => ($auth->user()) ? $auth->user()->id : null,
            'password'  => ($request->input('password') ?: null),
        ];

        $snippet = $this->dispatchFrom(StoreNewSnippetCommand::class, $request, $data);


        return 'Success! http://drk.sh/s/' . $snippet->slug->slug;
    }

    /**
     * Remove the specified snippet from storage.
     *
     * @param \DarkShare\Submissions\Snippets\Snippet $snippet
     * @return \DarkShare\Http\Controllers\Response
     * @throws \Exception
     */
    public function destroy(Snippet $snippet, Guard $auth)
    {
        if( ! $snippet->user)
            return "Anon snippets, cannot get deleted";

        if( ! $auth->check())
            return "Not authorized";

        if($auth->id() != $snippet->user->id)
            return "Not authorized";

        $snippet->delete();

        return "Snippet successfully deleted!";
    }

}

