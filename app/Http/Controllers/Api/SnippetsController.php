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
        if( $snippet->isProtected() && \Hash::check(app()->request->password, $snippet->password))
            return $snippet->body . PHP_EOL;

        if( ! $snippet->userHasAccess())
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
        $this->auth->basic('username');

        $data = [
            'title' => ($request->input('title') ?: null),
            'user_id' => ($this->auth->user()) ? $this->auth->id() : null,
            'password'  => ($request->input('password') ?: null),
            'mode'  => ($request->input('mode') ?: 'markdown'),
        ];

        $snippet = $this->dispatchFrom(StoreNewSnippetCommand::class, $request, $data);


        return 'http://drk.sh/s/' . $snippet->slug->slug . PHP_EOL;
    }

}

