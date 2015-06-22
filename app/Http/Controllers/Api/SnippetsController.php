<?php namespace DarkShare\Http\Controllers\Api;

use DarkShare\Commands\StoreNewSnippetCommand;
use DarkShare\Http\Controllers\Controller;
use DarkShare\Http\Requests;
use DarkShare\Http\Requests\SnippetsRequest;
use DarkShare\Submissions\Snippets\Snippet;
use Illuminate\Auth\Guard;

class SnippetsController extends Controller {

    /**
     * Authentication instance
     *
     * @var \Illuminate\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new snippets controller instance.
     */
    function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('app.space', ['only' => ['create', 'store']]);
    }

    /**
     * Display the specified snippet.
     *
     * @param \DarkShare\Submissions\Snippets\Snippet $snippet
     * @return string
     */
    public function show(Snippet $snippet)
    {
        if( ! $snippet->isProtected())
            return $snippet->body . PHP_EOL;

        if(is_null($snippet->user))
            return "Not authorized.". PHP_EOL;

        if( ! $this->auth->check())
            return "Not authorized." . PHP_EOL;

        if($this->auth->id() != $snippet->user->id)
            return "Not authorized." . PHP_EOL;

        return $snippet->body;
    }

    /**
     * Store a newly created snippet in storage.
     *
     * @param SnippetsRequest $request
     * @return Response
     */
    public function store(SnippetsRequest $request)
    {
        $data = [
            'user_id' => ($this->auth->user()) ? $this->auth->user()->id : null,
            'password'  => ($request->input('password') ?: null),
            'mode'  => ($request->input('mode') ?: 'markdown'),
        ];

        $snippet = $this->dispatchFrom(StoreNewSnippetCommand::class, $request, $data);


        return 'http://drk.sh/s/' . $snippet->slug->slug . PHP_EOL;
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
        if( ! $snippet->user)
            return "Anon snippets, cannot get deleted". PHP_EOL;

        if( ! $this->auth->check())
            return "Not authorized" . PHP_EOL;

        if($this->auth->id() != $snippet->user->id)
            return "Not authorized" . PHP_EOL;

        $snippet->delete();

        return "Snippet successfully deleted!" . PHP_EOL;
    }

}
