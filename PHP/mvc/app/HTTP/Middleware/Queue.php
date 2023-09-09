<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Http\Response;

class Queue
{
    private static array $default = [];
    
    private static array $map = [];

    private array $middlewares = [];

    private Closure $controller;

    private array $controllerArgs = [];

    public function __construct(array $middlewares, $controller, array $controllerArgs)
    {
        $this->middlewares = array_merge(self::$default,$middlewares);
        $this->controller = $controller;
        $this->controllerArgs = $controllerArgs;
    }

    public static function setDefault($default): void
    {
        self::$default = $default;
    }
    
    public static function setMap($map): void
    {
        self::$map = $map;
    }

    public function next($request)
    {
        if (empty($this->middlewares)) {
            return call_user_func_array($this->controller, $this->controllerArgs);
        }
        
        $middleware = array_shift($this->middlewares);
        
        if(!isset(self::$map[$middleware])){
            throw new Exception("Error Processing Middleware", 500);            
        }
        
        $queue = $this;
        $next = function($request) use($queue) {
            return $queue->next($request);
        };
        
        return (new self::$map[$middleware])->handle($request, $next);
    }
}
