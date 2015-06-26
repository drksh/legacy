<?php namespace DarkShare\Services;

class DarkShare {

    public static $maxPerIp = 100;

    public static function isApi() {

        $requestUserAgent = app()->request->headers->get('user-agent');
        $requestHost = app()->request->headers->get('host');

        $isCurl = strpos(strtolower($requestUserAgent), 'curl') !== false;
        $isWget = strpos(strtolower($requestUserAgent), 'wget') !== false;
        $isApi  = strpos(strtolower($requestHost), 'api.') === 0;


        // The user agent is curl or wget
        return $isCurl || $isWget || $isApi || app()->runningInConsole();
    }

}
