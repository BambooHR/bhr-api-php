<?php
/**
 * BambooHRTokenRefreshProvider
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client\Auth
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client\Auth;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use BhrSdk\ApiException;

/**
 * BambooHRTokenRefreshProvider handles OAuth token refresh for BambooHR
 *
 * This class implements the OAuth 2.0 refresh token grant type
 * to obtain new access tokens from BambooHR's OAuth server.
 *
 * @category Class
 * @package  BhrSdk\Client\Auth
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class BambooHRTokenRefreshProvider {
	private ClientInterface $httpClient;
	private string $clientId;
	private string $clientSecret;
	private string $tokenEndpoint;

	/**
	 * Create a new BambooHR token refresh provider
	 *
	 * @param string               $clientId OAuth client ID
	 * @param string               $clientSecret OAuth client secret
	 * @param string               $apiHost The API host (e.g., 'https://example.bamboohr.com' or 'http://localhost:8080')
	 * @param ClientInterface|null $httpClient Custom HTTP client (optional)
	 */
	public function __construct(
		string $clientId,
		string $clientSecret,
		string $apiHost = 'https://example.bamboohr.com',
		?ClientInterface $httpClient = null
	) {
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;

		// Build token endpoint based on host
		// Format: {host}/token.php?request=token
		// Example: https://example.bamboohr.com/token.php?request=token
		$this->tokenEndpoint = $this->buildTokenEndpoint($apiHost);
		$this->httpClient = $httpClient ?? new Client();
	}

	/**
	 * Build the token endpoint URL based on the API host
	 *
	 * BambooHR uses a custom OAuth endpoint format:
	 * {host}/token.php?request=token
	 *
	 * @param string $apiHost The API host
	 * @return string The token endpoint URL
	 */
	private function buildTokenEndpoint(string $apiHost): string {
		// Remove trailing slash
		$apiHost = rtrim($apiHost, '/');

		// BambooHR uses custom OAuth endpoints for both production and local
		return $apiHost . '/token.php?request=token';
	}

	/**
	 * Refresh an access token using a refresh token
	 *
	 * Makes a POST request to the BambooHR OAuth token endpoint with
	 * the refresh_token grant type.
	 *
	 * @param string $refreshToken The refresh token to use
	 * @return TokenResponse The new token response
	 * @throws ApiException If the refresh request fails
	 */
	public function refreshToken(string $refreshToken): TokenResponse {
		try {
			$response = $this->httpClient->request('POST', $this->tokenEndpoint, [
				'form_params' => [
					'grant_type' => 'refresh_token',
					'refresh_token' => $refreshToken,
					'client_id' => $this->clientId,
					'client_secret' => $this->clientSecret,
				],
				'headers' => [
					'Accept' => 'application/json',
					'Content-Type' => 'application/x-www-form-urlencoded',
				],
			]);

			$statusCode = $response->getStatusCode();
			if ($statusCode < 200 || $statusCode >= 300) {
				throw new ApiException(
					'Token refresh failed with status ' . $statusCode,
					$statusCode,
					$response->getHeaders(),
					(string) $response->getBody()
				);
			}

			$body = (string) $response->getBody();
			$data = json_decode($body, true);

			if (json_last_error() !== JSON_ERROR_NONE) {
				throw new ApiException(
					'Invalid JSON response from token endpoint: ' . json_last_error_msg(),
					500,
					$response->getHeaders(),
					$body
				);
			}

			if (!isset($data['access_token'])) {
				throw new ApiException(
					'Token response missing required access_token field',
					500,
					$response->getHeaders(),
					$body
				);
			}

			return new TokenResponse(
				accessToken: $data['access_token'],
				refreshToken: $data['refresh_token'] ?? null,
				expiresIn: isset($data['expires_in']) ? (int) $data['expires_in'] : null
			);

		} catch (GuzzleException $e) {
			throw new ApiException(
				'Token refresh request failed: ' . $e->getMessage(),
				$e->getCode(),
				[],
				null
			);
		}
	}

	/**
	 * Get the token endpoint URL
	 *
	 * @return string The token endpoint URL
	 */
	public function getTokenEndpoint(): string {
		return $this->tokenEndpoint;
	}

	/**
	 * Get the client ID
	 *
	 * @return string The OAuth client ID
	 */
	public function getClientId(): string {
		return $this->clientId;
	}
}
