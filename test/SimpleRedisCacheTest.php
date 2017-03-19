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
            "scheme" => "tcp",
            "host" => "127.0.0.1",
            "port" => 6379,
            "password" => null
        ]);
    }

    public function testPutHasGet()
    {
        $this->cache->put("unittest_key_1", "test", 2);
        $this->assertTrue($this->cache->has("unittest_key_1"));
        $this->assertEquals($this->cache->get("unittest_key_1"), "test");
        sleep(4);
        $this->assertFalse($this->cache->has("unittest_key_1"));
        $this->assertNull($this->cache->get("unittest_key_1"));
        $this->assertEquals($this->cache->get("unittest_key_1", "default"), "default");
    }

    public function testForeverForget()
    {
        $this->cache->forever("unittest_key_2", "test_2");
        $this->assertTrue($this->cache->has("unittest_key_2"));
        $this->assertEquals($this->cache->get("unittest_key_2"), "test_2");
        $this->cache->forget("unittest_key_2");
        $this->assertFalse($this->cache->has("unittest_key_2"));

    }

    public function testRemember()
    {
        $this->assertEquals("test_3", $this->cache->remember("unittest_key_3", function () {
            return "test_3";
        }));
        $this->assertEquals("test_3", $this->cache->remember("unittest_key_3", function () {
            return "this will never be set";
        }));
    }

}