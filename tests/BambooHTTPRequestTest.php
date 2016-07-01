<?php
/**
 * BambooHTTPRequestTest.php
 * @author    Daniel Mason <danielm@moo.com>
 * @copyright 2016 MOO
 * @license   proprietary
 * @see       https://www.moo.com
 */

namespace BambooHR\API\Tests;
use BambooHR\API\BambooHTTPResponse;

/**
 * BambooHTTPRequestTest
 * @package BambooHR
 * @test
 * @coversDefaultClass \BambooHR\API\BambooHTTPResponse
 */
class BambooHTTPRequestTest extends TestCase
{

    public function testIsError()
    {
        $response = new BambooHTTPResponse();

        // ToDo: This is not an error but the function reports it as one
        $response->statusCode = 101;
        $this->assertTrue($response->isError());

        $response->statusCode = 201;
        $this->assertFalse($response->isError());

        $response->statusCode = 301;
        $this->assertTrue($response->isError());

        // ToDo: This is not an error either
        $response->statusCode = 2001;
        $this->assertTrue($response->isError());
    }

}
