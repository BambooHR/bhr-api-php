<?php

declare(strict_types=1);

namespace BambooHR\SDK;

use BambooHR\SDK\Authentication\OAuthAuthentication;
use BambooHR\SDK\Http\GuzzleHttpClient;
use BambooHR\SDK\Http\HttpClientInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class BambooHRBuilder {
	private string $companyDomain = '';
	private ?OAuthAuthentication $authentication = null;
	private ?HttpClientInterface $httpClient = null;
	private ?LoggerInterface $logger = null;
	private int $timeout = 30;
	private array $options = [];
	private string $apiVersion = 'v1';
	private string $baseDomain = 'bamboohr.com';

	/**
	 * Set the company domain for the BambooHR API.
	 *
	 * @param string $companyDomain The company subdomain for BambooHR
	 *
	 * @return self
	 */
	public function withCompanyDomain(string $companyDomain): self {
		$this->companyDomain = $companyDomain;

		return $this;
	}

	/**
	 * Configure OAuth authentication.
	 *
	 * @param string      $clientId     OAuth client ID
	 * @param string      $clientSecret OAuth client secret
	 * @param string|null $accessToken  Optional existing access token
	 * @param string|null $refreshToken Optional refresh token
	 * @param int|null    $expiresAt    Optional expiration timestamp
	 *
	 * @return self
	 */
	public function withOAuth(
		string  $clientId,
		string  $clientSecret,
		?string $accessToken = null,
		?string $refreshToken = null,
		?int    $expiresAt = null
	): self {
		$this->authentication = new OAuthAuthentication($clientId, $clientSecret, $this->baseDomain);
		$this->options['client_id'] = $clientId;
		$this->options['client_secret'] = $clientSecret;

		// If an access token was provided, set it
		if ($accessToken !== null) {
			$this->authentication->setTokens($accessToken, $refreshToken, $expiresAt);
		}

		return $this;
	}

	/**
	 * Set a custom HTTP client.
	 *
	 * @param HttpClientInterface $httpClient HTTP client implementation
	 *
	 * @return self
	 */
	public function withHttpClient(HttpClientInterface $httpClient): self {
		$this->httpClient = $httpClient;

		return $this;
	}

	/**
	 * Set a logger for the SDK.
	 *
	 * @param LoggerInterface $logger PSR-3 compatible logger
	 *
	 * @return self
	 */
	public function withLogger(LoggerInterface $logger): self {
		$this->logger = $logger;

		return $this;
	}

	/**
	 * Set request timeout in seconds.
	 *
	 * @param int $timeout Timeout in seconds
	 *
	 * @return self
	 */
	public function withTimeout(int $timeout): self {
		$this->timeout = $timeout;

		return $this;
	}

	/**
	 * Set additional options for the client.
	 *
	 * @param array $options Additional client options
	 *
	 * @return self
	 */
	public function withOptions(array $options): self {
		$this->options = array_merge($this->options, $options);

		return $this;
	}

	/**
	 * Set the API version.
	 *
	 * @param string $apiVersion API version (default: v1)
	 *
	 * @return self
	 */
	public function withApiVersion(string $apiVersion): self {
		$this->apiVersion = $apiVersion;

		return $this;
	}

	/**
	 * Set the base domain for all BambooHR URLs.
	 *
	 * @param string $baseDomain The base domain for all BambooHR URLs (default: bamboohr.com)
	 *
	 * @return self
	 */
	public function withBaseDomain(string $baseDomain): self {
		$this->baseDomain = $baseDomain;

		return $this;
	}

	/**
	 * Build and return a configured BambooHR client.
	 *
	 * @return BambooHRClient
	 * @throws \InvalidArgumentException If required configuration is missing
	 */
	public function build(): BambooHRClient {
		if (empty($this->companyDomain)) {
			throw new \InvalidArgumentException('Company domain is required');
		}

		if ($this->authentication === null) {
			throw new \InvalidArgumentException('Authentication method is required');
		}

		if ($this->httpClient === null) {
			$this->httpClient = new GuzzleHttpClient([
				'timeout' => $this->timeout
			]);
		}

		if ($this->logger === null) {
			$this->logger = new NullLogger();
		}

		return new BambooHRClient(
			$this->companyDomain,
			$this->authentication,
			$this->httpClient,
			$this->logger,
			$this->apiVersion,
			$this->baseDomain
		);
	}
}
