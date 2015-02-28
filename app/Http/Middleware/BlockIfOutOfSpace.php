<?php namespace DarkShare\Http\Middleware;

use Closure;

class BlockIfOutOfSpace {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if( ! has_disk_space()) {
			flash()->error('Sorry but there is no disk space left on server...');
			return redirect()->back();
		}

		return $next($request);
	}

}
