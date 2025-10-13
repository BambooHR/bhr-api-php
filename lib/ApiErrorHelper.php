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
			'title' => 'Bad request. This could be due to:',
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
			'title' => 'Authentication failed. This could be due to:',
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
			'title' => 'Permission denied. This could be due to:',
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
			'title' => 'Resource not found. This could be due to:',
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
			'title' => 'Method not allowed. This could be due to:',
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
			'title' => 'Request timeout. This could be due to:',
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
			'title' => 'Conflict. This could be due to:',
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
			'title' => 'Payload too large. This could be due to:',
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
			'title' => 'Unsupported media type. This could be due to:',
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
			'title' => 'Unprocessable entity. This could be due to:',
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
			'title' => 'Rate limit exceeded. This could be due to:',
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
			'title' => 'Internal server error. This could be due to:',
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
			'title' => 'Not implemented. This could be due to:',
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
			'title' => 'Bad gateway. This could be due to:',
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
			'title' => 'Service unavailable. This could be due to:',
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
			'title' => 'Gateway timeout. This could be due to:',
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
			'title' => 'Insufficient storage. This could be due to:',
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
			'title' => 'Network read timeout. This could be due to:',
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
	 * Formats error messages with helpful context based on status code
	 *
	 * @param int    $code        The error code
	 * @param string $baseMessage The base error message
	 * @param int    $statusCode  The HTTP status code
	 * @return string Formatted error message with debugging tips
	 */
	public static function formatErrorMessage(int $code, string $baseMessage, int $statusCode): string {
		$message = "[{$code}] {$baseMessage}. HTTP status code: {$statusCode}";

		// Add helpful context for known error status codes
		if (isset(self::$ERROR_MESSAGES[$statusCode])) {
			$errorInfo = self::$ERROR_MESSAGES[$statusCode];
			$message .= "\n\n{$errorInfo['title']}\n";

			// Add causes
			if (isset($errorInfo['causes']) && is_array($errorInfo['causes'])) {
				foreach ($errorInfo['causes'] as $cause) {
					$message .= "- {$cause}\n";
				}
			}

			$message .= "\nDebugging tips:\n";

			// Add tips
			if (isset($errorInfo['tips']) && is_array($errorInfo['tips'])) {
				foreach ($errorInfo['tips'] as $tip) {
					$message .= "- {$tip}\n";
				}
			}
		}

		return $message;
	}
}
