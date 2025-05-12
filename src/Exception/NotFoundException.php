<?php

declare(strict_types=1);

namespace BambooHR\SDK\Exception;

/**
 * Exception thrown when a requested resource is not found.
 */
class NotFoundException extends BambooHRException {

	/**
	 * @param string          $message  Error message
	 * @param int             $code     Error code
	 * @param \Throwable|null $previous Previous exception
	 */
	public function __construct(string $message = "Resource not found", int $code = 404, ?\Throwable $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}
