<?php

namespace App\HTTP;

use App\Http\Request;
use App\Http\Response;
use Closure;
use Exception;

class Router
{
    /**
     * FULL URL
     * @var string
     */
    private string $url;

    /**
     * Prefix of Route
     * @var string
     */
    private string $prefix;

    /**
     * Route Indice
     * @var array
     */
    private array $routes = [];

    /**
     * Sntance Request
     * @var Request
     */
    private Request $request;

    /**
     * Constructs a new instance of the class.
     * @param string $url The URL parameter.
     */
    public function __construct(string $url)
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Set the prefix for the URL.
     * This function parses the URL and sets the prefix property of the current object
     * based on the 'path' component of the parsed URL.
     * @throws Some_Exception_Class If the URL cannot be parsed.
     * @return void
     */
    private function setPrefix()
    {
        $parseUrl = parse_url($this->url);

        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Adds a GET route to the router.
     * @param string $route The route to add.
     * @param array $params Additional parameters for the route.
     * @return mixed The result of adding the route.
     */
    public function get(string $route, array $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Adds a route to the routing table.
     * @param string $method The HTTP method for the route.
     * @param string $route The URL pattern for the route.
     * @param array $params An array of route parameters.
     * @return void
     */
    private function addRoute(string $method, string $route, array $params)
    {
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        $patternRoute = '/^' . str_replace('/', '\/', $route) . "$/";

        $this->routes[$patternRoute][$method] = $params;
    }

    public function run()
    {
        try {
            $route = $this->getRoute();
            echo "<pre>";
            print_r($route);
            echo "</pre>";
            exit;
            // throw new Exception("Página não encontrada", 404);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }

    private function getRoute()
    {
        $uri = $this->getUri();

        $httpMethod = $this->request->getHttpMethod();

        foreach ($this->routes as $patternRoute => $methods) {
            if (preg_match($patternRoute, $uri)) {
                if ($methods[$httpMethod]) {
                    return $methods[$httpMethod];
                }
                
                throw new Exception("Metodo não é permitido", 405);
            }
        }
        throw new Exception("URL não encontrada", 404);
    }

    private function getUri()
    {
       $uri = (string) $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($xUri);
    }
}
