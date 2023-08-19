<?php

namespace App\HTTP;

class Request
{
    /**
     * Router
     * @var Router
     */
    private Router $router;

    /**
     * Query Strings
     * @var array
     */
    private array $queryParams = [];
    /**
     * Posts
     * @var array
     */
    private array $postVars = [];
    /**
     * Headers 
     * @var array
     */
    private array $headers = [];
    /**
     * Http Method
     * @var string
     */
    private string $httpMethod;
    /**
     * URI
     * @var string
     */
    private string $uri;

    public function __construct($router)
    {
        $this->router = $router;
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
        $this->setUri();
    }

    /**
     * Set the value of uri
     * @param string $uri
     * @return void
     */
    public function setUri(): void
    {
        $this->uri = $_SERVER['REQUEST_URI'] ?? ' ';      
        $xURI = explode('?', $this->uri);
        $this->uri = $xURI[0];
    }

    /**
     * Get the value of queryParam
     * @return datatype $this->queryParam The value of queryParam
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * Retrieves the post variables.
     * @return array The post variables.
     */
    public function getPostVars(): array
    {
        return $this->postVars;
    }

    /**
     * Retrieves the headers of the object.
     * @return array The headers of the object.
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Returns the HTTP method of the object.
     * @return string The HTTP method.
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * Retrieves the URI.
     * @return string The URI.
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Get the value of router
     *
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }
}
