<?php
/**
 * BambooHTTPRequestTest.php
 */

namespace BambooHR\API\Tests;
use BambooHR\API\BambooHTTPResponse;

/**
 * BambooHTTPRequestTest
 * @package BambooHR
 * @test
 * @coversDefaultClass \BambooHR\API\BambooHTTPResponse
 */
class BambooHTTPRequestTest extends TestCase {

    /**
     * @test
     * @covers ::isError
     */
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
    }

    /**
     * @test
     * @covers ::getContentXML
     * @uses \BambooHR\API\BambooHTTPResponse::isError
     */
    public function testGetContentXML()
    {
        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'text/xml';
        $response->content = '<Hello>World</Hello>';
        $contentXml = $response->getContentXML();
        $this->assertInstanceOf(
            \SimpleXMLElement::class,
            $contentXml
        );

        // ToDo: This is valid and should give content
        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'application/xml';
        $response->content = '<Hello>World</Hello>';
        $contentXml = $response->getContentXML();
//        $this->assertInstanceOf(
//            \SimpleXMLElement::class,
//            $contentXml
//        );
        $this->assertNull(
            $contentXml
        );

        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'invalid/content-type';
        $response->content = '<Hello>World</Hello>';
        $contentXml = $response->getContentXML();
        $this->assertNull(
            $contentXml
        );

        $response = new BambooHTTPResponse();
        $response->statusCode = 500;
        $response->headers['Content-Type'] = 'text/xml';
        $response->content = '<Hello>World</Hello>';
        $contentXml = $response->getContentXML();
        $this->assertNull(
            $contentXml
        );
    }

    /**
     * @test
     * @covers ::getContentJSON
     * @uses \BambooHR\API\BambooHTTPResponse::isError
     */
    public function testGetContentJSON()
    {
        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'application/json';
        $response->content = '{"hello": "world"}';
        $contentJson = $response->getContentJSON();
        $this->assertSame(
            'world',
            $contentJson->hello
        );

        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'invalid/content-type';
        $response->content = '{"hello": "world"}';
        $contentJson = $response->getContentJSON();
        $this->assertNull(
            $contentJson
        );

        $response = new BambooHTTPResponse();
        $response->statusCode = 500;
        $response->headers['Content-Type'] = 'application/json';
        $response->content = '{"hello": "world"}';
        $contentJson = $response->getContentJSON();
        $this->assertNull(
            $contentJson
        );
    }

    /**
     * @test
     * @covers ::getContent
     * @uses \BambooHR\API\BambooHTTPResponse::getContentJson
     * @uses \BambooHR\API\BambooHTTPResponse::getContentXml
     * @uses \BambooHR\API\BambooHTTPResponse::isError
     */
    public function testGetContent()
    {
        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'text/xml';
        $response->content = '<Hello>World</Hello>';
        $contentXml = $response->getContent();
        $this->assertInstanceOf(
            \SimpleXMLElement::class,
            $contentXml
        );

        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'application/json';
        $response->content = '{"hello": "world"}';
        $contentJson = $response->getContent();
        $this->assertSame(
            'world',
            $contentJson->hello
        );

        $response = new BambooHTTPResponse();
        $response->statusCode = 200;
        $response->headers['Content-Type'] = 'invalid/content-type';
        $response->content = '<Hello>World</Hello>';
        $contentXml = $response->getContent();
        $this->assertSame(
            '<Hello>World</Hello>',
            $contentXml
        );
    }

    /**
     * @test
     * @covers ::getErrorMessage
     * @uses \BambooHR\API\BambooHTTPResponse::getContent
     * @uses \BambooHR\API\BambooHTTPResponse::isError
     */
    public function testGetErrorMessage()
    {
        $errorHeader = 'Test Error Header';
        $errorBody = 'Test Body Error';

        $response = new BambooHTTPResponse();
        $response->headers['X-BambooHR-Error-Message'] = $errorHeader;
        $response->content = $errorBody;
        $response->statusCode = 200;
        $this->assertNull(
            $response->getErrorMessage()
        );

        $response = new BambooHTTPResponse();
        $response->headers['X-BambooHR-Error-Message'] = $errorHeader;
        $response->content = $errorBody;
        $response->statusCode = 500;
        $this->assertSame(
            $errorHeader,
            $response->getErrorMessage()
        );

        $response = new BambooHTTPResponse();
        $response->content = $errorBody;
        $response->statusCode = 500;
        $this->assertSame(
            $errorBody,
            $response->getErrorMessage()
        );
    }
}
