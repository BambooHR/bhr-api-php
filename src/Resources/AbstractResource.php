<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\BambooHRClient;

/**
 * Base class for all API resource implementations.
 */
abstract class AbstractResource {
	/**
	 * Safely converts an API response to a model object.
	 * Handles cases where the API returns a string instead of an array.
	 *
	 * @template T
	 * @param array|string $response API response
	 * @param class-string<T> $modelClass Model class name
	 * @param object|null $fallbackObject Object to return if response is not an array
	 * @return T Model object
	 */
	protected function safelyConvertResponseToModel(array|string $response, string $modelClass, ?object $fallbackObject = null): object {
		if (!is_array($response)) {
			if ($fallbackObject !== null) {
				return $fallbackObject;
			}
			
			// Create a new instance of the model class if no fallback provided
			return new $modelClass();
		}
		
		return $modelClass::fromArray($response);
	}

	protected BambooHRClient $client;

	/**
	 * @param BambooHRClient $client BambooHR API client
	 */
	public function __construct(BambooHRClient $client) {
		$this->client = $client;
	}

	/**
	 * Send a GET request to the API.
	 *
	 * @param string $endpoint API endpoint
	 * @param array  $options  Request options
	 * @return array|string Response data
	 * @throws \BambooHR\SDK\Exception\BambooHRException If the request fails
	 * @throws \BambooHR\SDK\Exception\AuthenticationException If authentication fails
	 * @throws \BambooHR\SDK\Exception\RateLimitException If rate limit is exceeded
	 * @throws \BambooHR\SDK\Exception\NotFoundException If resource is not found
	 */
	protected function get(string $endpoint, array $options = []): array|string {
		return $this->client->request('GET', $endpoint, $options);
	}

	/**
	 * Send a POST request to the API.
	 *
	 * @param string $endpoint API endpoint
	 * @param array  $data     Request data
	 * @param array  $options  Additional request options
	 * @return array|string Response data
	 * @throws \BambooHR\SDK\Exception\BambooHRException If the request fails
	 * @throws \BambooHR\SDK\Exception\AuthenticationException If authentication fails
	 * @throws \BambooHR\SDK\Exception\RateLimitException If rate limit is exceeded
	 * @throws \BambooHR\SDK\Exception\NotFoundException If resource is not found
	 */
	protected function post(string $endpoint, array $data = [], array $options = []): array|string {
		$options['json'] = $data;
		return $this->client->request('POST', $endpoint, $options);
	}

	/**
	 * Send a PUT request to the API.
	 *
	 * @param string $endpoint API endpoint
	 * @param array  $data     Request data
	 * @param array  $options  Additional request options
	 * @return array|string Response data
	 * @throws \BambooHR\SDK\Exception\BambooHRException If the request fails
	 * @throws \BambooHR\SDK\Exception\AuthenticationException If authentication fails
	 * @throws \BambooHR\SDK\Exception\RateLimitException If rate limit is exceeded
	 * @throws \BambooHR\SDK\Exception\NotFoundException If resource is not found
	 */
	protected function put(string $endpoint, array $data = [], array $options = []): array|string {
		$options['json'] = $data;
		return $this->client->request('PUT', $endpoint, $options);
	}

	/**
	 * Send a DELETE request to the API.
	 *
	 * @param string $endpoint API endpoint
	 * @param array  $options  Request options
	 * @return array|string Response data
	 * @throws \BambooHR\SDK\Exception\BambooHRException If the request fails
	 * @throws \BambooHR\SDK\Exception\AuthenticationException If authentication fails
	 * @throws \BambooHR\SDK\Exception\RateLimitException If rate limit is exceeded
	 * @throws \BambooHR\SDK\Exception\NotFoundException If resource is not found
	 */
	protected function delete(string $endpoint, array $options = []): array|string {
		return $this->client->request('DELETE', $endpoint, $options);
	}

	/**
	 * Validate that required parameters are present.
	 *
	 * @param array $params   Parameters to validate
	 * @param array $required Required parameter keys
	 * @throws \InvalidArgumentException If any required parameters are missing
	 */
	protected function validateRequiredParams(array $params, array $required): void {
		$missing = [];

		foreach ($required as $param) {
			if (!isset($params[$param]) || (is_string($params[$param]) && trim($params[$param]) === '')) {
				$missing[] = $param;
			}
		}

		if (!empty($missing)) {
			throw new \InvalidArgumentException(
				'Missing required parameters: ' . implode(', ', $missing)
			);
		}
	}
}
