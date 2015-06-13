<?php namespace DarkShare\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminProtect {

    /**
     * Guard/Auth instance
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    private $auth;

    function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

	    $user = $this->auth->user();

	    if( ! $user) {
	        return redirect()->home();
	    }

	    if( ! $user->isAdmin()) {
	        return redirect()->home();
	    }

	    if( ! $request->authcode) {
	        return redirect()->home();
	    }

	    if( ! $this->isCorrectCode($request->authcode)) {
	        return redirect()->home();
	    }

        // Share the authentication code through all views
        view()->share([
          'authcode' => $request->authcode,
        ]);

		return $next($request);
	}

    private function isCorrectCode($authcode)
    {
        $date = date('Mj-Y-H');
        $md5sum = md5($date);
        $md5sum = substr($md5sum, 0, 6);

        return $md5sum == $authcode;
    }

}
