<?php
/**
 * ApiErrorHelper
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk;

use BhrSdk\ApiException;
use BhrSdk\Exceptions\ClientException;
use BhrSdk\Exceptions\ServerException;
use BhrSdk\Client\Middleware\RequestIdMiddleware;

/**
 * ApiErrorHelper Class Doc Comment
 *
 * @category Class
 * @package  BhrSdk
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class ApiErrorHelper {
	/**
	 * Error messages and debugging tips by status code
	 *
	 * @var array<int, array<string, mixed>>
	 */
	public static array $ERROR_MESSAGES = [
		400 => [
			'type' => 'BadRequest',
			'title' => 'Bad request',
			'causes' => [
				'Invalid request syntax or parameters',
				'Missing required fields',
				'Malformed JSON or XML in request body'
			],
			'tips' => [
				'Check request parameters and ensure they match API documentation',
				'Validate request body format before sending',
				'Ensure all required fields are included',
				'Review API documentation for correct endpoint usage'
			]
		],
		401 => [
			'type' => 'AuthenticationFailed',
			'title' => 'Authentication failed',
			'causes' => [
				'Invalid API key or password',
				'Expired credentials',
				'Insufficient permissions for this operation'
			],
			'tips' => [
				'Verify your API key and subdomain are correct',
				'Check that your API key has the necessary permissions',
				'Ensure your company subdomain is correct',
				'Try regenerating your API key in the BambooHR system'
			]
		],
		403 => [
			'type' => 'PermissionDenied',
			'title' => 'Permission denied',
			'causes' => [
				'API key lacks required permissions',
				'Account restrictions in place',
				'IP address restrictions'
			],
			'tips' => [
				'Verify your API key has the necessary permissions',
				'Contact your BambooHR administrator to review API access permissions',
				'Check if IP restrictions are in place for API access'
			]
		],
		404 => [
			'type' => 'ResourceNotFound',
			'title' => 'Resource not found',
			'causes' => [
				'The requested resource does not exist',
				'Resource may have been deleted',
				'Incorrect resource identifier or path'
			],
			'tips' => [
				'Verify the resource ID or path is correct',
				'Check if the resource exists before attempting to access it',
				'Ensure you are using the correct API version',
				'Confirm the resource has not been deleted or archived'
			]
		],
		405 => [
			'type' => 'MethodNotAllowed',
			'title' => 'Method not allowed',
			'causes' => [
				'Using an incorrect HTTP method for this endpoint',
				'The endpoint does not support the requested operation',
				'API version mismatch'
			],
			'tips' => [
				'Check API documentation for the correct HTTP method (GET, POST, PUT, DELETE)',
				'Verify the endpoint supports the operation you are attempting',
				'Ensure you are using the correct API version'
			]
		],
		408 => [
			'type' => 'RequestTimeout',
			'title' => 'Request timeout',
			'causes' => [
				'The server did not receive a complete request within the time it was prepared to wait',
				'Network connectivity issues',
				'Server overload or high latency'
			],
			'tips' => [
				'Check your network connection',
				'Increase request timeout settings',
				'Consider breaking large requests into smaller chunks',
				'Increase the number of retries'
			]
		],
		409 => [
			'type' => 'Conflict',
			'title' => 'Conflict',
			'causes' => [
				'Resource state conflict with the current request',
				'Concurrent modification of the same resource',
				'Attempting to create a resource that already exists',
				'Violating unique constraints'
			],
			'tips' => [
				'Fetch the latest state of the resource before attempting modifications',
				'Implement optimistic concurrency control using ETags or version numbers',
				'Check for existing resources before creation attempts',
				'Handle conflict resolution in your application logic'
			]
		],
		413 => [
			'type' => 'PayloadTooLarge',
			'title' => 'Payload too large',
			'causes' => [
				'Request body exceeds the server\'s size limit',
				'File upload is too large',
				'Batch operation contains too many items'
			],
			'tips' => [
				'Reduce the size of your request payload',
				'Split large requests into smaller chunks',
				'Compress data before sending if appropriate',
				'Check API documentation for size limits'
			]
		],
		415 => [
			'type' => 'UnsupportedMediaType',
			'title' => 'Unsupported media type',
			'causes' => [
				'Content-Type header is missing or incorrect',
				'Request body format is not supported by the API',
				'Using XML when only JSON is supported (or vice versa)'
			],
			'tips' => [
				'Check that your Content-Type header is set correctly',
				'Verify the API endpoint supports the format you\'re sending',
				'Convert your payload to a supported format (usually JSON)',
				'Review API documentation for supported media types'
			]
		],
		422 => [
			'type' => 'UnprocessableEntity',
			'title' => 'Unprocessable entity',
			'causes' => [
				'Request syntax is correct but contains semantic errors',
				'Validation failures in the request data',
				'Business rule violations',
				'Data integrity constraints'
			],
			'tips' => [
				'Check the response body for specific validation error details',
				'Ensure request data meets all business rules and constraints',
				'Validate data before submitting to the API',
				'Review API documentation for field requirements and limitations'
			]
		],
		429 => [
			'type' => 'RateLimitExceeded',
			'title' => 'Rate limit exceeded',
			'causes' => [
				'Too many requests in a short time period',
				'Exceeding API quota limits'
			],
			'tips' => [
				'Implement exponential backoff retry strategy',
				'Reduce frequency of API calls',
				'Consider caching responses where appropriate',
				'Check the Retry-After header for guidance on when to retry'
			]
		],
		500 => [
			'type' => 'InternalServerError',
			'title' => 'Internal server error',
			'causes' => [
				'Unexpected condition on the server',
				'Server-side exception or error',
				'Database issues or connectivity problems'
			],
			'tips' => [
				'Retry the request after a short delay',
				'Contact BambooHR support if the problem persists',
				'Include request ID or timestamp when reporting issues'
			]
		],
		501 => [
			'type' => 'NotImplemented',
			'title' => 'Not implemented',
			'causes' => [
				'The API endpoint does not support the requested functionality',
				'The feature is planned but not yet available',
				'Using a method that is not supported by this resource'
			],
			'tips' => [
				'Check API documentation to verify the feature is supported',
				'Confirm you are using the correct API version',
				'Consider alternative approaches to achieve your goal',
				'Contact support to inquire about feature availability'
			]
		],
		502 => [
			'type' => 'BadGateway',
			'title' => 'Bad gateway',
			'causes' => [
				'The server received an invalid response from an upstream server',
				'Proxy or gateway configuration issues',
				'Temporary communication failure between servers'
			],
			'tips' => [
				'Retry the request after a delay',
				'Implement automatic retry logic with backoff',
				'Check if the service is experiencing known issues',
				'Verify network connectivity between your client and the API'
			]
		],
		503 => [
			'type' => 'ServiceUnavailable',
			'title' => 'Service unavailable',
			'causes' => [
				'Server is temporarily overloaded',
				'Server is under maintenance',
				'Service is temporarily down'
			],
			'tips' => [
				'Check the Retry-After header if provided',
				'Consider adding this status code to the list of retryable status codes, and increase the number of retries',
				'Consider implementing a circuit breaker pattern'
			]
		],
		504 => [
			'type' => 'GatewayTimeout',
			'title' => 'Gateway timeout',
			'causes' => [
				'The server acting as a gateway or proxy did not receive a timely response',
				'BambooHR servers experiencing high load',
				'Complex query taking too long to process'
			],
			'tips' => [
				'Retry the request after a delay',
				'Simplify complex queries if possible',
				'Implement circuit breaker pattern to prevent cascading failures'
			]
		],
		507 => [
			'type' => 'InsufficientStorage',
			'title' => 'Insufficient storage',
			'causes' => [
				'Server storage capacity has been reached',
				'Quota limits exceeded for your account',
				'Temporary resource constraints on the server'
			],
			'tips' => [
				'Remove unnecessary data if possible',
				'Contact support to discuss storage limitations',
				'Check if there are unused resources that can be deleted'
			]
		],
		598 => [
			'type' => 'NetworkReadTimeout',
			'title' => 'Network read timeout',
			'causes' => [
				'Network connection was dropped while waiting for response',
				'Proxy or firewall issues',
				'Incomplete data transmission'
			],
			'tips' => [
				'Check network stability and firewall settings',
				'Increase read timeout values in your HTTP client',
				'Implement automatic retry logic for idempotent operations',
				'Consider using a more reliable network connection'
			]
		]
	];

	/**
	 * Creates an appropriate exception based on the status code
	 *
	 * @param int                      $code The error code
	 * @param string                   $message The error message
	 * @param int                      $statusCode  The HTTP status code
	 * @param array                    $responseHeaders The HTTP response headers
	 * @param string                   $responseBody The HTTP response body
	 * @param RequestIdMiddleware|null $requestIdMiddleware Optional middleware to get request ID
	 * @return \Exception The appropriate exception for the status code
	 */
	public static function createException(
		int $code,
		string $message,
		int $statusCode,
		array $responseHeaders = [],
		$responseBody = null,
		?RequestIdMiddleware $requestIdMiddleware = null
	): \Exception {
		// Extract request ID from headers or middleware
		$requestId = null;

		// First check response headers directly
		$requestId = RequestIdMiddleware::extractRequestIdFromHeaders($responseHeaders);

		// If not found in headers directly, use the last tracked request ID
		if ($requestId === null) {
			$requestId = RequestIdMiddleware::getLastRequestId();
		}

		// Append request ID to message if available
		$messageWithRequestId = $message;
		if ($requestId !== null) {
			$messageWithRequestId = sprintf("%s [Request ID: %s]", $message, $requestId);
		}

		// Determine the appropriate exception class based on status code
		if (isset(self::$ERROR_MESSAGES[$statusCode]) && isset(self::$ERROR_MESSAGES[$statusCode]['type'])) {
			$type = self::$ERROR_MESSAGES[$statusCode]['type'];
			$exceptionClass = "\\BhrSdk\\Exceptions\\{$type}Exception";

			// Create the exception
			if (class_exists($exceptionClass)) {
				// For specific exception classes, we pass the message, previous exception, and error data
				// The status code is already built into the specific exception class
				/** @var \Exception $exception */
				$exception = new $exceptionClass("[{$code}] {$messageWithRequestId}", $responseHeaders, $responseBody);

				// Set request ID if exception is ApiException or subclass
				if ($exception instanceof ApiException) {
					$exception->setRequestId($requestId);
				}

				return $exception;
			}
		} elseif ($statusCode >= 500) {
			$exception = new ServerException("[{$code}] {$messageWithRequestId}", $statusCode, $responseHeaders, $responseBody);
			if ($exception instanceof ApiException) {
				$exception->setRequestId($requestId);
			}
			return $exception;
		} elseif ($statusCode >= 400) {
			$exception = new ClientException("[{$code}] {$messageWithRequestId}", $statusCode, $responseHeaders, $responseBody);
			if ($exception instanceof ApiException) {
				$exception->setRequestId($requestId);
			}
			return $exception;
		} else {
			$exception = new ApiException("[{$code}] {$messageWithRequestId}", $statusCode, $responseHeaders, $responseBody, $requestId);
			return $exception;
		}

		// Fallback to base exception if the specific class doesn't exist
		// For ApiException, we need to explicitly pass the status code
		return new ApiException("[{$code}] {$messageWithRequestId}", $statusCode, $responseHeaders, $responseBody, $requestId);
	}

	/**
	 * Formats a detailed error message with causes, tips, and request ID
	 *
	 * @param string      $baseMessage The base error message
	 * @param array       $causes      List of potential causes
	 * @param array       $tips        List of debugging tips
	 * @param string|null $requestId   Optional request ID to include in the message
	 * @return string Formatted error message with causes, tips, and request ID
	 */
	public static function formatDetailedErrorMessage(
		string $baseMessage,
		array $causes = [],
		array $tips = [],
		?string $requestId = null
	): string {
		$detailedMessage = $baseMessage;

		// Add request ID if available
		if ($requestId !== null) {
			$detailedMessage .= " [Request ID: {$requestId}]";
		}

		// Add causes
		if (!empty($causes)) {
			$detailedMessage .= ". This could be due to:\n";
			foreach ($causes as $cause) {
				$detailedMessage .= "- {$cause}\n";
			}
		}

		// Add debugging tips
		if (!empty($tips)) {
			$detailedMessage .= "\nDebugging tips:\n";
			foreach ($tips as $tip) {
				$detailedMessage .= "- {$tip}\n";
			}

			// Add request ID reference in debugging tips if available
			if ($requestId !== null) {
				$detailedMessage .= "- Include this Request ID ({$requestId}) when contacting support\n";
			}
		}

		return $detailedMessage;
	}
}
