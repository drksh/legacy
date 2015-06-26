<?php namespace DarkShare\Http\Controllers\Api;

use DarkShare\Http\Controllers\Controller;

class ApiController extends Controller {


    public function limit() {
        return 'Activity limit reached.'. PHP_EOL;
    }

}
