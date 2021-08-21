<?php

declare(strict_types=1);

/*
 * This file is part of RabbitMQ Hole - RabbitMQ HTTP API Client In PHP
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\RabbitMQHole;

/**
 * Bindings Class.
 */
class Bindings
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
}
