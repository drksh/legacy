<?php namespace DarkShare\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return parent::handle($request, $next);
    }

    protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($request->is($except)) {
                return true;
            }
        }

        $requestUserAgent = app()->request->headers->get('user-agent');
        $requestHost = app()->request->headers->get('host');

        $isCurl = strpos(strtolower($requestUserAgent), 'curl') !== false;
        $isWget = strpos(strtolower($requestUserAgent), 'wget') !== false;
        $isApi  = strpos(strtolower($requestHost), 'api.') === 0;


        // The user agent is curl or wget
        if($isCurl || $isWget || $isApi || app()->runningInConsole()) {
            return true;
        }

        return false;
    }

}
