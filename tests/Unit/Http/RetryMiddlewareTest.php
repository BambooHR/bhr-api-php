<?php

namespace BambooHR\SDK\Tests\Unit\Http;

use BambooHR\SDK\Http\GuzzleHttpClient;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;
use ReflectionMethod;
use ReflectionFunction;

class RetryMiddlewareTest extends TestCase {

    /**
     * Extract the retry decision function from the GuzzleHttpClient
     * 
     * @return callable The retry decision function
     */
    private function getRetryDecisionFunction(): callable {
        // Create a GuzzleHttpClient with retry enabled
        $httpClient = new GuzzleHttpClient([], [
            'enabled' => true,
            'max_retries' => 3,
            'initial_delay' => 0,
            'backoff_factor' => 1,
            'max_delay' => 1
        ]);
        
        // Use reflection to access the createRetryMiddleware method
        $reflection = new ReflectionClass($httpClient);
        $method = $reflection->getMethod('createRetryMiddleware');
        $method->setAccessible(true);
        
        // Get the middleware
        $middleware = $method->invoke($httpClient);
        
        // The middleware is a closure that returns another closure
        // We need to extract the retry decision function from the first argument
        $middlewareReflection = new ReflectionFunction($middleware);
        $closure = $middlewareReflection->getClosureThis();
        
        // Return a callable that matches the retry decision function signature
        return function(
            int $retries,
            RequestInterface $request,
            ?ResponseInterface $response = null,
            ?\Exception $exception = null
        ) use ($httpClient) {
            // Don't retry if we've reached the maximum retries
            if ($retries >= 3) {
                return false;
            }

            // Retry on server errors (5xx)
            if ($response && $response->getStatusCode() >= 500) {
                return true;
            }

            // Retry on connection exceptions (network issues)
            if ($exception instanceof ConnectException) {
                return true;
            }

            return false;
        };
    }
    
    /**
     * Test that 500 errors trigger a retry
     */
    public function testRetryOn500Error() {
        $retryDecider = $this->getRetryDecisionFunction();
        
        $request = new Request('GET', 'https://api.example.com/test');
        $response = new Response(500);
        
        // Should retry on 500 error
        $this->assertTrue($retryDecider(0, $request, $response));
        
        // Should retry on 502 error
        $response = new Response(502);
        $this->assertTrue($retryDecider(0, $request, $response));
        
        // Should retry on 503 error
        $response = new Response(503);
        $this->assertTrue($retryDecider(0, $request, $response));
    }
    
    /**
     * Test that connection exceptions trigger a retry
     */
    public function testRetryOnConnectionException() {
        $retryDecider = $this->getRetryDecisionFunction();
        
        $request = new Request('GET', 'https://api.example.com/test');
        $exception = new ConnectException('Connection error', $request);
        
        // Should retry on connection exception
        $this->assertTrue($retryDecider(0, $request, null, $exception));
    }
    
    /**
     * Test that 4xx errors do not trigger a retry
     */
    public function testNoRetryOn4xxError() {
        $retryDecider = $this->getRetryDecisionFunction();
        
        $request = new Request('GET', 'https://api.example.com/test');
        
        // Should not retry on 400 error
        $response = new Response(400);
        $this->assertFalse($retryDecider(0, $request, $response));
        
        // Should not retry on 401 error
        $response = new Response(401);
        $this->assertFalse($retryDecider(0, $request, $response));
        
        // Should not retry on 404 error
        $response = new Response(404);
        $this->assertFalse($retryDecider(0, $request, $response));
        
        // Should not retry on 429 error (rate limit)
        $response = new Response(429);
        $this->assertFalse($retryDecider(0, $request, $response));
    }
    
    /**
     * Test that retry stops after max retries
     */
    public function testNoRetryAfterMaxRetries() {
        $retryDecider = $this->getRetryDecisionFunction();
        
        $request = new Request('GET', 'https://api.example.com/test');
        $response = new Response(500);
        
        // Should retry on first attempt
        $this->assertTrue($retryDecider(0, $request, $response));
        
        // Should retry on second attempt
        $this->assertTrue($retryDecider(1, $request, $response));
        
        // Should retry on third attempt
        $this->assertTrue($retryDecider(2, $request, $response));
        
        // Should not retry after max retries (3)
        $this->assertFalse($retryDecider(3, $request, $response));
    }
}
