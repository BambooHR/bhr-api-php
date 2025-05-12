<?php

namespace BambooHR\SDK\Tests\Unit\Http;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Exception\RateLimitException;
use BambooHR\SDK\Http\GuzzleHttpClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;

class GuzzleHttpClientTest extends TestCase {

	private $container = [];

	private function createMockClient(array $responses): GuzzleHttpClient {
		$this->container = [];
		$history = Middleware::history($this->container);

		$mock = new MockHandler($responses);
		$handlerStack = HandlerStack::create($mock);
		$handlerStack->push($history);

		$client = new Client(['handler' => $handlerStack]);

		// Use reflection to inject the mocked client
		$httpClient = new GuzzleHttpClient();
		$reflection = new \ReflectionClass($httpClient);
		$property = $reflection->getProperty('client');
		$property->setAccessible(true);
		$property->setValue($httpClient, $client);

		return $httpClient;
	}

	public function testRequestSuccess() {
		$responseBody = ['foo' => 'bar'];
		$httpClient = $this->createMockClient([
			new Response(200, ['Content-Type' => 'application/json'], json_encode($responseBody))
		]);

		$response = $httpClient->request('GET', 'https://api.example.com/test');

		$this->assertEquals(200, $response['statusCode']);
		$this->assertEquals($responseBody, $response['body']);

		// Check that the request was made correctly
		$this->assertCount(1, $this->container);
		$request = $this->container[0]['request'];
		$this->assertEquals('GET', $request->getMethod());
		$this->assertEquals('https://api.example.com/test', (string) $request->getUri());
	}

	public function testRequestWithOptions() {
		$responseBody = ['success' => true];
		$httpClient = $this->createMockClient([
			new Response(201, ['Content-Type' => 'application/json'], json_encode($responseBody))
		]);

		$options = [
			'json' => ['name' => 'Test'],
			'headers' => [
				'X-Custom-Header' => 'Value'
			]
		];

		$response = $httpClient->request('POST', 'https://api.example.com/test', $options);

		$this->assertEquals(201, $response['statusCode']);
		$this->assertEquals($responseBody, $response['body']);

		// Check that the request was made correctly
		$this->assertCount(1, $this->container);
		$request = $this->container[0]['request'];
		$this->assertEquals('POST', $request->getMethod());
		$this->assertEquals('https://api.example.com/test', (string) $request->getUri());
		$this->assertEquals('Value', $request->getHeaderLine('X-Custom-Header'));
	}

	public function testRequestNotFoundThrowsException() {
		$httpClient = $this->createMockClient([
			new Response(404, ['Content-Type' => 'application/json'], json_encode(['error' => 'Not found']))
		]);

		$this->expectException(\BambooHR\SDK\Exception\NotFoundException::class);

		$httpClient->request('GET', 'https://api.example.com/test');
	}

	public function testRequestRateLimitThrowsException() {
		$httpClient = $this->createMockClient([
			new Response(429, ['Content-Type' => 'application/json'], json_encode(['error' => 'Rate limit exceeded']))
		]);

		$this->expectException(RateLimitException::class);

		$httpClient->request('GET', 'https://api.example.com/test');
	}

	public function testRequestWithErrorHeaderMessage() {
		$errorMessage = 'Custom error message';
		$httpClient = $this->createMockClient([
			new Response(400, [
				'Content-Type' => 'application/json',
				'X-BambooHR-Error-Message' => $errorMessage
			], json_encode(['error' => 'Bad request']))
		]);

		try {
			$httpClient->request('GET', 'https://api.example.com/test');
			$this->fail('Exception was not thrown');
		} catch (BambooHRException $e) {
			$this->assertStringContainsString($errorMessage, $e->getMessage());
		}
	}

	public function testRequestWithJsonErrorMessage() {
		$errorMessage = 'Invalid input';
		$httpClient = $this->createMockClient([
			new Response(400, ['Content-Type' => 'application/json'], json_encode([
				'error' => 'bad_request',
				'error_description' => $errorMessage
			]))
		]);

		try {
			$httpClient->request('GET', 'https://api.example.com/test');
			$this->fail('Exception was not thrown');
		} catch (BambooHRException $e) {
			$this->assertStringContainsString($errorMessage, $e->getMessage());
		}
	}

	public function testRequestWithNetworkError() {
		$request = new Request('GET', 'https://api.example.com/test');
		$httpClient = $this->createMockClient([
			new RequestException('Network error', $request)
		]);

		$this->expectException(BambooHRException::class);

		$httpClient->request('GET', 'https://api.example.com/test');
	}
}
