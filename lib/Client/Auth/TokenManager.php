<?php
/**
 * TokenManager
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client\Auth
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client\Auth;

/**
 * TokenManager manages OAuth token state and refresh logic
 *
 * This class is responsible for:
 * - Storing current access and refresh tokens
 * - Tracking token expiration
 * - Determining when tokens need to be refreshed
 * - Notifying callbacks when tokens are updated
 *
 * @category Class
 * @package  BhrSdk\Client\Auth
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class TokenManager {
	/**
	 * Buffer time before expiration to trigger proactive refresh (5 minutes)
	 */
	private const EXPIRY_BUFFER_SECONDS = 300;

	private string $accessToken;
	private ?string $refreshToken;
	private ?int $expiresAt;

	/**
	 * @var callable|null Callback function for token refresh notifications
	 */
	private $onTokenRefresh;

	/**
	 * Create a new token manager
	 *
	 * @param string        $accessToken The current access token
	 * @param string|null   $refreshToken The refresh token (required for auto-refresh)
	 * @param int|null      $expiresIn Number of seconds until access token expires
	 * @param callable|null $onTokenRefresh Callback when tokens are refreshed
	 */
	public function __construct(
		string $accessToken,
		?string $refreshToken = null,
		?int $expiresIn = null,
		?callable $onTokenRefresh = null
	) {
		$this->accessToken = $accessToken;
		$this->refreshToken = $refreshToken;
		$this->expiresAt = $expiresIn !== null ? (time() + $expiresIn) : null;
		$this->onTokenRefresh = $onTokenRefresh;
	}

	/**
	 * Get the current access token
	 *
	 * @return string Current access token
	 */
	public function getAccessToken(): string {
		return $this->accessToken;
	}

	/**
	 * Get the current refresh token
	 *
	 * @return string|null Current refresh token, or null if not available
	 */
	public function getRefreshToken(): ?string {
		return $this->refreshToken;
	}

	/**
	 * Check if automatic token refresh is available
	 *
	 * Refresh is only available when a refresh token is present
	 *
	 * @return bool True if refresh capability exists
	 */
	public function hasRefreshCapability(): bool {
		return $this->refreshToken !== null;
	}

	/**
	 * Check if the access token needs to be refreshed
	 *
	 * Returns true if:
	 * - We have refresh capability (refresh token exists), AND
	 * - Token is expired or will expire within the buffer period
	 *
	 * @return bool True if token should be refreshed
	 */
	public function needsRefresh(): bool {
		// Can't refresh if we don't have a refresh token
		if (!$this->hasRefreshCapability()) {
			return false;
		}

		// If we don't know the expiry, we can't proactively refresh
		if ($this->expiresAt === null) {
			return false;
		}

		// Refresh if we're within the buffer period of expiration
		$now = time();
		$bufferTime = $this->expiresAt - self::EXPIRY_BUFFER_SECONDS;

		return $now >= $bufferTime;
	}

	/**
	 * Check if the access token is expired
	 *
	 * @return bool True if token is expired (past the expiration time)
	 */
	public function isExpired(): bool {
		if ($this->expiresAt === null) {
			return false; // Unknown expiry, assume not expired
		}

		return time() >= $this->expiresAt;
	}

	/**
	 * Update tokens after a successful refresh
	 *
	 * This method updates the stored tokens and triggers the callback
	 * if one is registered.
	 *
	 * @param TokenResponse $tokenResponse The response from the refresh request
	 * @return void
	 */
	public function updateTokens(TokenResponse $tokenResponse): void {
		$oldAccessToken = $this->accessToken;
		$oldRefreshToken = $this->refreshToken;

		// Update access token
		$this->accessToken = $tokenResponse->accessToken;

		// Update refresh token if a new one was provided (token rotation)
		if ($tokenResponse->hasRefreshToken()) {
			$this->refreshToken = $tokenResponse->refreshToken;
		}

		// Update expiration time if provided
		$this->expiresAt = $tokenResponse->getExpiresAt();

		// Notify callback if registered
		if ($this->onTokenRefresh !== null) {
			call_user_func(
				$this->onTokenRefresh,
				$this->accessToken,
				$this->refreshToken,
				$oldAccessToken,
				$oldRefreshToken
			);
		}
	}

	/**
	 * Set a callback to be invoked when tokens are refreshed
	 *
	 * The callback receives four parameters:
	 * 1. string $newAccessToken
	 * 2. string|null $newRefreshToken
	 * 3. string $oldAccessToken
	 * 4. string|null $oldRefreshToken
	 *
	 * @param callable $callback Function to call on token refresh
	 * @return self
	 */
	public function setRefreshCallback(callable $callback): self {
		$this->onTokenRefresh = $callback;
		return $this;
	}

	/**
	 * Get the token expiration timestamp
	 *
	 * @return int|null Unix timestamp when token expires, or null if unknown
	 */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	/**
	 * Get the number of seconds until the token expires
	 *
	 * @return int|null Seconds until expiration, or null if unknown
	 */
	public function getSecondsUntilExpiry(): ?int {
		if ($this->expiresAt === null) {
			return null;
		}

		$seconds = $this->expiresAt - time();
		return max(0, $seconds); // Never return negative
	}
}
