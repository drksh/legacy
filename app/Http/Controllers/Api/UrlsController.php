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
        if( ! $url->isProtected())
            return $url->destination . PHP_EOL;

        if(is_null($url->user))
            return "Not authorized." . PHP_EOL;

        if( ! $this->auth->check())
            return "Not authorized." . PHP_EOL;

        if($this->auth->id() != $url->user->id)
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
        $data = [
            'password' => ($request->input('password') ?: null),
        ];

        $url = $this->dispatchFrom(StoreNewUrlCommand::class, $request, $data);

        return 'http://drk.sh/' . $url->slug->slug . PHP_EOL;
    }

    /**
     * Remove the specified url from storage.
     *
     * @param  int  Url $url
     * @return Response
     */
    public function destroy(Url $url)
    {
        if( ! $url->user)
            return "Not authorized." . PHP_EOL;

        if( ! $this->auth->check())
            return "Not authorized." . PHP_EOL;

        if($this->auth->id() != $url->user->id)
            return "Not authorized." . PHP_EOL;

        $url->delete();

        return "URL deleted!" . PHP_EOL;
    }

}
