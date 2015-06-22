<?php namespace DarkShare\Http\Controllers;

use DarkShare\Commands\StoreNewUrlCommand;
use DarkShare\Commands\UpdateUrlCommand;
use DarkShare\Http\Controllers\Traits\ProtectedTrait;
use DarkShare\Http\Requests;
use DarkShare\Http\Requests\UrlsRequest;
use DarkShare\Submissions\Urls\Url;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class UrlsController extends Controller {

    use ProtectedTrait;

    /**
     * Authentication instance
     *
     * @var Guard
     */
    private $auth;

    function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the urls.
     *
     * @return Response
     */
    public function index()
    {
        return view('urls.create');
    }

    /**
     * Show the form for creating a new url.
     *
     * @return Response
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created url in storage.
     *
     * @param UrlsRequest $request
     * @return Response
     */
    public function store(UrlsRequest $request)
    {
        $url = $this->dispatchFrom(StoreNewUrlCommand::class, $request);

        flash(
            "Short URL created: " .
            "<a href=\"{$url->url()}\">{$url->url()}</a>"
        );
        return redirect()->route('create.index');
    }

    /**
     * Show the form for logging into a protected url.
     *
     * @param Url $url
     * @return \Illuminate\View\View
     */
    public function login(Url $url)
    {
        return view('urls.login', compact('url'));
    }

    /**
     * Authenticate to a protected snippet.
     *
     * @param Url                       $url
     * @param \Illuminate\Http\Request  $request
     * @param \Illuminate\Session\Store $session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Url $url, Request $request, Store $session)
    {

        if ( ! $url->authenticate($request->input('password'))) {
            flash()->warning('Wrong password');
            return redirect()->back();
        }

        $session->flash('urls_auth', true);

        return redirect()->route('urls.show', $url->slug->slug);
    }

    /**
     * Display the specified url.
     *
     * @param Url   $url
     * @param Store $session
     * @return Response
     */
    public function show(Url $url, Store $session)
    {
        if ($this->protect($url, $session)) {
            return redirect()->route('urls.login', $url->slug->slug);
        }
        return redirect()->away($url->destination, 301);
    }

    /**
     * Show the form for editing the specified url.
     *
     * @param  int  Url $url
     * @return Response
     */
    public function edit(Url $url)
    {
        if ( ! $this->auth->user()->ownsUrl($url)) {
            flash()->warning("You can only change urls you own. It's not total anarchy.");
            return redirect()->back(302);
        }

        return view('urls.edit', compact('url'));
    }

    /**
     * Update the specified url in storage.
     *
     * @param \DarkShare\Http\Requests\UrlsRequest $request
     * @param                                      int  Url $url
     * @return \DarkShare\Http\Controllers\Response
     */
    public function update(UrlsRequest $request, Url $url)
    {
        $this->dispatchFrom(UpdateUrlCommand::class, $request, compact('url'));

        flash("Your URL was updated successfully.");
        return redirect()->route('create.index');
    }

    /**
     * Remove the specified url from storage.
     *
     * @param  int  Url $url
     * @return Response
     */
    public function destroy(Url $url)
    {
        $url->delete();

        flash("URL successfully deleted.");
        return redirect()->back();
    }

}
