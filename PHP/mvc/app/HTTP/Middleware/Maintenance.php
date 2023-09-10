<?php

namespace App\Http\Middleware;

use Exception;
use App\Http\Middleware\MiddlewareInterface;


class Maintenance implements MiddlewareInterface
{
    public function handle($request, $next)
    {
        if(getenv('MAINTENANCE') == 'true'){
            throw new Exception("Page in maintenance", 200);
            
        }
        return $next($request);
    }
}
