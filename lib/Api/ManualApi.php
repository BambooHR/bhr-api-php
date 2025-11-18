<?php

namespace BhrSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use BhrSdk\ApiException;
use BhrSdk\Configuration;
use BhrSdk\HeaderSelector;
use BhrSdk\ObjectSerializer;
use BhrSdk\Client\Logger\LoggerInterface;
use BhrSdk\ApiHelper;

/**
 * ManualApi Class Doc Comment
 *
 * @category Class
 * @package  BhrSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ManualApi {
	/**
	 * @var ClientInterface
	 */
	protected $client;

	/**
	 * @var Configuration
	 */
	protected $config;

	/**
	 * @var HeaderSelector
	 */
	protected $headerSelector;

	/**
	 * @var int Host index
	 */
	protected $hostIndex;

	/**
	 * @var LoggerInterface|null Logger instance
	 */
	protected $logger;

	/**
	 * @param ClientInterface $client
	 * @param Configuration   $config
	 * @param HeaderSelector  $selector
	 * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
	 * @param LoggerInterface|null $logger (Optional) logger instance for secure logging
	 */
	public function __construct(
		?ClientInterface $client = null,
		?Configuration $config = null,
		?HeaderSelector $selector = null,
		int $hostIndex = 0,
		?LoggerInterface $logger = null
	) {
		$this->client = $client ?: new Client();
		$this->config = $config ?: Configuration::getDefaultConfiguration();
		$this->headerSelector = $selector ?: new HeaderSelector();
		$this->hostIndex = $hostIndex;
		$this->logger = $logger;
	}

	/**
	 * @return Configuration
	 */
	public function getConfig() {
		return $this->config;
	}

	/**
	 * Operation get
	 *
	 * Perform a GET request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \BhrSdk\ApiException on non-2xx response or if the response body is not in the expected format
	 * @throws \InvalidArgumentException
	 * @return mixed 
	 */
	public function get($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false): mixed {
		return $this->performRequest('GET', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation getAsync
	 *
	 * Perform an async GET request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \InvalidArgumentException
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	public function getAsync($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false) {
		return $this->performRequestAsync('GET', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation post
	 *
	 * Perform a POST request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \BhrSdk\ApiException on non-2xx response or if the response body is not in the expected format
	 * @throws \InvalidArgumentException
	 * @return mixed 
	 */
	public function post($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false): mixed {
		return $this->performRequest('POST', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation postAsync
	 *
	 * Perform an async POST request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \InvalidArgumentException
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	public function postAsync($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false) {
		return $this->performRequestAsync('POST', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation put
	 *
	 * Perform a PUT request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \BhrSdk\ApiException on non-2xx response or if the response body is not in the expected format
	 * @throws \InvalidArgumentException
	 * @return mixed 
	 */
	public function put($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false): mixed {
		return $this->performRequest('PUT', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation putAsync
	 *
	 * Perform an async PUT request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \InvalidArgumentException
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	public function putAsync($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false) {
		return $this->performRequestAsync('PUT', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation delete
	 *
	 * Perform a DELETE request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \BhrSdk\ApiException on non-2xx response or if the response body is not in the expected format
	 * @throws \InvalidArgumentException
	 * @return mixed 
	 */
	public function delete($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false): mixed {
		return $this->performRequest('DELETE', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation deleteAsync
	 *
	 * Perform an async DELETE request
	 *
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \InvalidArgumentException
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	public function deleteAsync($resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false) {
		return $this->performRequestAsync('DELETE', $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
	}

	/**
	 * Operation performRequest
	 *
	 * Perform a request
	 *
	 * @param  string $verb the HTTP verb
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \BhrSdk\ApiException on non-2xx response or if the response body is not in the expected format
	 * @throws \InvalidArgumentException
	 * @return mixed 
	 */
	public function performRequest($verb, $resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false): mixed {
		$request = $this->createRequestObject($verb, $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);
		$options = ApiHelper::createHttpClientOption($this->config);
		$response = ApiHelper::sendRequestWithRetries($this->logger, $this->client, $this->config, $request, $options);
		$statusCode = $response->getStatusCode();

		if ($statusCode < 200 || $statusCode > 299) {
			throw new ApiException(
				sprintf(
					'[%d] Error connecting to the API (%s)',
					$statusCode,
					(string) $request->getUri()
				),
				$statusCode,
				$response->getHeaders(),
				(string) $response->getBody()
			);
		}

		return ObjectSerializer::deserialize((string) $response->getBody(), 'mixed', $response->getHeaders());
	}

	/**
	 * Operation performRequestAsync
	 *
	 * Perform an async request
	 *
	 * @param  string $verb the HTTP verb
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \InvalidArgumentException
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	public function performRequestAsync($verb, $resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false) {		
		$request = $this->createRequestObject($verb, $resourcePath, $queryParams, $headerParams, $httpBody, $multipart);

		return ApiHelper::sendRequestWithRetriesAsync($this->logger, $this->client, $this->config, $request, ApiHelper::createHttpClientOption($this->config))
			->then(
				function ($response) use ($request) {
					$statusCode = $response->getStatusCode();

					if ($statusCode < 200 || $statusCode > 299) {
						throw new ApiException(
							sprintf(
								'[%d] Error connecting to the API (%s)',
								$statusCode,
								(string) $request->getUri()
							),
							$statusCode,
							$response->getHeaders(),
							(string) $response->getBody()
						);
					}

					return ObjectSerializer::deserialize((string) $response->getBody(), 'mixed', $response->getHeaders());
				},
				function ($exception) {
					$response = $exception->getResponse();
					$statusCode = $response->getStatusCode();
					throw new ApiException(
						sprintf(
							'[%d] Error connecting to the API (%s)',
							$statusCode,
							$exception->getRequest()->getUri()
						),
						$statusCode,
						$response->getHeaders(),
						(string) $response->getBody()
					);
				}
			);
	}

	/**
	 * Create request object for operation
	 *
	 * @param  string $verb the HTTP verb
	 * @param  string $resourcePath the resource path
	 * @param  array $queryParams query parameters
	 * @param  array $headerParams header parameters
	 * @param  string $httpBody body of the request
	 * @param  bool $multipart if the request is a multipart form
	 *
	 * @throws \InvalidArgumentException
	 * @return \GuzzleHttp\Psr7\Request
	 */
	public function createRequestObject($verb, $resourcePath, $queryParams = [], $headerParams = [], $httpBody = '', $multipart = false) {
		$headers = $this->headerSelector->selectHeaders(
			['application/json'],
			'application/json',
			$multipart
		);
		
		// Basic authentication
		if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
			$headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
		}
		
		// OAuth/Bearer authentication
		if (!empty($this->config->getAccessToken())) {
			$headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
		}

		$defaultHeaders = [];
		if ($this->config->getUserAgent()) {
			$defaultHeaders['User-Agent'] = $this->config->getUserAgent();
		}

		$headers = array_merge(
			$defaultHeaders,
			$headerParams,
			$headers
		);
		
		$operationHost = $this->config->getHost();
		$query = ObjectSerializer::buildQuery($queryParams);

		return new Request(
			$verb,
			$operationHost . $resourcePath . ($query ? "?{$query}" : ''),
			$headers,
			$httpBody
		);
	}
}
