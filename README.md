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

#### `put($key, $value, $time = null)`

Put item to cache. (time in seconds)

```php
$cache->put('foo', 'bar', 60)
```


#### `has($key)`

Determinate if key exists in cache.

```php
$cache->has('foo')
```


#### `get($key, $default = null)`

Return Item from cache or `$default`.

```php
$cache->get('foo', 'default')
```


#### `forget($key)`

Remove item from cache.

```php
$cache->forget('foo')
```


#### `forever($key, $value)`

Store item in cache forever.

```php
$cache->forever('foo', 'bar')
```


#### `remember($key, $calback, $time = null)`

Return cache item if exists otherwise call, cache and return `$callback`.

```php
$cache->put('foo')
```
