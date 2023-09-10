<?php

namespace App\Http\Middleware;

use App\Http\Middleware\MiddlewareInterface;
use App\Session\Admin\SessionAdmin;

class RequiredAdminLogout implements MiddlewareInterface
{
    public function handle($request, $next)
    {
        if(SessionAdmin::isLogged()){
            $request->getRouter()->redirect('/admin/login');
        }
        
        return $next($request);
    }
}
