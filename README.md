<p align="center">
    <img alt="rabbitmq-hole Logo" src="/assets/img/gopher.png?v=1.0.0" width="180" />
    <h3 align="center">RabbitMQ Hole</h3>
    <p align="center">RabbitMQ HTTP API Client In PHP</p>
    <p align="center">
        <a href="https://github.com/clivern/rabbitmq-hole/actions/workflows/php.yml">
            <img src="https://github.com/clivern/rabbitmq-hole/actions/workflows/php.yml/badge.svg">
        </a>
        <a href="https://packagist.org/packages/clivern/rabbitmq-hole">
            <img src="https://img.shields.io/badge/Version-1.0.0-red.svg">
        </a>
        <a href="https://github.com/Clivern/rabbitmq-hole/blob/master/LICENSE">
            <img src="https://img.shields.io/badge/LICENSE-MIT-orange.svg">
        </a>
    </p>
</p>


## Documentation

### Installation:

To install the package via `composer`, use the following:

```zsh
$ composer require clivern/rabbitmq-hole
```

This command requires you to have `composer` installed globally.

### Usage:

To use the generic `API` client.

```php
include_once __DIR__ . "/vendor/autoload.php";

use Clivern\RabbitMQHole\Client;
use Clivern\RabbitMQHole\Queues;


$client = new Client("http://rabbitmq.com:15672", "guest", "guest");
```

To use the `Queue` client.

```php
$client = new Client("http://rabbitmq.com:15672", "guest", "guest");
$queues = new Queues($client);

# To get queues list
$queues->getQueues(); // [{....}]
```

Here is the full [API documentation for RabbitMQ v3.9.8](https://rawcdn.githack.com/rabbitmq/rabbitmq-server/v3.9.8/deps/rabbitmq_management/priv/www/api/index.html)


## Versioning

For transparency into our release cycle and in striving to maintain backward compatibility, rabbitmq-hole is maintained under the [Semantic Versioning guidelines](https://semver.org/) and release process is predictable and business-friendly.

See the [Releases section of our GitHub project](https://github.com/clivern/rabbitmq-hole/releases) for changelogs for each release version of rabbitmq-hole. It contains summaries of the most noteworthy changes made in each release.


## Bug tracker

If you have any suggestions, bug reports, or annoyances please report them to our issue tracker at https://github.com/clivern/rabbitmq-hole/issues


## Security Issues

If you discover a security vulnerability within rabbitmq-hole, please send an email to [hello@clivern.com](mailto:hello@clivern.com)


## Contributing

We are an open source, community-driven project so please feel free to join us. see the [contributing guidelines](CONTRIBUTING.md) for more details.


## License

© 2021, clivern. Released under [MIT License](https://opensource.org/licenses/mit-license.php).

**rabbitmq-hole** is authored and maintained by [@clivern](http://github.com/clivern).
