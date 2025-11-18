<?php
declare(strict_types=1);
/**
 * RequestIdMiddlewareTest
 * PHP version 8.1
 *
 * @category Test
 * @package  BhrSdk\Test\Client\Middleware
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Test\Client\Middleware;

use BhrSdk\Client\Middleware\RequestIdMiddleware;
use BhrSdk\Client\Logger\LoggerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Tests for the RequestIdMiddleware class
 *
 * @category Test
 * @package  BhrSdk\Test\Client\Middleware
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class RequestIdMiddlewareTest extends TestCase {
	/**
	 * Test case for extracting request ID from response headers
	 *
	 * @return void
	 */
	public function testExtractRequestIdFromHeaders(): void {
		// Test with standard header format
		$headers = [
			'content-type' => ['application/json'],
			'x-request-id' => ['abc123def456']
		];

		$requestId = RequestIdMiddleware::extractRequestIdFromHeaders($headers);
		$this->assertEquals('abc123def456', $requestId);

		// Test with different case for header name
		$headers = [
			'content-type' => ['application/json'],
			'X-Request-ID' => ['xyz789']
		];

		$requestId = RequestIdMiddleware::extractRequestIdFromHeaders($headers);
		$this->assertEquals('xyz789', $requestId);

		// Test with non-array header value
		$headers = [
			'content-type' => ['application/json'],
			'x-request-id' => 'single-value'
		];

		$requestId = RequestIdMiddleware::extractRequestIdFromHeaders($headers);
		$this->assertEquals('single-value', $requestId);

		// Test with missing header
		$headers = [
			'content-type' => ['application/json']
		];

		$requestId = RequestIdMiddleware::extractRequestIdFromHeaders($headers);
		$this->assertNull($requestId);
	}

	/**
	 * Test case for handling request and extracting request ID
	 *
	 * @return void
	 */
	public function testHandle(): void {
		// Create mock response with request ID header
		$mockResponse = $this->createMock(ResponseInterface::class);
		$mockResponse->method('hasHeader')
			->with(RequestIdMiddleware::REQUEST_ID_HEADER)
			->willReturn(true);

		$mockResponse->method('getHeaderLine')
			->with(RequestIdMiddleware::REQUEST_ID_HEADER)
			->willReturn('test-request-id-123');

		// Create mock request
		$mockRequest = $this->createMock(RequestInterface::class);

		// Create mock logger
		$mockLogger = $this->createMock(LoggerInterface::class);
		$mockLogger->expects($this->once())
			->method('log')
			->with(
				'debug',
				'Request ID received',
				['request_id' => 'test-request-id-123']
			);

		// Set the logger for middleware
		RequestIdMiddleware::setLogger($mockLogger instanceof LoggerInterface ? $mockLogger : null);

		// Create test handler
		$handler = function ($request, $options) use ($mockResponse) {
			return $mockResponse;
		};

		// Test the handle method
		$response = RequestIdMiddleware::handle(
			$handler,
			$mockRequest instanceof RequestInterface ? $mockRequest : null,
			null,
			[]
		);

		// Verify the response is passed through
		$this->assertSame($mockResponse, $response);

		// Verify the request ID was extracted and stored
		$this->assertEquals('test-request-id-123', RequestIdMiddleware::getLastRequestId());

		// Reset the request ID for other tests
		RequestIdMiddleware::resetRequestId();
		$this->assertNull(RequestIdMiddleware::getLastRequestId());
	}
}
