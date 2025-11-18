<?php
/**
 * Server Exception
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Exceptions
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Exceptions;

use BhrSdk\ApiException;

/**
 * Server Exception Class
 *
 * Base class for all server-side (5xx) exceptions
 *
 * @category Class
 * @package  BhrSdk\Exceptions
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class ServerException extends ApiException {
	/**
	 * Constructor
	 *
	 * @param string $message   The error message
	 * @param int    $code      The error code (HTTP status code)
	 * @param array  $responseHeaders Additional error data
	 * @param string $responseBody Additional error data
	 */
	public function __construct(string $message = "", int $code = 500, array $responseHeaders = [], $responseBody = null) {
		parent::__construct($message, $code, $responseHeaders, $responseBody);
	}
}
