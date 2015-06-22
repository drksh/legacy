<?php

namespace DarkShare\Http\Middleware;

use Closure;

class ViewVariableShare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        view()->share('currentUser', app('auth')->user());

        return $next($request);
    }
}
