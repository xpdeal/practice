<?php

namespace App\HTTP;

class Response
{
    /**
     * Status code 
     * @var integer
     */
    private int $statusCode;
    /**
     *Headers
     * @var array
     */
    private array $headers = [];
    /**
     * Content Type
     * @var string
     */
    private string $contentType;
    /**
     * Content
     *
     * @var string
     */
    private string $content;


    public function __construct(int $statusCode, string $content, string $contentType = 'text/html')
    {
        $this->statusCode = $statusCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    /**
     * Sets the content type for the response.
     * @param string $contentType The content type to set.
     * @throws Some_Exception_Class Description of exception.
     * @return void
     */
    private function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Adds a header to the headers array.
     * @param string $key The key of the header.
     * @param string $value The value of the header.
     * @throws Some_Exception_Class If an error occurs.
     * @return void
     */
    private function addHeader(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }

    /**
     * Adds a header to the headers array.
     * @param string $key The key of the header.
     * @param string $value The value of the header.
     * @throws Some_Exception_Class If an error occurs.
     * @return void
     */
    private function sendHeader(): void
    {
        http_response_code($this->statusCode);
        foreach ($this->headers as $key => $value) {
            header($key . ':' . $value);
        }
    }

    /**
     * Sends the response based on the content type.
     * @return void
     */
    public function sendResponse(): void
    {
        $this->sendHeader();

        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;

            case 'json':
                # code...
                break;
        }
    }
}
