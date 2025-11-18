<?php
/**
 * TokenResponse
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client\Auth
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client\Auth;

/**
 * TokenResponse represents the response from a token refresh request
 *
 * This class uses PHP 8.1's readonly properties to ensure immutability
 * after construction, following security best practices for token handling.
 *
 * @category Class
 * @package  BhrSdk\Client\Auth
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class TokenResponse {
	/**
	 * Create a new token response
	 *
	 * @param string      $accessToken The new access token
	 * @param string|null $refreshToken The new refresh token (may be rotated or same as before)
	 * @param int|null    $expiresIn Number of seconds until the access token expires
	 */
	public function __construct(
		public readonly string $accessToken,
		public readonly ?string $refreshToken = null,
		public readonly ?int $expiresIn = null,
	) {
	}

	/**
	 * Calculate the expiration timestamp
	 *
	 * @return int|null Unix timestamp when token expires, or null if not known
	 */
	public function getExpiresAt(): ?int {
		if ($this->expiresIn === null) {
			return null;
		}

		return time() + $this->expiresIn;
	}

	/**
	 * Check if the response includes a new refresh token
	 *
	 * @return bool True if a refresh token is included
	 */
	public function hasRefreshToken(): bool {
		return $this->refreshToken !== null;
	}
}
