<?php

namespace App\Http\Middleware;

interface MiddlewareInterface {

    public function handle($request, $next);

}