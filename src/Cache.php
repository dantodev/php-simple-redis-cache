<?php namespace Dtkahl\SimpleRedisCache;

use Predis\Client;

class Cache
{

    /**
     * @var Client
     */
    private $client;

    public function __construct($config)
    {
        $this->client = new Client($config);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return $this->client->exists($key) == 1;
    }

    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        return $this->has($key) ? $this->client->get($key) : $default;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param int|null $time
     * @return $this
     */
    public function put($key, $value, $time = null)
    {
        if ($time === null) {
            return $this->forever($key, $value);
        }
        $this->client->setex($key, $time, $value);
        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function forever($key, $value)
    {
        $this->client->set($key, $value);
        return $this;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function forget($key)
    {
        $this->client->del([$key]);
        return $this;
    }
    
    /**
     * @param string $key
     * @param callable $callback
     * @param int|null $time
     * @return mixed
     */
    public function remember($key, callable $callback, $time = null)
    {
        if ($this->has($key)) {
            return $this->get($key);
        }
        $value = $callback();
        $this->put($key, $value, $time);
        return $value;
    }

}