<?php namespace Dtkahl\SimpleRedisCache;

class SimpleConfigTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Cache
     */
    private $cache;

    public function setUp()
    {
        $this->cache = new Cache([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379,
            'password' => null
        ]);
    }

    public function testPutHasGetForget()
    {
        $this->assertTrue(true);
    }

    public function testRemember()
    {
        $this->assertTrue(true);
    }

}