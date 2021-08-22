<?php

declare(strict_types=1);

/*
 * This file is part of RabbitMQ Hole - RabbitMQ HTTP API Client In PHP
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\RabbitMQHole;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

/**
 * Client Class.
 */
class Client
{
    public const GET_METHOD    = "GET";
    public const POST_METHOD   = "POST";
    public const PUT_METHOD    = "PUT";
    public const DELETE_METHOD = "DELETE";

    public const OK = 200;

    /**
     * @var GuzzleClient
     */
    private $httpClient;

    /**
     * @var string
     */
    private $baseURL;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * Class Constructor.
     *
     * @param mixed $httpClient
     */
    public function __construct(string $baseURL, string $username, string $password, $httpClient = null)
    {
        $this->baseURL  = $baseURL;
        $this->username = $username;
        $this->password = $password;

        $this->httpClient = $httpClient ?? new GuzzleClient();
    }

    /**
     * HTTP Request.
     */
    public function request(string $method, string $uri, array $options): ResponseInterface
    {
        $options = array_merge(
            $options,
            ['auth' => [$this->username, $this->password]]
        );

        return $this->httpClient->request(
            $method,
            sprintf("%s/%s", trim($this->baseURL, '/'), trim($uri, '/')),
            $options
        );
    }

    /**
     * HTTP Get Request.
     */
    public function get(string $uri, array $options = []): ResponseInterface
    {
        return $this->Request(self::GET_METHOD, $uri, $options);
    }

    /**
     * HTTP Post Request.
     */
    public function post(string $uri, array $options = []): ResponseInterface
    {
        return $this->Request(self::POST_METHOD, $uri, $options);
    }

    /**
     * HTTP Put Request.
     */
    public function put(string $uri, array $options = []): ResponseInterface
    {
        return $this->Request(self::PUT_METHOD, $uri, $options);
    }

    /**
     * HTTP Delete Request.
     */
    public function delete(string $uri, array $options = []): ResponseInterface
    {
        return $this->Request(self::DELETE_METHOD, $uri, $options);
    }
}
