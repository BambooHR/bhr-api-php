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
		$message = "[{$code}] {$baseMessage}";

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
