<?php
/**
 * ApiClient
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client;

use BhrSdk\Configuration;
use BhrSdk\Client\Logger\LoggerInterface;
use BhrSdk\Client\Logger\SecureLogger;
use BhrSdk\HeaderSelector;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * ApiClient provides a fluent interface for configuring and using the BambooHR SDK
 *
 * This class wraps the auto-generated SDK classes to provide a cleaner, more
 * intuitive interface for authentication and configuration.
 *
 * @category Class
 * @package  BhrSdk\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class ApiClient {
	private Configuration $config;
	private ?ClientInterface $httpClient = null;
	private ?AuthBuilder $authBuilder = null;
	private ?LoggerInterface $logger = null;
	private ?HeaderSelector $headerSelector = null;
	private int $hostIndex = 0;

	/**
	 * Constructor
	 *
	 * @param AuthBuilder|null     $authBuilder Optional authentication builder
	 * @param LoggerInterface|null $logger Optional logger instance
	 */
	public function __construct(
		?AuthBuilder $authBuilder = null,
		?LoggerInterface $logger = null
	) {
		$this->config = new Configuration();
		$this->authBuilder = $authBuilder;
		$this->logger = $logger;
	}

	/**
	 * Configure authentication using an API key (recommended)
	 *
	 * @param string $apiKey Your BambooHR API key
	 * @return self
	 */
	public function withApiKey(string $apiKey): self {
		if ($this->authBuilder === null) {
			$this->authBuilder = new AuthBuilder();
		}
		$this->authBuilder->withApiKey($apiKey);

		$this->log('debug', 'Configured API key authentication');

		return $this;
	}

	/**
	 * Configure authentication using OAuth token
	 *
	 * @param string $token Your OAuth access token
	 * @return self
	 */
	public function withOAuth(string $token): self {
		if ($this->authBuilder === null) {
			$this->authBuilder = new AuthBuilder();
		}
		$this->authBuilder->withOAuth($token);

		$this->log('debug', 'Configured OAuth authentication');

		return $this;
	}

	/**
	 * Set the company subdomain
	 *
	 * @param string $domain Your company's BambooHR subdomain (e.g., 'acme' for acme.bamboohr.com)
	 * @return self
	 */
	public function forCompany(string $domain): self {
		$this->config->setHost("https://{$domain}.bamboohr.com");

		$this->log('debug', 'Set company domain', ['domain' => $domain]);

		return $this;
	}

	/**
	 * Set a custom host URL
	 *
	 * @param string $host Full host URL (e.g., 'https://custom.bamboohr.com')
	 * @return self
	 */
	public function withHost(string $host): self {
		$this->config->setHost($host);
		return $this;
	}

	/**
	 * Configure the number of retries for failed requests
	 *
	 * @param int $retries Number of retries (0-5)
	 * @return self
	 */
	public function withRetries(int $retries): self {
		$this->config->setRetries($retries);
		return $this;
	}

	/**
	 * Enable debug mode
	 *
	 * @param bool $debug Whether to enable debug mode
	 * @return self
	 */
	public function withDebug(bool $debug = true): self {
		$this->config->setDebug($debug);

		$this->log('debug', 'Debug mode ' . ($debug ? 'enabled' : 'disabled'));

		return $this;
	}

	/**
	 * Set a custom HTTP client
	 *
	 * @param ClientInterface $client Guzzle HTTP client instance
	 * @return self
	 */
	public function withHttpClient(ClientInterface $client): self {
		$this->httpClient = $client;

		$this->log('debug', 'Custom HTTP client configured');

		return $this;
	}

	/**
	 * Set a custom header selector
	 *
	 * @param HeaderSelector $selector Custom header selector instance
	 * @return self
	 */
	public function withHeaderSelector(HeaderSelector $selector): self {
		$this->headerSelector = $selector;

		$this->log('debug', 'Custom header selector configured');

		return $this;
	}

	/**
	 * Set the host index for API calls
	 *
	 * @param int $hostIndex Host index (0-based)
	 * @return self
	 */
	public function withHostIndex(int $hostIndex): self {
		$this->hostIndex = $hostIndex;

		$this->log('debug', 'Host index set', ['hostIndex' => $hostIndex]);

		return $this;
	}

	/**
	 * Enable logging with an optional custom logger
	 *
	 * @param LoggerInterface|null $logger Optional logger instance (defaults to SecureLogger)
	 * @param string               $logLevel Log level (debug, info, warning, error)
	 * @return self
	 */
	public function withLogging(?LoggerInterface $logger = null, string $logLevel = 'info'): self {
		if ($logger === null) {
			$this->logger = new SecureLogger(true, $logLevel);
		} else {
			$this->logger = $logger;
		}

		$this->log('info', 'Logging enabled', ['level' => $logLevel]);

		return $this;
	}

	/**
	 * Finalize configuration and prepare for API usage
	 *
	 * @return self
	 * @throws \InvalidArgumentException if configuration is invalid
	 */
	public function build(): self {
		$this->log('info', 'Building API client configuration');

		// Apply authentication if AuthBuilder was used
		if ($this->authBuilder !== null && $this->authBuilder->isConfigured()) {
			$this->authBuilder->applyTo($this->config);

			// Log sanitized auth info
			$authInfo = $this->getSanitizedAuthInfo();
			$this->log('info', 'Authentication configured', $authInfo);
		}

		$this->validateConfiguration();

		$this->log('info', 'API client built successfully', [
			'host' => $this->config->getHost(),
			'debug' => $this->config->getDebug(),
			'retries' => $this->config->getRetries()
		]);

		return $this;
	}

	/**
	 * Get an instance of a specific API class
	 *
	 * @param string $apiClass Fully qualified API class name (e.g., \BhrSdk\Api\EmployeesApi::class)
	 * @return object Instance of the requested API class
	 * @throws \InvalidArgumentException if the API class doesn't exist
	 */
	public function getApi(string $apiClass): object {
		if (!class_exists($apiClass)) {
			$this->log('error', 'API class not found', ['class' => $apiClass]);
			throw new \InvalidArgumentException("API class '{$apiClass}' does not exist");
		}

		// Create HTTP client if not provided
		if ($this->httpClient === null) {
			$this->httpClient = new Client();
		}

		$this->log('debug', 'Creating API instance', ['class' => $apiClass]);

		// Pass all configuration to API class
		return new $apiClass(
			$this->httpClient,
			$this->config,
			$this->headerSelector,
			$this->hostIndex,
			$this->logger
		);
	}

	/**
	 * Get the underlying Configuration object
	 *
	 * @return Configuration
	 */
	public function getConfiguration(): Configuration {
		return $this->config;
	}

	/**
	 * Convenience method to get EmployeesApi instance
	 *
	 * @return \BhrSdk\Api\EmployeesApi
	 */
	public function employees(): object {
		return $this->getApi(\BhrSdk\Api\EmployeesApi::class);
	}

	/**
	 * Convenience method to get TimeOffApi instance
	 *
	 * @return \BhrSdk\Api\TimeOffApi
	 */
	public function timeOff(): object {
		return $this->getApi(\BhrSdk\Api\TimeOffApi::class);
	}

	/**
	 * Convenience method to get BenefitsApi instance
	 *
	 * @return \BhrSdk\Api\BenefitsApi
	 */
	public function benefits(): object {
		return $this->getApi(\BhrSdk\Api\BenefitsApi::class);
	}

	/**
	 * Convenience method to get ReportsApi instance
	 *
	 * @return \BhrSdk\Api\ReportsApi
	 */
	public function reports(): object {
		return $this->getApi(\BhrSdk\Api\ReportsApi::class);
	}

	/**
	 * Convenience method to get TabularDataApi instance
	 *
	 * @return \BhrSdk\Api\TabularDataApi
	 */
	public function tabularData(): object {
		return $this->getApi(\BhrSdk\Api\TabularDataApi::class);
	}

	/**
	 * Convenience method to get PhotosApi instance
	 *
	 * @return \BhrSdk\Api\PhotosApi
	 */
	public function photos(): object {
		return $this->getApi(\BhrSdk\Api\PhotosApi::class);
	}

	/**
	 * Convenience method to get WebhooksApi instance
	 *
	 * @return \BhrSdk\Api\WebhooksApi
	 */
	public function webhooks(): object {
		return $this->getApi(\BhrSdk\Api\WebhooksApi::class);
	}

	/**
	 * Convenience method to get GoalsApi instance
	 *
	 * @return \BhrSdk\Api\GoalsApi
	 */
	public function goals(): object {
		return $this->getApi(\BhrSdk\Api\GoalsApi::class);
	}

	/**
	 * Convenience method to get TrainingApi instance
	 *
	 * @return \BhrSdk\Api\TrainingApi
	 */
	public function training(): object {
		return $this->getApi(\BhrSdk\Api\TrainingApi::class);
	}

	/**
	 * Convenience method to get TimeTrackingApi instance
	 *
	 * @return \BhrSdk\Api\TimeTrackingApi
	 */
	public function timeTracking(): object {
		return $this->getApi(\BhrSdk\Api\TimeTrackingApi::class);
	}

	/**
	 * Convenience method to get AccountInformationApi instance
	 *
	 * @return \BhrSdk\Api\AccountInformationApi
	 */
	public function accountInformation(): object {
		return $this->getApi(\BhrSdk\Api\AccountInformationApi::class);
	}

	/**
	 * Convenience method to get ApplicantTrackingApi instance
	 *
	 * @return \BhrSdk\Api\ApplicantTrackingApi
	 */
	public function applicantTracking(): object {
		return $this->getApi(\BhrSdk\Api\ApplicantTrackingApi::class);
	}

	/**
	 * Convenience method to get CompanyFilesApi instance
	 *
	 * @return \BhrSdk\Api\CompanyFilesApi
	 */
	public function companyFiles(): object {
		return $this->getApi(\BhrSdk\Api\CompanyFilesApi::class);
	}

	/**
	 * Convenience method to get EmployeeFilesApi instance
	 *
	 * @return \BhrSdk\Api\EmployeeFilesApi
	 */
	public function employeeFiles(): object {
		return $this->getApi(\BhrSdk\Api\EmployeeFilesApi::class);
	}

	/**
	 * Convenience method to get ATSApi instance
	 *
	 * @return \BhrSdk\Api\ATSApi
	 */
	public function ats(): object {
		return $this->getApi(\BhrSdk\Api\ATSApi::class);
	}

	/**
	 * Convenience method to get CustomReportsApi instance
	 *
	 * @return \BhrSdk\Api\CustomReportsApi
	 */
	public function customReports(): object {
		return $this->getApi(\BhrSdk\Api\CustomReportsApi::class);
	}

	/**
	 * Convenience method to get DatasetsApi instance
	 *
	 * @return \BhrSdk\Api\DatasetsApi
	 */
	public function datasets(): object {
		return $this->getApi(\BhrSdk\Api\DatasetsApi::class);
	}

	/**
	 * Convenience method to get HoursApi instance
	 *
	 * @return \BhrSdk\Api\HoursApi
	 */
	public function hours(): object {
		return $this->getApi(\BhrSdk\Api\HoursApi::class);
	}

	/**
	 * Convenience method to get LastChangeInformationApi instance
	 *
	 * @return \BhrSdk\Api\LastChangeInformationApi
	 */
	public function lastChangeInformation(): object {
		return $this->getApi(\BhrSdk\Api\LastChangeInformationApi::class);
	}

	/**
	 * Convenience method to get LoginApi instance
	 *
	 * @return \BhrSdk\Api\LoginApi
	 */
	public function login(): object {
		return $this->getApi(\BhrSdk\Api\LoginApi::class);
	}

	/**
	 * Convenience method to get ManualApi instance
	 *
	 * @return \BhrSdk\Api\ManualApi
	 */
	public function manual(): object {
		return $this->getApi(\BhrSdk\Api\ManualApi::class);
	}

	/**
	 * Get the AuthBuilder instance (if used)
	 *
	 * @return AuthBuilder|null
	 */
	public function getAuthBuilder(): ?AuthBuilder {
		return $this->authBuilder;
	}

	/**
	 * Get sanitized authentication info for logging
	 *
	 * @return array<string, mixed>
	 */
	public function getSanitizedAuthInfo(): array {
		if ($this->authBuilder === null || !$this->authBuilder->isConfigured()) {
			return ['type' => 'none', 'configured' => false];
		}

		return $this->authBuilder->getSanitizedInfo();
	}

	/**
	 * Get the logger instance
	 *
	 * @return LoggerInterface|null
	 */
	public function getLogger(): ?LoggerInterface {
		return $this->logger;
	}

	/**
	 * Internal logging method
	 *
	 * @param string               $level Log level
	 * @param string               $message Log message
	 * @param array<string, mixed> $context Additional context
	 * @return void
	 */
	private function log(string $level, string $message, array $context = []): void {
		if ($this->logger !== null) {
			$this->logger->log($level, $message, $context);
		}
	}

	/**
	 * Validate that required configuration is set
	 *
	 * @return void
	 * @throws \InvalidArgumentException if configuration is invalid
	 */
	private function validateConfiguration(): void {
		// Check that authentication is configured
		$hasApiKey = !empty($this->config->getUsername());
		$hasOAuth = !empty($this->config->getAccessToken());

		if (!$hasApiKey && !$hasOAuth) {
			throw new \InvalidArgumentException(
				'Authentication is required. Use withApiKey() or withOAuth()'
			);
		}

		// Check that host is configured
		$host = $this->config->getHost();
		if (empty($host) || $host === 'https://companySubDomain.bamboohr.com') {
			throw new \InvalidArgumentException(
				'Company domain is required. Use forCompany() to set your company subdomain'
			);
		}
	}
}
