<?php
/**
 * OAuth2Middleware
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client\Middleware
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client\Middleware;

use BhrSdk\Client\Auth\TokenManager;
use BhrSdk\Client\Auth\BambooHRTokenRefreshProvider;
use BhrSdk\Configuration;
use BhrSdk\ApiException;
use BhrSdk\Exceptions\AuthenticationFailedException;
use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * OAuth2Middleware handles automatic OAuth token refresh
 *
 * This middleware:
 * - Checks token expiration before requests (proactive refresh)
 * - Intercepts 401 errors and attempts token refresh (reactive refresh)
 * - Updates Configuration with new tokens
 * - Retries failed requests after successful refresh
 *
 * @category Class
 * @package  BhrSdk\Client\Middleware
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class OAuth2Middleware {
	private TokenManager $tokenManager;
	private BambooHRTokenRefreshProvider $refreshProvider;
	private Configuration $config;
	private bool $isRefreshing = false;

	/**
	 * Create a new OAuth2 middleware instance
	 *
	 * @param TokenManager                 $tokenManager Token manager with refresh capability
	 * @param BambooHRTokenRefreshProvider $refreshProvider Provider to perform token refresh
	 * @param Configuration                $config Configuration to update with new tokens
	 */
	public function __construct(
		TokenManager $tokenManager,
		BambooHRTokenRefreshProvider $refreshProvider,
		Configuration $config
	) {
		$this->tokenManager = $tokenManager;
		$this->refreshProvider = $refreshProvider;
		$this->config = $config;
	}

	/**
	 * Handle a request with automatic token refresh support
	 *
	 * This method implements two refresh strategies:
	 * 1. Proactive token refresh if expiry is imminent
	 * 2. Reactive token refresh on 401 responses
	 * 3. Updating the request with new tokens
	 *
	 * @param callable         $sendRequest Callable that sends the request and returns ResponseInterface
	 * @param RequestInterface $request The HTTP request
	 * @param Client|null      $client The HTTP client (optional, not used)
	 * @param array            $options Request options
	 * @return ResponseInterface The HTTP response
	 * @throws ApiException If request fails or refresh fails
	 */
	public function handle(
		callable $sendRequest,
		RequestInterface $request,
		?Client $client,
		array $options
	): ResponseInterface {
		// Only proceed if we have refresh capability
		if (!$this->tokenManager->hasRefreshCapability()) {
			return $sendRequest($request, $options);
		}

		// Proactive refresh: Check if token needs refresh before sending request
		if ($this->tokenManager->needsRefresh() && !$this->isRefreshing) {
			try {
				$this->refreshAccessToken();
				$request = $this->updateRequestWithNewToken($request);
			} catch (\Exception $e) {
				// If proactive refresh fails, proceed anyway and let reactive refresh handle it
				// This prevents blocking requests if refresh temporarily fails
			}
		}

		// Try the request
		try {
			return $sendRequest($request, $options);
		} catch (AuthenticationFailedException $e) {
			// Reactive refresh: 401 received, try to refresh and retry once
			if ($this->isRefreshing) {
				// Already tried refreshing, don't retry again
				throw $e;
			}

			try {
				$this->refreshAccessToken();
				$request = $this->updateRequestWithNewToken($request);

				// Retry the request with new token
				return $sendRequest($request, $options);
			} catch (\Exception $refreshError) {
				// Refresh failed, throw the original 401 error
				throw $e;
			}
		}
	}

	/**
	 * Refresh the access token
	 *
	 * @return void
	 * @throws ApiException If refresh fails
	 */
	private function refreshAccessToken(): void {
		$this->isRefreshing = true;

		try {
			$refreshToken = $this->tokenManager->getRefreshToken();
			if ($refreshToken === null) {
				throw new ApiException('No refresh token available', 401, [], null);
			}

			$tokenResponse = $this->refreshProvider->refreshToken($refreshToken);
			$this->tokenManager->updateTokens($tokenResponse);

			// Update Configuration with new access token
			$this->config->setAccessToken($this->tokenManager->getAccessToken());

		} finally {
			$this->isRefreshing = false;
		}
	}

	/**
	 * Update the request with the new access token
	 *
	 * @param RequestInterface $request Original request
	 * @return RequestInterface Request with updated Authorization header
	 */
	private function updateRequestWithNewToken(RequestInterface $request): RequestInterface {
		$accessToken = $this->tokenManager->getAccessToken();
		return $request->withHeader('Authorization', 'Bearer ' . $accessToken);
	}

	/**
	 * Check if a refresh is currently in progress
	 *
	 * @return bool True if refreshing
	 */
	public function isRefreshing(): bool {
		return $this->isRefreshing;
	}
}
