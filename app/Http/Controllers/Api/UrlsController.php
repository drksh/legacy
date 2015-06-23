<?php namespace DarkShare\Http\Controllers\Api;

use DarkShare\Commands\StoreNewUrlCommand;
use DarkShare\Http\Controllers\Controller;
use DarkShare\Http\Requests;
use DarkShare\Http\Requests\UrlsRequest;
use DarkShare\Submissions\Urls\Url;

use Illuminate\Contracts\Auth\Guard;

class UrlsController extends Controller {

    /**
     * Authentication instance
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new url controller instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth', ['only' => ['edit', 'update']]);
    }

    /**
     * Display the specified url.
     *
     * @param Url   $url
     * @return Response
     */
    public function show(Url $url)
    {
        if( $url->isProtected() && \Hash::check(app()->request->password, $url->password))
            return $url->destination . PHP_EOL;

        if( ! $url->userHasAccess())
            return "Not authorized." . PHP_EOL;


        return $url->destination . PHP_EOL;
    }

    /**
     * Store a newly created url in storage.
     *
     * @param UrlsRequest $request
     * @return Response
     */
    public function store(UrlsRequest $request)
    {

        $this->auth->basic('username');

        $data = [
            'password' => ($request->input('password') ?: null),
        ];

        $url = $this->dispatchFrom(StoreNewUrlCommand::class, $request, $data);

        return 'http://drk.sh/' . $url->slug->slug . PHP_EOL;
    }

}
