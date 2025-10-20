<?php
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
	 * @return string|null The authentication type ('api_key', 'oauth') or null if not configured
	 */
	public function getAuthType(): ?string {
		return $this->authType;
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
		return $this;
	}
}
