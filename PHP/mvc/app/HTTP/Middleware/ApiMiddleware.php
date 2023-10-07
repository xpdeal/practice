<?php

namespace App\Http\Middleware;

use App\Http\Middleware\MiddlewareInterface;


class ApiMiddleware implements MiddlewareInterface
{
    public function handle($request, $next)
    {
        $request->getRouter()->setContentType('aplication/json');
        return $next($request);
    }
}
