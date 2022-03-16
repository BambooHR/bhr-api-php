<?php
/**
 * BambooHTTPRequestInjectorTest.php
 */

namespace BambooHR\API\Tests\Injector;
use BambooHR\API\BambooHTTPRequest;
use BambooHR\API\Injector\BambooHTTPRequestInjector;


/**
 * BambooHTTPRequestInjectorTest
 * @package BambooHR
 * @coversDefaultClass \BambooHR\API\Injector\BambooHTTPRequestInjector
 */
trait BambooHTTPRequestInjectorTest {
    /**
     * @return BambooHTTPRequestInjector
     */
    public abstract function getSubject();

    /**
     * Test both set and get
     * @test
     * @covers ::getBambooHttpRequest()
     * @covers ::setBambooHttpRequest()
     * @covers \BambooHR\API\BambooAPI
     */
    public function testInjector()
    {
        $request = new BambooHTTPRequest();
        $injectable = $this->getSubject();
        $getBambooHttpRequest = $this->getObjectMethod($injectable, 'getBambooHttpRequest');

        $this->assertNotSame(
            $request,
            $getBambooHttpRequest()
        );

        $injectable->setBambooHttpRequest($request);
        $this->assertSame(
            $request,
            $getBambooHttpRequest()
        );
    }
}
