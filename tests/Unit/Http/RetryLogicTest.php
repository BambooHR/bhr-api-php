<?php

namespace BambooHR\SDK\Tests\Unit\Http;

use BambooHR\SDK\Http\GuzzleHttpClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class RetryLogicTest extends TestCase {

    /**
     * Test that the retry configuration is set correctly
     */
    public function testRetryConfigIsCorrect() {
        $httpClient = new GuzzleHttpClient();
        $config = $httpClient->getRetryConfig();
        
        $this->assertTrue($config['enabled']);
        $this->assertGreaterThan(0, $config['max_retries']);
    }
    
    /**
     * Create a mock HTTP client with the given responses and history tracking
     *
     * @param array $responses Mock responses
     * @return array [GuzzleHttpClient, container]
     */
    private function createMockClientWithHistory(array $responses): array {
        $container = [];
        $history = Middleware::history($container);
        
        $mock = new MockHandler($responses);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);
        
        $client = new Client(['handler' => $handlerStack, 'http_errors' => false]);
        
        // Create the HTTP client with retry enabled
        $httpClient = new GuzzleHttpClient([], [
            'enabled' => true,
            'max_retries' => 3,
            'initial_delay' => 0, // No delay for tests
            'backoff_factor' => 1,
            'max_delay' => 1
        ]);
        
        // Use reflection to inject the mocked client
        $reflection = new ReflectionClass($httpClient);
        $property = $reflection->getProperty('client');
        $property->setAccessible(true);
        $property->setValue($httpClient, $client);
        
        return [$httpClient, $container];
    }

    /**
     * Test that the retry middleware only retries on 500 errors
     */
    public function testRetryOn500Error() {
        // Create a client that will return a 500 error, then a successful response
        [$httpClient, $container] = $this->createMockClientWithHistory([
            new Response(500, [], '{"error":"Server error"}'),
            new Response(200, [], '{"success":true}')
        ]);
        
        // Make the request - it should retry after the 500 and succeed
        $response = $httpClient->request('GET', 'https://api.example.com/test');
        
        // Verify that two requests were made (original + retry)
        $this->assertCount(2, $container, 'Should have made 2 requests (original + retry)');
        
        // Verify the status codes
        $this->assertEquals(500, $container[0]['response']->getStatusCode(), 'First request should have been a 500');
        $this->assertEquals(200, $container[1]['response']->getStatusCode(), 'Second request should have been a 200');
        
        // Verify the response
        $this->assertEquals(200, $response['statusCode'], 'Response should have 200 status code');
        $this->assertEquals(['success' => true], $response['body'], 'Response body should match expected value');
    }
    
    /**
     * Test that 4xx errors are not retried
     */
    public function testNoRetryOn4xxErrors() {
        // Create a client with retry enabled that will return a 400 error
        [$httpClient, $container] = $this->createMockClientWithHistory([
            new Response(400, [], '{"error":"Bad request"}'),
            new Response(200, [], '{"success":true}') // This should never be reached
        ]);
        
        // Make the request - it should not retry after the 400
        $response = $httpClient->request('GET', 'https://api.example.com/test');
        
        // Verify that only one request was made (no retry)
        $this->assertCount(1, $container, 'Should have made only 1 request (no retry)');
        
        // Verify the status code
        $this->assertEquals(400, $container[0]['response']->getStatusCode(), 'Request should have been a 400');
        
        // Verify the response
        $this->assertEquals(400, $response['statusCode'], 'Response should have 400 status code');
    }
    
    /**
     * Test that 429 errors are not retried
     */
    public function testNoRetryOn429Errors() {
        // Create a client with retry enabled that will return a 429 error
        [$httpClient, $container] = $this->createMockClientWithHistory([
            new Response(429, [], '{"error":"Rate limit exceeded"}'),
            new Response(200, [], '{"success":true}') // This should never be reached
        ]);
        
        // Make the request - it should not retry after the 429
        $response = $httpClient->request('GET', 'https://api.example.com/test');
        
        // Verify that only one request was made (no retry)
        $this->assertCount(1, $container, 'Should have made only 1 request (no retry)');
        
        // Verify the status code
        $this->assertEquals(429, $container[0]['response']->getStatusCode(), 'Request should have been a 429');
        
        // Verify the response
        $this->assertEquals(429, $response['statusCode'], 'Response should have 429 status code');
    }
    
    /**
     * Test that connection exceptions are retried
     */
    public function testRetryOnConnectionExceptions() {
        // Create a request object for the connection exception
        $request = new Request('GET', 'https://api.example.com/test');
        
        // Create a client with retry enabled that will throw a connection exception, then succeed
        [$httpClient, $container] = $this->createMockClientWithHistory([
            new ConnectException('Connection error', $request),
            new Response(200, [], '{"success":true}')
        ]);
        
        // Make the request - it should retry after the connection error and succeed
        $response = $httpClient->request('GET', 'https://api.example.com/test');
        
        // Verify that two requests were made (original + retry)
        $this->assertCount(2, $container, 'Should have made 2 requests (original + retry)');
        
        // Verify the second request was a 200
        $this->assertEquals(200, $container[1]['response']->getStatusCode(), 'Second request should have been a 200');
        
        // Verify the response
        $this->assertEquals(200, $response['statusCode'], 'Response should have 200 status code');
        $this->assertEquals(['success' => true], $response['body'], 'Response body should match expected value');
    }
}
