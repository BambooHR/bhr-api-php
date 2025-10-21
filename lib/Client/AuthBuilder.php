<?php
declare(strict_types=1);
/**
 * AuthBuilder
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client;

use BhrSdk\Configuration;

/**
 * AuthBuilder provides a fluent interface for configuring authentication
 *
 * This class handles authentication configuration separately from the main
 * ApiClient, making it easier to test and extend authentication methods.
 *
 * @category Class
 * @package  BhrSdk\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class AuthBuilder {
	private ?string $authType = null;
	private ?string $apiKey = null;
	private ?string $oauthToken = null;
	private ?string $refreshToken = null;
	private ?string $clientId = null;
	private ?string $clientSecret = null;
	private ?int $expiresIn = null;

	/**
	 * @var callable|null Callback for token refresh notifications
	 */
	private $onTokenRefresh = null;

	/**
	 * Configure authentication using an API key (recommended)
	 *
	 * @param string $apiKey Your BambooHR API key
	 * @return self
	 */
	public function withApiKey(string $apiKey): self {
		$this->authType = 'api_key';
		$this->apiKey = $apiKey;
		return $this;
	}

	/**
	 * Configure authentication using OAuth token
	 *
	 * @param string $token Your OAuth access token
	 * @return self
	 */
	public function withOAuth(string $token): self {
		$this->authType = 'oauth';
		$this->oauthToken = $token;
		return $this;
	}

	/**
	 * Configure authentication using OAuth with automatic token refresh
	 *
	 * @param string   $accessToken Your OAuth access token
	 * @param string   $refreshToken Your OAuth refresh token
	 * @param string   $clientId Your OAuth client ID
	 * @param string   $clientSecret Your OAuth client secret
	 * @param int|null $expiresIn Number of seconds until access token expires (optional)
	 * @return self
	 */
	public function withOAuthRefresh(
		string $accessToken,
		string $refreshToken,
		string $clientId,
		string $clientSecret,
		?int $expiresIn = null
	): self {
		$this->authType = 'oauth_refresh';
		$this->oauthToken = $accessToken;
		$this->refreshToken = $refreshToken;
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
		$this->expiresIn = $expiresIn;
		return $this;
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
	public function onTokenRefresh(callable $callback): self {
		$this->onTokenRefresh = $callback;
		return $this;
	}

	/**
	 * Apply the authentication configuration to a Configuration object
	 *
	 * @param Configuration $config The configuration object to apply auth to
	 * @return void
	 * @throws \InvalidArgumentException if no authentication method is configured
	 */
	public function applyTo(Configuration $config): void {
		if ($this->authType === null) {
			throw new \InvalidArgumentException(
				'No authentication method configured. Use withApiKey() or withOAuth()'
			);
		}

		switch ($this->authType) {
			case 'api_key':
				if ($this->apiKey === null) {
					throw new \InvalidArgumentException('API key cannot be null');
				}
				$config->setUsername($this->apiKey);
				$config->setPassword('x'); // BambooHR uses 'x' as password with API key
				break;

			case 'oauth':
			case 'oauth_refresh':
				if ($this->oauthToken === null) {
					throw new \InvalidArgumentException('OAuth token cannot be null');
				}
				$config->setAccessToken($this->oauthToken);
				break;

			default:
				throw new \InvalidArgumentException("Unknown authentication type: {$this->authType}");
		}
	}

	/**
	 * Check if authentication has been configured
	 *
	 * @return bool True if authentication is configured
	 */
	public function isConfigured(): bool {
		return $this->authType !== null;
	}

	/**
	 * Get the authentication type
	 *
	 * @return string|null The authentication type ('api_key', 'oauth', 'oauth_refresh') or null if not configured
	 */
	public function getAuthType(): ?string {
		return $this->authType;
	}

	/**
	 * Check if OAuth refresh is configured
	 *
	 * @return bool True if OAuth with refresh capability is configured
	 */
	public function hasOAuthRefresh(): bool {
		return $this->authType === 'oauth_refresh';
	}

	/**
	 * Get the refresh token
	 *
	 * @return string|null The refresh token, or null if not configured
	 */
	public function getRefreshToken(): ?string {
		return $this->refreshToken;
	}

	/**
	 * Get the OAuth client ID
	 *
	 * @return string|null The client ID, or null if not configured
	 */
	public function getClientId(): ?string {
		return $this->clientId;
	}

	/**
	 * Get the OAuth client secret
	 *
	 * @return string|null The client secret, or null if not configured
	 */
	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}

	/**
	 * Get the token expiration time
	 *
	 * @return int|null Seconds until expiration, or null if not configured
	 */
	public function getExpiresIn(): ?int {
		return $this->expiresIn;
	}

	/**
	 * Get the token refresh callback
	 *
	 * @return callable|null The callback, or null if not configured
	 */
	public function getTokenRefreshCallback() {
		return $this->onTokenRefresh;
	}

	/**
	 * Validate the authentication configuration
	 *
	 * @return bool True if valid
	 * @throws \InvalidArgumentException if configuration is invalid
	 */
	public function validate(): bool {
		if ($this->authType === null) {
			throw new \InvalidArgumentException('No authentication method configured');
		}

		switch ($this->authType) {
			case 'api_key':
				if (empty($this->apiKey)) {
					throw new \InvalidArgumentException('API key cannot be empty');
				}
				break;

			case 'oauth':
				if (empty($this->oauthToken)) {
					throw new \InvalidArgumentException('OAuth token cannot be empty');
				}
				break;

			case 'oauth_refresh':
				if (empty($this->oauthToken)) {
					throw new \InvalidArgumentException('OAuth access token cannot be empty');
				}
				if (empty($this->refreshToken)) {
					throw new \InvalidArgumentException('OAuth refresh token cannot be empty');
				}
				if (empty($this->clientId)) {
					throw new \InvalidArgumentException('OAuth client ID cannot be empty');
				}
				if (empty($this->clientSecret)) {
					throw new \InvalidArgumentException('OAuth client secret cannot be empty');
				}
				break;

			default:
				throw new \InvalidArgumentException("Unknown authentication type: {$this->authType}");
		}

		return true;
	}

	/**
	 * Get a sanitized representation of the authentication configuration
	 * (for logging purposes - sensitive data is redacted)
	 *
	 * @return array<string, mixed> Sanitized authentication info
	 */
	public function getSanitizedInfo(): array {
		if ($this->authType === null) {
			return ['type' => 'none', 'configured' => false];
		}

		$info = [
			'type' => $this->authType,
			'configured' => true,
		];

		switch ($this->authType) {
			case 'api_key':
				$info['api_key'] = $this->maskSensitiveData($this->apiKey);
				break;

			case 'oauth':
				$info['oauth_token'] = $this->maskSensitiveData($this->oauthToken);
				break;

			case 'oauth_refresh':
				$info['oauth_token'] = $this->maskSensitiveData($this->oauthToken);
				$info['refresh_token'] = $this->maskSensitiveData($this->refreshToken);
				$info['client_id'] = $this->clientId;
				$info['has_callback'] = $this->onTokenRefresh !== null;
				break;
		}

		return $info;
	}

	/**
	 * Mask sensitive data for logging
	 *
	 * @param string|null $value The value to mask
	 * @return string Masked value
	 */
	private function maskSensitiveData(?string $value): string {
		if ($value === null || empty($value)) {
			return '********';
		}

		$length = strlen($value);

		if ($length <= 8) {
			return '********';
		}

		// Show first 4 and last 4 characters
		return substr($value, 0, 4) . '********' . substr($value, -4);
	}

	/**
	 * Reset the authentication configuration
	 *
	 * @return self
	 */
	public function reset(): self {
		$this->authType = null;
		$this->apiKey = null;
		$this->oauthToken = null;
		$this->refreshToken = null;
		$this->clientId = null;
		$this->clientSecret = null;
		$this->expiresIn = null;
		$this->onTokenRefresh = null;
		return $this;
	}
}
