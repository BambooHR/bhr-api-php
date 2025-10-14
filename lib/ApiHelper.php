<?php
/**
 * ApiHelper
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use BhrSdk\ApiErrorHelper;

/**
 * ApiHelper Class Doc Comment
 *
 * @category Class
 * @package  BhrSdk
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class ApiHelper {
	/**
	 * Send a request with support for timeout retries
	 *
	 * @param Client           $client The client to use for sending the request
	 * @param Configuration    $config The configuration to use for sending the request
	 * @param RequestInterface $request The request to send
	 * @param array            $options Request options to apply to the given request
	 *
	 * @throws ApiException on non-2xx response
	 * @return ResponseInterface
	 */
	public static function sendRequestWithRetries(Client $client, Configuration $config, RequestInterface $request, array $options): ResponseInterface {
		// Get the configured number of retries for timeout errors
		$retries = $config->getRetries();
		$attempt = 0;
		$timeoutStatusCodes = $config->getRetryableStatusCodes();

		do {
			$attempt++;
			try {
				$response = $client->send($request, $options);
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
					$e->getResponse() ? $e->getResponse()->getHeaders() : null,
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
				$data = ObjectSerializer::deserialize($eInner->getResponseBody(), '', $eInner->getResponseHeaders());
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
	 * @param Client           $client The client to use for sending the request
	 * @param Configuration    $config The configuration to use for sending the request
	 * @param RequestInterface $request The request to send
	 * @param array            $options Request options to apply to the given request
	 *
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	public static function sendRequestWithRetriesAsync(Client $client, Configuration $config, RequestInterface $request, array $options): \GuzzleHttp\Promise\PromiseInterface {
		// Get the configured number of retries for timeout errors
		$retries = $config->getRetries();
		$timeoutStatusCodes = $config->getRetryableStatusCodes();
		$attempt = 0;

		$doRequest = function () use ($client, $request, $options, &$attempt, $retries, $timeoutStatusCodes, &$doRequest) {
			$attempt++;

			return $client->sendAsync($request, $options)
				->otherwise(function ($reason) use ($request, $options, $attempt, $retries, $timeoutStatusCodes, $doRequest) {
					// Check if this is a RequestException with a response
					if ($reason instanceof RequestException && $reason->hasResponse()) {
						$statusCode = $reason->getResponse()->getStatusCode();

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
						$exception = ApiErrorHelper::createException(
							(int)$reason->getCode(),
							$reason->getMessage(),
							$statusCode,
							$reason->getResponse() ? $reason->getResponse()->getHeaders() : null,
							$reason->getResponse() ? (string)$reason->getResponse()->getBody() : null
						);

						return \GuzzleHttp\Promise\Create::rejectionFor($exception);
					} elseif ($reason instanceof ConnectException) {
						$eInner = new ApiException(
							"[{$reason->getCode()}] {$reason->getMessage()}",
							(int) $reason->getCode(),
							null,
							null
						);
						$data = ObjectSerializer::deserialize($eInner->getResponseBody(), '', $eInner->getResponseHeaders());
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

	/**
	 * Create http client option
	 *
	 * @param Configuration $config The configuration to use for sending the request
	 * @throws \RuntimeException on file opening failure
	 * @return array of http client options
	 */
	public static function createHttpClientOption(Configuration $config) {
		$options = [];
		if ($config->getDebug()) {
			$options[RequestOptions::DEBUG] = fopen($config->getDebugFile(), 'a');
			if (!$options[RequestOptions::DEBUG]) {
				throw new \RuntimeException('Failed to open the debug file: ' . $config->getDebugFile());
			}
		}

		return $options;
	}

	public static function handleResponseWithDataType(
		string $dataType,
		RequestInterface $request,
		ResponseInterface $response
	): array {
		if ($dataType === '\SplFileObject') {
			$content = $response->getBody(); //stream goes to serializer
		} else {
			$content = (string) $response->getBody();
			if ($dataType !== 'string') {
				try {
					$content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
				} catch (\JsonException $exception) {
					throw new ApiException(
						sprintf(
							'Error JSON decoding server response (%s)',
							$request->getUri()
						),
						$response->getStatusCode(),
						$response->getHeaders(),
						$content
					);
				}
			}
		}

		return [
			ObjectSerializer::deserialize($content, $dataType, []),
			$response->getStatusCode(),
			$response->getHeaders()
		];
	}

	public static function responseWithinRangeCode(
		string $rangeCode,
		int $statusCode
	): bool {
		$left = (int) ($rangeCode[0] . '00');
		$right = (int) ($rangeCode[0] . '99');

		return $statusCode >= $left && $statusCode <= $right;
	}

	/**
	* Validates required parameters and throws an exception if any are missing
	*
	* @param array  $params Associative array of parameter name => value pairs
	* @param string $methodName Name of the calling method for error messages
	* @throws \InvalidArgumentException If any required parameter is missing
	*/
	public static function validateRequiredParameters(array $params, string $methodName): void {
		foreach ($params as $paramName => $paramValue) {
			if ($paramValue === null || (is_array($paramValue) && count($paramValue) === 0)) {
				throw new \InvalidArgumentException(
					"Missing the required parameter \${$paramName} when calling {$methodName}"
				);
			}
		}
	}
}
