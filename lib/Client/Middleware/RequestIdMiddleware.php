<?php
/**
 * RequestIdMiddleware
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client\Middleware
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client\Middleware;

use BhrSdk\Client\Logger\LoggerInterface;
use BhrSdk\Configuration;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * RequestIdMiddleware handles tracking of request IDs from API responses
 *
 * This middleware:
 * - Extracts the 'x-request-id' header from API responses
 * - Stores the request ID for access by the application
 * - Makes the request ID available for logging and debugging
 *
 * @category Class
 * @package  BhrSdk\Client\Middleware
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class RequestIdMiddleware {
	/**
	 * The header name for the request ID
	 */
	public const REQUEST_ID_HEADER = 'x-request-id';

	/**
	 * The most recent request ID received from the API
	 *
	 * @var string|null
	 */
	private static ?string $lastRequestId = null;

	/**
	 * Logger instance
	 *
	 * @var LoggerInterface|null
	 */
	private static ?LoggerInterface $logger = null;

	/**
	 * Set the logger instance for the middleware
	 *
	 * @param LoggerInterface|null $logger The logger instance
	 * @return void
	 */
	public static function setLogger(?LoggerInterface $logger): void {
		self::$logger = $logger;
	}

	/**
	 * Handle a request/response and extract request ID
	 *
	 * @param callable         $sendRequest Callable that sends the request and returns ResponseInterface
	 * @param RequestInterface $request The HTTP request
	 * @param mixed            $client The HTTP client (optional, not used)
	 * @param array            $options Request options
	 * @return ResponseInterface The HTTP response
	 */
	public static function handle(
		callable $sendRequest,
		RequestInterface $request,
		$client,
		array $options
	): ResponseInterface {
		// Send the request
		$response = $sendRequest($request, $options);

		// Extract the request ID from the response headers
		self::extractRequestId($response);

		return $response;
	}

	/**
	 * Extract request ID from response headers
	 *
	 * @param ResponseInterface $response The HTTP response
	 * @return void
	 */
	public static function extractRequestId(ResponseInterface $response): void {
		// Get all headers for case-insensitive comparison
		$headers = $response->getHeaders();
		
		// Target header name (lowercase for comparison)
		$targetHeader = strtolower(self::REQUEST_ID_HEADER);
		
		// Track whether header was found and its value
		$headerFound = false;
		$requestId = null;
		$actualHeaderName = null;
		
		// Case-insensitive search through headers
		foreach ($headers as $name => $values) {
			if (strtolower($name) === $targetHeader) {
				$headerFound = true;
				$actualHeaderName = $name;
				
				// Extract the first value if it's an array
				if (is_array($values) && !empty($values)) {
					$requestId = $values[0];
				} else {
					$requestId = $values;
				}
				break;
			}
		}
		
		// Store the request ID if found
		if ($headerFound && $requestId !== null && $requestId !== '') {
			self::$lastRequestId = $requestId;
			
			if (self::$logger) {
				self::$logger->log('debug', 'Request ID extracted', [
					'request_id' => self::$lastRequestId,
					'header_name' => $actualHeaderName,
					'header_case' => 'Matched using case-insensitive comparison'
				]);
			}
		}
	}

	/**
	 * Extract request ID from response headers array
	 *
	 * @param array $headers The HTTP response headers
	 * @return string|null The extracted request ID or null if not found
	 */
	public static function extractRequestIdFromHeaders(array $headers): ?string {
		// Target header name (lowercase for comparison)
		$headerName = strtolower(self::REQUEST_ID_HEADER);

		// Check for the header in case-insensitive way
		foreach ($headers as $name => $values) {
			if (strtolower($name) === $headerName) {
				if (is_array($values) && !empty($values)) {
					return $values[0];
				}
				return $values;
			}
		}

		return null;
	}

	/**
	 * Get the most recent request ID
	 *
	 * @return string|null The request ID or null if none available
	 */
	public static function getLastRequestId(): ?string {
		return self::$lastRequestId;
	}

	/**
	 * Reset the stored request ID
	 *
	 * @return void
	 */
	public static function resetRequestId(): void {
		self::$lastRequestId = null;
	}
}
