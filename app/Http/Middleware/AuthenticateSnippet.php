<?php namespace DarkShare\Http\Middleware;

use Closure;

class AuthenticateSnippet {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		return $next($request);
	}

}
