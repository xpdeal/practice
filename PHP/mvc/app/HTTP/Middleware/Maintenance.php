<?php

namespace App\Http\Middleware;

use Exception;

class Maintenance
{
    public function handle($request, $next)
    {
        if(getenv('MAINTENANCE') == 'true'){
            throw new Exception("Page in maintenance", 200);
            
        }
        return $next($request);
    }
}
