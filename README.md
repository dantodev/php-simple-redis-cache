[![Latest Stable Version](https://poser.pugx.org/dtkahl/php-simple-redis-cache/v/stable)](https://packagist.org/packages/dtkahl/php-simple-redis-cache)
[![License](https://poser.pugx.org/dtkahl/php-simple-redis-cache/license)](https://packagist.org/packages/dtkahl/php-simple-redis-cache)
[![Build Status](https://travis-ci.org/dtkahl/php-simple-redis-cache.svg?branch=master)](https://travis-ci.org/dtkahl/php-simple-redis-cache)


# PHP simple redis cache

This is a simple cache class for PHP using redis trough `predis/predis`.

#### Dependencies

* `PHP >= 5.6.0`
* a redis server


#### Installation

Install with [Composer](http://getcomposer.org):
```
composer require dtkahl/php-simple-redis-cache
```


### Usage

Refer namespace:

```
use Dtkahl\SimpleRedisCache;
```

Create new Cache instance:

```php
$cache = new Cache([
    "scheme" => "tcp",
    "host => "127.0.0.1",
    "port" => 6379
);
```


### Methods

*TBA*