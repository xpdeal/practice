<?php

namespace App\HTTP;


class Request
{
    /**
     * URL Params ($_GET)
     * @var array
     */
    private array $queryParams = [];

    /**
     * Received variable on Post
     * @var array
     */
    private array $postVars = [];

    /**
     * Header of Request
     *
     * @var array
     */
    private array $headers = [];

    /**
     * Http Request Method
     * @var string
     */
    private string $httpMethod;

    /**
     * Page's URI
     * @var string
     */
    private string $uri;

    /**
     * Creates a new instance of the class.
     * @return void
     */
    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * Retrieves the query parameters as an array.
     * @return array The query parameters.
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * Get the post variables.
     * @return array
     */
    public function getPostVars(): array
    {
        return $this->postVars;
    }

    /**
     * Get header of Request
     * @return  array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Retrieves the HTTP method used for the request.
     * @return string The HTTP method used for the request.
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * Retrieves the URI.
     * @return datatype The URI.
     */
    public function getUri(): string
    {
        return $this->uri;
    }
}
