<?php

declare(strict_types=1);

/*
 * This file is part of RabbitMQ Hole - RabbitMQ HTTP API Client In PHP
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\RabbitMQHole;

use Clivern\RabbitMQHole\Exception\InvalidResponse;
use Exception;

/**
 * Queues Class.
 */
class Queues
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Class Constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get Queues.
     */
    public function getQueues(): array
    {
        try {
            $response = $this->client->get("/api/queues");

            if (Client::OK === $response->getStatusCode()) {
                return json_decode((string) $response->getBody(), true);
            }
        } catch (Exception $e) {
            throw new InvalidResponse(sprintf("Error raised: %s", $e->getMessage()));
        }

        throw new InvalidResponse(sprintf(
            "Invalid %s response: %s",
            $response->getStatusCode(),
            (string) $response->getBody()
        ));
    }
}
