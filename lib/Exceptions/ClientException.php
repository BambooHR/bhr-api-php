<?php
/**
 * Client Exception
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
 * Client Exception Class
 *
 * Base class for all client-side (4xx) exceptions
 *
 * @category Class
 * @package  BhrSdk\Exceptions
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class ClientException extends ApiException {
	/**
	 * Constructor
	 *
	 * @param string $message   The error message
	 * @param int    $code      The error code (HTTP status code)
	 * @param array  $responseHeaders Additional error data
	 * @param string $responseBody Additional error data
	 */
	public function __construct(string $message = "", int $code = 400, array $responseHeaders = [], $responseBody = null) {
		parent::__construct($message, $code, $responseHeaders, $responseBody);
	}
}
