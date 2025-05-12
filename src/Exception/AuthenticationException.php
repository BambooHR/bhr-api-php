<?php

declare(strict_types=1);

namespace BambooHR\SDK\Exception;

/**
 * Exception thrown when authentication fails.
 */
class AuthenticationException extends BambooHRException {

	/**
	 * @param string          $message  Error message
	 * @param int             $code     Error code
	 * @param \Throwable|null $previous Previous exception
	 */
	public function __construct(
		string $message = "Authentication failed",
		int $code = 401,
		?\Throwable $previous = null
	) {
		parent::__construct($message, $code, $previous);
	}
}
