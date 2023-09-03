<?php

namespace App\HTTP;

use Closure;
use Exception;
use App\Http\Request;
use App\Http\Response;
use ReflectionFunction;

class Router
{
    /**
     * URL
     * @var string
     */
    private string $url;
    /**
     * Prefix
     * @var string
     */
    private string $prefix = '';
    /**
     * Routes
     * @var array
     */
    private array $route = [];
    /**
     * Request
     * @var Request
     */
    private Request $request;

    public function __construct(string $url)
    {
        $this->request = new Request($this);
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Sets the prefix for the URL.
     * This function parses the URL and extracts the path from it. 
     * The extracted path is then assigned to the prefix property of the class.
     * @throws Some_Exception_Class A description of the exception that can be thrown by this function.
     * @return void
     */
    private function setPrefix(): void
    {
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'];
    }

    /**
     * Retrieves the URI from the request and returns the last segment.
     * @return string The last segment of the URI.
     */
    public function get(string $route, array $params = []): ?string
    {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * A description of the post PHP function.
     * @param string $route The route to post to
     * @param array $params An optional array of parameters
     * @throws Some_Exception_Class Description of exception
     * @return string|null The response from the function or null if there is no response
     */
    public function post(string $route, array $params = []): ?string
    {
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Adds a PUT route to the API.
     * @param string $route The route to be added.
     * @param array $params Optional parameters for the route.
     * @return string|null The result of adding the route.
     */
    public function puth(string $route, array $params = []): ?string
    {
        return $this->addRoute('PUT', $route, $params);
    }

    /**
     * Deletes a route.
     * @param string $route The route to be deleted.
     * @param array $params (Optional) Additional parameters for the route.
     * @return string|null The result of the deletion.
     */
    public function delete(string $route, array $params = []): ?string
    {
        return $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Adds a new route to the routing system.
     * @param string $httpMethod The HTTP method for the route.
     * @param string $route The route pattern.
     * @param array $params An optional array of route parameters.
     * @throws \Some_Exception_Class If something goes wrong.
     * @return void
     */
    private function addRoute(string $httpMethod, string $route, array $params = []): void
    {
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        $params['variables'] = [];

        $patternVariable = '/{(.*?)}/';
        if (preg_match_all($patternVariable, $route, $matches)) {
            $route = preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
        }

        $patternRoute = '/^' . str_replace('/', '\/', $route) . '$/';

        $this->route[$patternRoute][$httpMethod] = $params;
    }

    /**
     * Returns the URI.
     * @return string The URI.
     */
    private function getUri(): string
    {
        $uri = $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($xUri);
    }

    /**
     * Retrieves the route based on the current URI and HTTP method.
     * @return mixed The route matching the URI and HTTP method.
     * @throws Exception If the HTTP method is not allowed for the matching route.
     * @throws Exception If no route is found for the current URI.
     */
    private function getRoute()
    {
        $uri = $this->getUri();
        $httpMethod  = $this->request->getHttpMethod();

        foreach ($this->route as $patternRoute => $method) {

            if (preg_match($patternRoute, $uri, $matches)) {
                if (isset($method[$httpMethod])) {
                    unset($matches[0]);
                    $keys = $method[$httpMethod]['variables'];
                    $method[$httpMethod]['variables'] = array_combine($keys, $matches);
                    $method[$httpMethod]['variables']['request'] = $this->request;

                    return $method[$httpMethod];
                }
                throw new Exception("Método não permitido", 405);
            }
        }
        throw new Exception("URL não encontrada", 404);
    }

    /**
     * Run the function and return the response.
     * @throws Exception The URL cannot be processed or the page cannot be found.
     * @return Response The response object.
     */
    public function run(): Response
    {
        try {
            $route = $this->getRoute();

            if (!isset($route['controller'])) {
                throw new Exception("URL não pode ser processada", 500);
            }

            $args = [];

            $reflection = new ReflectionFunction($route['controller']);
            foreach ($reflection->getParameters() as $parameter) {
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }
            return call_user_func_array($route['controller'], $args);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }

    public function getCurrentUrl(): string
    {
        return $this->url . $this->getUri();
    }
}
