<?php

declare(strict_types=1);

/*
 * This file is part of RabbitMQ Hole - RabbitMQ HTTP API Client In PHP
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\RabbitMQHole;

/**
 * Config Class.
 */
class Config
{
    private $configs = [];

    /**
     * Class Constructor.
     */
    public function __construct(array $configs = [])
    {
        $this->configs = $configs;
    }

    /**
     * Set Config Item.
     *
     * @param mixed $value
     */
    public function set(string $key, $value)
    {
        $this->configs[$key] = $value;
    }

    /**
     * Get Config Item.
     *
     * @param mixed $default
     */
    public function get(string $key, $default)
    {
        if ($this->exists($key)) {
            return $this->configs[$key];
        }

        return $default;
    }

    /**
     * Check if Item Exists.
     */
    public function exists(string $key): bool
    {
        return (isset($this->configs[$key])) ? true : false;
    }
}
