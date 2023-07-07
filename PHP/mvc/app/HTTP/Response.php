<?php

namespace App\HTTP;

class Response
{

    /**
     * http Status Code
     * @var integer
     */
    private int $httpStatusCode;

    /**
     * Received headers
     * @var array
     */
    private array $headers = [];

    /**
     * Content Type
     * @var string
     */
    private string $contentType = 'text/html';

    /**
     * Response content
     * @var mixed
     */
    private mixed $content;

    /**
     * A description of the entire PHP function.
     * @param datatype $httpStatusCode description
     * @param datatype $content description
     * @param string $contentType description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function __construct($httpStatusCode, $content, $contentType = 'text/html')
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    /**
     * Set the content type.
     * @param string $contentType The content type to be set.
     * @throws Some_Exception_Class Description of exception.
     * @return void
     */
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Adds a header to the response headers array.
     * @param mixed $key The key of the header.
     * @param mixed $value The value of the header.
     * @return $this The current object.
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Sends the HTTP response headers.
     * @throws Some_Exception_Class description of exception
     */
    private function sendHeaders()
    {
        http_response_code($this->httpStatusCode);

        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }
    }

    /**
     * Send a response based on the content type.
     * @return void
     */
    public function sendResponse()
    {
        $this->sendHeaders();

        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit();
        }
    }
}
