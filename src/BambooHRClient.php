<?php

declare(strict_types=1);

namespace BambooHR\SDK;

use BambooHR\SDK\Authentication\OAuthAuthentication;
use BambooHR\SDK\Exception\AuthenticationException;
use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Exception\RateLimitException;
use BambooHR\SDK\Http\HttpClientInterface;
use BambooHR\SDK\Resources\EmployeeResource;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Psr\Log\LoggerInterface;

class BambooHRClient {
	private const DEFAULT_API_VERSION = 'v1';
	private const DEFAULT_BASE_DOMAIN = 'bamboohr.com';
	private string $apiVersion;
	private string $baseDomain;
	private string $companyDomain;
	private OAuthAuthentication $authentication;
	private HttpClientInterface $httpClient;
	private LoggerInterface $logger;
	private ?Resources\EmployeeResource $employeeResource = null;
	private ?Resources\DirectoryResource $directoryResource = null;
	private ?Resources\ReportResource $reportResource = null;
	private ?Resources\MetadataResource $metadataResource = null;
	private ?Resources\TimeOffResource $timeOffResource = null;

	/**
	 * @param string              $companyDomain  Company subdomain for BambooHR
	 * @param OAuthAuthentication $authentication Authentication implementation
	 * @param HttpClientInterface $httpClient     HTTP client implementation
	 * @param LoggerInterface     $logger         PSR-3 compatible logger
	 * @param string              $apiVersion     API version to use
	 * @param string              $baseDomain     Base domain for all URLs (default: bamboohr.com)
	 */
	public function __construct(
		string              $companyDomain,
		OAuthAuthentication $authentication,
		HttpClientInterface $httpClient,
		LoggerInterface     $logger,
		string              $apiVersion = self::DEFAULT_API_VERSION,
		string              $baseDomain = self::DEFAULT_BASE_DOMAIN
	) {
		$this->companyDomain = $companyDomain;
		$this->authentication = $authentication;
		$this->httpClient = $httpClient;
		$this->logger = $logger;
		$this->apiVersion = $apiVersion;
		$this->baseDomain = $baseDomain;
	}

	/**
	 * Get the base URL for API requests.
	 *
	 * @return string The base URL
	 */
	public function getBaseUrl(): string {
		return sprintf(
			'https://api.%s/api/gateway.php/%s/%s',
			$this->baseDomain,
			$this->companyDomain,
			$this->apiVersion
		);
	}

	/**
	 * Authenticate with the BambooHR API.
	 *
	 * @param string $grantType The OAuth grant type
	 * @param array  $params    Additional parameters for authentication
	 *
	 * @return array Authentication response data
	 * @throws BambooHRException If authentication fails
	 */
	public function authenticate(string $grantType, array $params = []): array {
		return $this->authentication->authenticate($this->companyDomain, $grantType, $params);
	}

	/**
	 * Get the authorization URL for OAuth authentication.
	 *
	 * @param array $params Parameters for the authorization URL
	 *
	 * @return string The authorization URL
	 */
	public function getAuthorizationUrl(array $params = []): string {
		return $this->authentication->getAuthorizationUrl($this->companyDomain, $params);
	}

	/**
	 * Check if the client is authenticated.
	 *
	 * @return bool
	 */
	public function isAuthenticated(): bool {
		return $this->authentication->isAuthenticated();
	}

	/**
	 * Send a request to the BambooHR API.
	 *
	 * @param string $method   HTTP method
	 * @param string $endpoint API endpoint
	 * @param array  $options  Request options
	 *
	 * @return array|string Response data
	 * @throws BambooHRException If the request fails
	 * @throws AuthenticationException If authentication fails
	 * @throws RateLimitException If rate limit is exceeded
	 * @throws NotFoundException If resource is not found
	 */
	public function request(string $method, string $endpoint, array $options = []): array | string {
		$url = $this->getApiUrl($endpoint);

		// Check if token needs to be refreshed before making the request
		$this->refreshTokenIfNeeded();

		// Add authentication to the request
		$options = $this->authentication->addAuthToRequest($options);

		// Add request ID for tracking
		$requestId = uniqid('bhr_', true);
		if (!isset($options['headers'])) {
			$options['headers'] = [];
		}
		$options['headers']['X-Request-ID'] = $requestId;

		$this->logger->debug('Sending request to BambooHR API', [
			'request_id' => $requestId,
			'method' => $method,
			'url' => $url,
			'options' => $this->redactSensitiveData($options)
		]);

		try {
			$response = $this->httpClient->request($method, $url, $options);

			// Log response (excluding sensitive data)
			$this->logger->debug('Received response from BambooHR API', [
				'request_id' => $requestId,
				'status_code' => $response['statusCode'],
				'headers' => array_diff_key($response['headers'] ?? [], ['authorization' => true, 'set-cookie' => true])
			]);

			// Check if token needs refresh and retry if it does
			if ($response['statusCode'] === 401 && $this->authentication->canRefreshToken()) {
				$this->logger->info('Authentication failed, refreshing token and retrying', [
					'request_id' => $requestId
				]);

				$this->authentication->refreshToken($this->companyDomain);

				// Retry the request with the new token
				$options = $this->authentication->addAuthToRequest($options);
				$response = $this->httpClient->request($method, $url, $options);

				$this->logger->debug('Received response after token refresh', [
					'request_id' => $requestId,
					'status_code' => $response['statusCode']
				]);
			}

			return $response['body'];
		} catch (ConnectException $e) {
			$this->logger->error('Connection error when sending request to BambooHR API', [
				'request_id' => $requestId,
				'exception' => $e->getMessage(),
				'method' => $method,
				'url' => $url
			]);

			throw new BambooHRException(
				'Connection error when sending request to BambooHR API: ' . $e->getMessage(),
				$e->getCode(),
				$e
			);
		} catch (RequestException $e) {
			$this->logger->error('Request error when sending request to BambooHR API', [
				'request_id' => $requestId,
				'exception' => $e->getMessage(),
				'method' => $method,
				'url' => $url
			]);

			throw new BambooHRException(
				'Request error when sending request to BambooHR API: ' . $e->getMessage(),
				$e->getCode(),
				$e
			);
		} catch (Exception $e) {
			$this->logger->error('Error sending request to BambooHR API', [
				'request_id' => $requestId,
				'exception' => $e->getMessage(),
				'exception_class' => get_class($e),
				'method' => $method,
				'url' => $url
			]);

			throw new BambooHRException(
				'Error sending request to BambooHR API: ' . $e->getMessage(),
				$e->getCode(),
				$e
			);
		}
	}

	/**
	 * Get the employee resource.
	 *
	 * @return EmployeeResource
	 */
	public function employees(): Resources\EmployeeResource {
		if ($this->employeeResource === null) {
			$this->employeeResource = new Resources\EmployeeResource($this);
		}

		return $this->employeeResource;
	}

	/**
	 * Get the directory resource.
	 *
	 * @return Resources\DirectoryResource
	 */
	public function directory(): Resources\DirectoryResource {
		if ($this->directoryResource === null) {
			$this->directoryResource = new Resources\DirectoryResource($this);
		}

		return $this->directoryResource;
	}

	/**
	 * Get the reports resource.
	 *
	 * @return Resources\ReportResource
	 */
	public function reports(): Resources\ReportResource {
		if ($this->reportResource === null) {
			$this->reportResource = new Resources\ReportResource($this);
		}

		return $this->reportResource;
	}

	/**
	 * Get the metadata resource.
	 *
	 * @return Resources\MetadataResource
	 */
	public function metadata(): Resources\MetadataResource {
		if ($this->metadataResource === null) {
			$this->metadataResource = new Resources\MetadataResource($this);
		}

		return $this->metadataResource;
	}

	/**
	 * Get the time off resource.
	 *
	 * @return Resources\TimeOffResource
	 */
	public function timeOff(): Resources\TimeOffResource {
		if ($this->timeOffResource === null) {
			$this->timeOffResource = new Resources\TimeOffResource($this);
		}

		return $this->timeOffResource;
	}

	/**
	 * Get the HTTP client.
	 *
	 * @return HttpClientInterface
	 */
	public function getHttpClient(): HttpClientInterface {
		return $this->httpClient;
	}

	/**
	 * Get the authentication instance.
	 *
	 * @return OAuthAuthentication
	 */
	public function getAuthentication(): OAuthAuthentication {
		return $this->authentication;
	}

	/**
	 * Get the logger instance.
	 *
	 * @return LoggerInterface
	 */
	public function getLogger(): LoggerInterface {
		return $this->logger;
	}

	/**
	 * Get the base URL for API requests.
	 *
	 * @param string $endpoint
	 *
	 * @return string
	 */
	private function getApiUrl(string $endpoint): string {
		return 'https://api.' . $this->baseDomain .
			'/api/gateway.php/' .
			$this->companyDomain . '/' .
			$this->apiVersion . '/' .
			ltrim($endpoint, '/');
	}

	/**
	 * Refresh the authentication token if it's about to expire.
	 *
	 * @return void
	 * @throws AuthenticationException If token refresh fails
	 */
	private function refreshTokenIfNeeded(): void {
		// Only proceed if we have authentication and can refresh the token
		if (!$this->authentication->canRefreshToken()) {
			return;
		}

		// Check if token is about to expire (within 5 minutes)
		if ($this->authentication->isTokenExpiringSoon(300)) {
			$this->logger->info('Token is about to expire, refreshing proactively');
			$this->authentication->refreshToken($this->companyDomain);
		}
	}

	/**
	 * Redact sensitive data from request options for logging.
	 *
	 * @param array $options Request options
	 *
	 * @return array Redacted options
	 */
	private function redactSensitiveData(array $options): array {
		$redacted = $options;

		// Redact authorization headers
		if (isset($redacted['headers'])) {
			foreach (array_keys($redacted['headers']) as $key) {
				if (strtolower($key) === 'authorization') {
					$redacted['headers'][$key] = '[REDACTED]';
				}
			}
		}

		// Redact sensitive fields in JSON payloads
		if (isset($redacted['json'])) {
			$sensitiveFields = ['password', 'token', 'secret', 'key', 'authorization', 'auth'];
			foreach ($sensitiveFields as $field) {
				if (isset($redacted['json'][$field])) {
					$redacted['json'][$field] = '[REDACTED]';
				}
			}
		}

		return $redacted;
	}
}
