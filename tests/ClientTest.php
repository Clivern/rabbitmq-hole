<?php

declare(strict_types=1);

/*
 * This file is part of RabbitMQ Hole - RabbitMQ HTTP API Client In PHP
 * (c) Clivern <hello@clivern.com>
 */

namespace Tests;

use Clivern\RabbitMQHole\Client;
use PHPUnit\Framework\TestCase;

/**
 * Client Class Test.
 */
class ClientTest extends TestCase
{
    /**
     * Test Get Method.
     */
    public function testGet()
    {
        $client = new Client("https://httpbin.org", "guest", "guest");

        $response = $client->get("/anything", [
            'headers' => [
                'x-foo' => 'bar1',
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('GET', $body['method']);
        self::assertSame('https://httpbin.org/anything', $body['url']);
        self::assertSame('Basic Z3Vlc3Q6Z3Vlc3Q=', $body['headers']['Authorization']);
        self::assertSame('bar1', $body['headers']['X-Foo']);
    }

    /**
     * Test Post Method.
     */
    public function testPost()
    {
        $client = new Client("https://httpbin.org", "guest", "guest");

        $response = $client->post("/anything", [
            'headers' => [
                'x-foo' => 'bar2',
            ],
            'body' => 'test1',
        ]);

        $body = json_decode((string) $response->getBody(), true);

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('POST', $body['method']);
        self::assertSame('test1', $body['data']);
        self::assertSame('https://httpbin.org/anything', $body['url']);
        self::assertSame('Basic Z3Vlc3Q6Z3Vlc3Q=', $body['headers']['Authorization']);
        self::assertSame('bar2', $body['headers']['X-Foo']);
    }

    /**
     * Test Put Method.
     */
    public function testPut()
    {
        $client = new Client("https://httpbin.org", "guest", "guest");

        $response = $client->put("/anything", [
            'headers' => [
                'x-foo' => 'bar3',
            ],
            'body' => 'test2',
        ]);

        $body = json_decode((string) $response->getBody(), true);

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('PUT', $body['method']);
        self::assertSame('test2', $body['data']);
        self::assertSame('https://httpbin.org/anything', $body['url']);
        self::assertSame('Basic Z3Vlc3Q6Z3Vlc3Q=', $body['headers']['Authorization']);
        self::assertSame('bar3', $body['headers']['X-Foo']);
    }

    /**
     * Test Delete Method.
     */
    public function testDelete()
    {
        $client = new Client("https://httpbin.org", "guest", "guest");

        $response = $client->delete("/anything", [
            'headers' => [
                'x-foo' => 'bar4',
            ],
            'body' => 'test3',
        ]);

        $body = json_decode((string) $response->getBody(), true);

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('DELETE', $body['method']);
        self::assertSame('test3', $body['data']);
        self::assertSame('https://httpbin.org/anything', $body['url']);
        self::assertSame('Basic Z3Vlc3Q6Z3Vlc3Q=', $body['headers']['Authorization']);
        self::assertSame('bar4', $body['headers']['X-Foo']);
    }
}
