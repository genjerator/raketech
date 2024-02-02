<?php

namespace App\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;
use App\Exceptions\InvalidResponseException;
class RestCountriesClient
{
    private const COUNTRIES_URI = 'https://restcountries.com/v3.1/all';
    public function __construct(private readonly Client $client)
    {
    }

    public function getCountries(): string
    {
        return $this->sendGetRequest(self::COUNTRIES_URI);
    }

    /**
     * @throws GuzzleException
     * @throws InvalidResponseException
     */
    private function sendGetRequest(string $uri): string
    {
        $response = $this->client->request(Request::METHOD_GET, $uri);
        $this->validateResponse($response, $uri);

        return $response->getBody()->getContents();
    }

    /**
     * @throws InvalidResponseException
     */
    private function validateResponse(ResponseInterface $response, string $uri): void
    {
        if ($response->getStatusCode() !== SymphonyResponse::HTTP_OK) {
            throw new InvalidResponseException($response, $uri, 'Invalid status code.');
        }

        // limit response size to 50Mb
        if ($response->getBody()->getSize() > (50 * 1024 * 1024)) {
            throw new InvalidResponseException($response, $uri, 'Response body is larger than 50Mb.');
        }
    }

}
