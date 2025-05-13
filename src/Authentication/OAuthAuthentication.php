<?php

declare(strict_types=1);

namespace BambooHR\SDK\Authentication;

use BambooHR\SDK\Exception\AuthenticationException;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OAuthAuthentication {
	private const DEFAULT_BASE_DOMAIN = 'bamboohr.com';
	private const TOKEN_URL = 'https://%s.%s/token.php?request=token';
	private const AUTH_URL = 'https://%s.%s/authorize.php?request=authorize';
	private string $baseDomain;
	private string $clientId;
	private string $clientSecret;
	private ?string $accessToken = null;
	private ?string $refreshToken = null;
	private ?int $expiresAt = null;
	private ?string $tokenType = null;
	private ?array $scope = null;

	/**
	 * @param string $clientId     OAuth client ID
	 * @param string $clientSecret OAuth client secret
	 * @param string $baseDomain   Base domain for all URLs (default: bamboohr.com)
	 */
	public function __construct(string $clientId, string $clientSecret, string $baseDomain = self::DEFAULT_BASE_DOMAIN) {
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
		$this->baseDomain = $baseDomain;
	}

	/**
	 * @throws AuthenticationException
	 * @throws GuzzleException
	 */
	public function authenticate(string $companyDomain, string $grantType, array $params = []): array {
		$client = new Client();

		$options = [
			'json' => array_merge([
				'client_id' => $this->clientId,
				'client_secret' => $this->clientSecret,
				'grant_type' => $grantType,
			], $params)
		];

		try {
			$tokenUrl = sprintf(self::TOKEN_URL, $companyDomain, $this->baseDomain);
			$response = $client->post($tokenUrl, $options);
			$data = json_decode((string)$response->getBody(), true);

			if (!isset($data['access_token'])) {
				throw new AuthenticationException('Invalid response from authentication server');
			}

			$this->accessToken = $data['access_token'];
			$this->tokenType = $data['token_type'] ?? 'Bearer';
			$this->expiresAt = time() + ($data['expires_in'] ?? 3600);

			// Store refresh token if provided
			if (isset($data['refresh_token'])) {
				$this->refreshToken = $data['refresh_token'];
			}

			// Store scope if provided
			if (isset($data['scope'])) {
				$this->scope = explode(' ', $data['scope']);
			}

			return $data;
		} catch (Exception $e) {
			throw new AuthenticationException('Authentication failed: ' . $e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * @throws AuthenticationException
	 */
	public function addAuthToRequest(array $options): array {
		if (!$this->isAuthenticated()) {
			throw new AuthenticationException('Not authenticated');
		}

		if (!isset($options['headers'])) {
			$options['headers'] = [];
		}

		$options['headers']['Authorization'] = $this->tokenType . ' ' . $this->accessToken;

		return $options;
	}

	public function canRefreshToken(): bool {
		return $this->refreshToken !== null;
	}

	/**
	 * @throws AuthenticationException
	 * @throws GuzzleException
	 */
	public function refreshToken(string $companyDomain): array {
		if (!$this->canRefreshToken()) {
			throw new AuthenticationException('No refresh token available');
		}

		return $this->authenticate($companyDomain, 'refresh_token', [
			'refresh_token' => $this->refreshToken
		]);
	}

	public function getAuthorizationUrl(string $companyDomain, array $params = []): string {
		$params['response_type'] = 'code';
		$params['client_id'] = $this->clientId;
		$params['scope'] = $params['scope'] ?? '';

		return sprintf(self::AUTH_URL, $companyDomain, $this->baseDomain) . '&' . http_build_query($params);
	}

	public function isAuthenticated(): bool {
		return $this->accessToken !== null && ($this->expiresAt === null || $this->expiresAt > time());
	}

	public function isTokenExpiringSoon(int $seconds = 300): bool {
		if ($this->accessToken === null || $this->expiresAt === null) {
			return false;
		}

		// Check if token will expire within the specified number of seconds
		return $this->expiresAt - time() <= $seconds;
	}

	/**
	 * Get the access token.
	 *
	 * @return string|null
	 */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	/**
	 * Get the refresh token.
	 *
	 * @return string|null
	 */
	public function getRefreshToken(): ?string {
		return $this->refreshToken;
	}

	/**
	 * Get the token expiration timestamp.
	 *
	 * @return int|null
	 */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	/**
	 * Set authentication data directly.
	 *
	 * @param string      $accessToken  Access token
	 * @param string|null $refreshToken Refresh token
	 * @param int|null    $expiresAt    Expiration timestamp
	 * @param string|null $tokenType    Token type
	 *
	 * @return self
	 */
	public function setTokens(
		string  $accessToken,
		?string $refreshToken = null,
		?int    $expiresAt = null,
		?string $tokenType = 'Bearer'
	): self {
		$this->accessToken = $accessToken;
		$this->refreshToken = $refreshToken;
		$this->expiresAt = $expiresAt;
		$this->tokenType = $tokenType;

		return $this;
	}
}
