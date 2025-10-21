<?php

namespace BhrSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use BhrSdk\ApiException;
use BhrSdk\Configuration;
use BhrSdk\HeaderSelector;
use BhrSdk\ObjectSerializer;
use BhrSdk\Client\Logger\LoggerInterface;
use BhrSdk\ApiHelper;
use BhrSdk\ApiErrorHelper;

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
		$options = $this->createHttpClientOption();
		$response = $this->sendRequestWithRetries($request, $options);
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

		return $this->sendRequestWithRetriesAsync($request, $this->createHttpClientOption())
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

	/**
	 * Create http client option
	 *
	 * @throws \RuntimeException on file opening failure
	 * @return array of http client options
	 */
	protected function createHttpClientOption() {
		$options = [];
		if ($this->config->getDebug()) {
			$options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
			if (!$options[RequestOptions::DEBUG]) {
				throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
			}
		}

		return $options;
	}
	
	/**
	 * Send a request with support for timeout retries
	 *
	 * @param RequestInterface $request The request to send
	 * @param array $options Request options to apply to the given request
	 *
	 * @throws ApiException on non-2xx response
	 * @return ResponseInterface
	 */
	protected function sendRequestWithRetries(RequestInterface $request, array $options): ResponseInterface {
		// Get the configured number of retries for timeout errors
		$retries = $this->config->getRetries();
		$attempt = 0;
		$timeoutStatusCodes = $this->config->getRetryableStatusCodes();
		
		do {
			$attempt++;
			try {
				$response = $this->client->send($request, $options);
				// If we get here, the request was successful, so break out of the retry loop
				return $response;
			} catch (RequestException $e) {
				$statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 0;

				// Check if this is a timeout error and if we should retry
				if (in_array($statusCode, $timeoutStatusCodes) && $attempt <= $retries) {
					// Wait before retrying (simple exponential backoff)
					usleep(100000 * pow(2, $attempt - 1)); // 100ms, 200ms, 400ms, etc.
					continue;
				}

				$exception = ApiErrorHelper::createException(
					(int)$e->getCode(),
					$e->getMessage(),
					$statusCode,
					$e->getResponse() ? $e->getResponse()->getHeaders() : [],
					$e->getResponse() ? (string)$e->getResponse()->getBody() : null
				);

				throw $exception;
			} catch (ConnectException $e) {
				// Connection exceptions can also be timeout-related
				if ($attempt <= $retries) {
					// Wait before retrying (simple exponential backoff)
					usleep(100000 * pow(2, $attempt - 1)); // 100ms, 200ms, 400ms, etc.
					continue;
				}
				
				$eInner = new ApiException(
					"[{$e->getCode()}] {$e->getMessage()}",
					(int) $e->getCode(),
					null,
					null
				);
				// Pass null instead of headers to avoid type mismatch
				$data = ObjectSerializer::deserialize($eInner->getResponseBody(), 'mixed', null);
				$eInner->setResponseObject($data);

				throw $eInner;
			}
		} while ($attempt <= $retries);
		
		throw new ApiException(
			'Request failed after maximum retries',
			0,
			null,
			null
		);
	}

	/**
	 * Send an asynchronous request with support for timeout retries
	 *
	 * @param RequestInterface $request The request to send
	 * @param array $options Request options to apply to the given request
	 *
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	protected function sendRequestWithRetriesAsync(RequestInterface $request, array $options): \GuzzleHttp\Promise\PromiseInterface {
		// Get the configured number of retries for timeout errors
		$retries = $this->config->getRetries();
		$timeoutStatusCodes = $this->config->getRetryableStatusCodes();
		$attempt = 0;
		
		$doRequest = function () use ($request, $options, &$attempt, $retries, $timeoutStatusCodes, &$doRequest) {
			$attempt++;
			
			return $this->client->sendAsync($request, $options)
				->otherwise(function ($reason) use ($attempt, $retries, $timeoutStatusCodes, $doRequest) {
					// Check if this is a RequestException with a response
					if ($reason instanceof RequestException && $reason->hasResponse()) {
						$statusCode = $reason->getResponse() ? $reason->getResponse()->getStatusCode() : 0;

						// Check if this is a timeout error and if we should retry
						if (in_array($statusCode, $timeoutStatusCodes) && $attempt <= $retries) {
							// Calculate delay with exponential backoff (similar to the sync version)
							$options['delay'] = 100 * pow(2, $attempt - 1); // 100ms, 200ms, 400ms, etc.

							return $doRequest(); // Try again with delay
						}
					}
					
					// For ConnectException (timeout-related)
					if ($reason instanceof ConnectException && $attempt <= $retries) {
						// Calculate delay with exponential backoff (similar to the sync version)
						$options['delay'] = 100 * pow(2, $attempt - 1); // 100ms, 200ms, 400ms, etc.

						return $doRequest(); // Try again with delay
					}
					
					// If we can't retry or have exceeded retries, create a proper ApiException
					if ($reason instanceof RequestException) {
						$eInner = new ApiException(
							"[{$reason->getCode()}] {$reason->getMessage()}",
							(int) $reason->getCode(),
							$reason->getResponse() ? $reason->getResponse()->getHeaders() : null,
							$reason->getResponse() ? (string) $reason->getResponse()->getBody() : null
						);
						$data = ObjectSerializer::deserialize($eInner->getResponseBody(), 'mixed', $eInner->getResponseHeaders());
						$eInner->setResponseObject($data);
						return \GuzzleHttp\Promise\Create::rejectionFor($eInner);
					} elseif ($reason instanceof ConnectException) {
						$eInner = new ApiException(
							"[{$reason->getCode()}] {$reason->getMessage()}",
							(int) $reason->getCode(),
							null,
							null
						);
						// Pass null instead of headers to avoid type mismatch
						$data = ObjectSerializer::deserialize($eInner->getResponseBody(), 'mixed', null);
						$eInner->setResponseObject($data);
						return \GuzzleHttp\Promise\Create::rejectionFor($eInner);
					} else {
						// For any other type of exception, just reject with the original reason
						return \GuzzleHttp\Promise\Create::rejectionFor($reason);
					}
				});
		};
		
		return $doRequest();
	}
}
