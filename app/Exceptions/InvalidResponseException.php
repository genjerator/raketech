<?php

namespace App\Exceptions;

use Psr\Http\Message\ResponseInterface;

class InvalidResponseException extends \Exception
{
    public function __construct(
        readonly private ResponseInterface $response,
        readonly private string $uri,
        string $message
    ) {
        parent::__construct($message, $this->response->getStatusCode());
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}
