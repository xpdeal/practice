<?php

namespace App\HTTP;

use App\Http\Request;
use Closure;

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
    private array $route = [];

    /**
     * Sntance Request
     * @var Request
     */
    private Request $request;

    /**
     * Constructs a new instance of the class.
     * @param mixed $url The URL parameter.
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

    public function get(string $route, array $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

    private function addRoute(string $method, string $route, array $params)
    {
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params[$key] = $value($this->request);}
        }
    }
}
