<?php
/**
 * BambooCurlHTTPTest.php
 */

namespace BambooHR\API\Tests;
use BambooHR\API\BambooCurlHTTP;
use BambooHR\API\BambooHTTP;

/**
 * BambooCurlHTTPTest
 * @package BambooHR
 * @test
 * @coversDefaultClass \BambooHR\API\BambooCurlHTTP
 */
class BambooCurlHTTPTest extends TestCase {
    /**
     * @test
     */
    public function testConstruct()
    {
        $bambooCurl = new BambooCurlHTTP();
        $this->assertInstanceOf(
            BambooHTTP::class,
            $bambooCurl
        );
    }

    /**
     * @test
     * @covers ::setBasicAuth
     */
    public function testSetBasicAuth()
    {
        $testUsername = 'Test Username';
        $testPassword = 'Test Password';

        $bambooCurl = new BambooCurlHTTP();
        $bambooCurl->setBasicAuth($testUsername, $testPassword);

        $this->assertSame(
            $testUsername,
            $this->getObjectAttribute($bambooCurl, 'basicAuthUsername')
        );

        $this->assertSame(
            $testPassword,
            $this->getObjectAttribute($bambooCurl, 'basicAuthPassword')
        );
    }

    /**
     * @test
     * @covers ::parseHeaders
     */
    public function testParseHeaders()
    {
        $bambooCurl = new BambooCurlHTTP();
        $this->assertEmpty(
            $bambooCurl->parseHeaders('No Headers here')
        );

        $bambooCurl = new BambooCurlHTTP();
        $this->assertArrayHasKey(
            'Weird',
            $bambooCurl->parseHeaders("Weird: Header\r\nOddly: Specific")
        );
        $this->assertArrayHasKey(
            'Oddly',
            $bambooCurl->parseHeaders("Weird: Header\r\nOddly: Specific")
        );
    }

    /**
     * @test
     * @covers ::sendRequest
     */
    public function testSendRequest()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until curl is injected through a wrapper');
    }
}
