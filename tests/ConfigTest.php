<?php

declare(strict_types=1);

/*
 * This file is part of RabbitMQ Hole - RabbitMQ HTTP API Client In PHP
 * (c) Clivern <hello@clivern.com>
 */

namespace Tests;

use Clivern\RabbitMQHole\Config;
use PHPUnit\Framework\TestCase;

/**
 * Config Class Test.
 */
class ConfigTest extends TestCase
{
    public function testConfig()
    {
        $config = new Config();
        self::assertTrue($config instanceof Config);
        $config->set('key', 'value');
        self::assertSame('value', $config->get('key', null));
        self::assertTrue($config->exists('key'));
        self::assertFalse($config->exists('not_found'));
    }
}
