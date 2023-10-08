<?php

namespace App\Http\Middleware;

use Exception;
use App\Http\Request;
use App\Http\Middleware\MiddlewareInterface;
use App\Model\entity\User;

class UserBasicAuthMiddleware implements MiddlewareInterface
{
    public function handle($request, $next)
    {
        $this->basicAuth($request);
        return $next($request);
    }

    private function basicAuth(Request $request)
    {
        if ($obUser = $this->getBasicAuthUser()) {
            echo "<pre>";
            var_dump($obUser);
            exit();
            // $request->setUser($obUser);
        }

        throw new Exception("Usuario ou senha incorretos", 403);
    }

    private function getBasicAuthUser(): mixed
    {
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
            return false;            
            // header('WWW-Authenticate: Basic realm="Login Required"');
            // header('HTTP/1.0 401 Unauthorized');
            // exit;
        }

        $obUser = User::getUserByEmail($_SERVER['PHP_AUTH_USER']);        
        
        // if (!$obUser instanceof User) {
        //     return false;
        // }
        
        
        return password_verify($_SERVER['PHP_AUTH_PW'], $obUser->pass) ? $obUser : false;
    }
}
