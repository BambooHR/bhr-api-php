<?php

declare(strict_types=1);

namespace BambooHR\SDK\Exception;

/**
 * Exception thrown when API rate limits are exceeded.
 */
class RateLimitException extends BambooHRException {

	private ?int $retryAfter = null;

	/**
	 * @param string          $message    Error message
	 * @param int             $code       Error code
	 * @param \Throwable|null $previous   Previous exception
	 * @param int|null        $retryAfter Seconds to wait before retrying
	 */
	public function __construct(
		string $message = "Rate limit exceeded",
		int $code = 429,
		?\Throwable $previous = null,
		?int $retryAfter = null
	) {
		parent::__construct($message, $code, $previous);
		$this->retryAfter = $retryAfter;
	}

	/**
	 * Get the recommended retry-after time in seconds.
	 *
	 * @return int|null Seconds to wait before retrying, or null if not provided
	 */
	public function getRetryAfter(): ?int {
		return $this->retryAfter;
	}
}
