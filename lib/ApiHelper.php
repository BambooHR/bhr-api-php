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

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use BhrSdk\ApiErrorHelper;
use BhrSdk\Client\Logger\LoggerInterface;

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
	 * @param LoggerInterface  $logger The logger to use for logging
	 * @param ClientInterface  $client The client to use for sending the request
	 * @param Configuration    $config The configuration to use for sending the request
	 * @param RequestInterface $request The request to send
	 * @param array            $options Request options to apply to the given request
	 *
	 * @throws ApiException on non-2xx response
	 * @return ResponseInterface
	 */
	public static function sendRequestWithRetries(?LoggerInterface $logger, ClientInterface $client, Configuration $config, RequestInterface $request, array $options): ResponseInterface {
		// Get the configured number of retries for timeout errors
		$retries = $config->getRetries();
		$attempt = 0;
		$timeoutStatusCodes = $config->getRetryableStatusCodes();

		// Log the request with redacted sensitive information
		$requestData = self::redactSensitiveInfo($request);
		$logger?->info('API Request', [
			'method' => $requestData['method'],
			'uri' => $requestData['uri'],
			'headers' => $requestData['headers'],
			'max_retries' => $retries
		]);

		$startTime = microtime(true);

		do {
			$attempt++;
			$attemptStartTime = microtime(true);

			try {
				$response = $client->send($request, $options);

				// Calculate request duration
				$totalDuration = (microtime(true) - $startTime) * 1000; // Total time in milliseconds
				$attemptDuration = (microtime(true) - $attemptStartTime) * 1000; // This attempt time in milliseconds

				// Log the successful response with redacted sensitive information
				$responseData = self::redactSensitiveInfo($response);
				$logger?->info('API Response', [
					'method' => $requestData['method'],
					'uri' => $requestData['uri'],
					'status_code' => $responseData['status_code'],
					'reason' => $responseData['reason_phrase'],
					'total_duration_ms' => round($totalDuration, 2),
					'attempt_duration_ms' => round($attemptDuration, 2),
					'attempt' => $attempt,
					'headers' => $responseData['headers']
				]);

				// If we get here, the request was successful, so break out of the retry loop
				return $response;
			} catch (RequestException $e) {
				$statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 0;
				$totalDuration = (microtime(true) - $startTime) * 1000; // Total time in milliseconds
				$attemptDuration = (microtime(true) - $attemptStartTime) * 1000; // This attempt time in milliseconds

				// Log the failed response
				$responseData = $e->getResponse() ? self::redactSensitiveInfo($e->getResponse()) : [];
				$logger?->error('API Error Response', [
					'method' => $requestData['method'],
					'uri' => $requestData['uri'],
					'status_code' => $statusCode,
					'reason' => $e->getMessage(),
					'total_duration_ms' => round($totalDuration, 2),
					'attempt_duration_ms' => round($attemptDuration, 2),
					'attempt' => $attempt,
					'headers' => $responseData['headers'] ?? [],
					'will_retry' => in_array($statusCode, $timeoutStatusCodes) && $attempt <= $retries
				]);

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
				$totalDuration = (microtime(true) - $startTime) * 1000; // Total time in milliseconds
				$attemptDuration = (microtime(true) - $attemptStartTime) * 1000; // This attempt time in milliseconds

				// Log the connection exception
				$logger?->error('API Connection Error', [
					'method' => $requestData['method'],
					'uri' => $requestData['uri'],
					'error' => $e->getMessage(),
					'total_duration_ms' => round($totalDuration, 2),
					'attempt_duration_ms' => round($attemptDuration, 2),
					'attempt' => $attempt,
					'will_retry' => $attempt <= $retries
				]);

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

		$logger?->error('API Request Failed', [
			'method' => $requestData['method'],
			'uri' => $requestData['uri'],
			'error' => 'Request failed after maximum retries',
			'attempts' => $attempt,
			'max_retries' => $retries
		]);

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
	 * @param LoggerInterface  $logger The logger to use for logging
	 * @param ClientInterface  $client The client to use for sending the request
	 * @param Configuration    $config The configuration to use for sending the request
	 * @param RequestInterface $request The request to send
	 * @param array            $options Request options to apply to the given request
	 *
	 * @return \GuzzleHttp\Promise\PromiseInterface
	 */
	public static function sendRequestWithRetriesAsync(?LoggerInterface $logger, ClientInterface $client, Configuration $config, RequestInterface $request, array $options): \GuzzleHttp\Promise\PromiseInterface {
		// Get the configured number of retries for timeout errors
		$retries = $config->getRetries();
		$timeoutStatusCodes = $config->getRetryableStatusCodes();
		$attempt = 0;

		// Log the request with redacted sensitive information
		$requestData = self::redactSensitiveInfo($request);
		$logger?->info('API Async Request', [
			'method' => $requestData['method'],
			'uri' => $requestData['uri'],
			'headers' => $requestData['headers'],
			'max_retries' => $retries
		]);

		$startTime = microtime(true);

		$doRequest = function () use ($client, $request, $options, &$attempt, $retries, $timeoutStatusCodes, &$doRequest, $logger, $requestData, $startTime) {
			$attempt++;

			$attemptStartTime = microtime(true);

			$logger?->debug('API Async Attempt', [
				'method' => $requestData['method'],
				'uri' => $requestData['uri'],
				'attempt' => $attempt,
				'max_retries' => $retries
			]);

			return $client->sendAsync($request, $options)
				->then(
					function (ResponseInterface $response) use ($logger, $requestData, $startTime, $attemptStartTime, $attempt) {
						// Calculate request duration
						$totalDuration = (microtime(true) - $startTime) * 1000; // Total time in milliseconds
						$attemptDuration = (microtime(true) - $attemptStartTime) * 1000; // This attempt time in milliseconds

						// Log the successful response with redacted sensitive information
						$responseData = self::redactSensitiveInfo($response);
						$logger?->info('API Async Response', [
							'method' => $requestData['method'],
							'uri' => $requestData['uri'],
							'status_code' => $responseData['status_code'],
							'reason' => $responseData['reason_phrase'],
							'total_duration_ms' => round($totalDuration, 2),
							'attempt_duration_ms' => round($attemptDuration, 2),
							'attempt' => $attempt,
							'headers' => $responseData['headers']
						]);

						return $response;
					},
					function ($reason) use ($attempt, $retries, $timeoutStatusCodes, $doRequest, $logger, $requestData, $startTime, $attemptStartTime) {
						// Calculate duration
						$totalDuration = (microtime(true) - $startTime) * 1000; // Total time in milliseconds
						$attemptDuration = (microtime(true) - $attemptStartTime) * 1000; // This attempt time in milliseconds

						// Check if this is a RequestException with a response
						if ($reason instanceof RequestException && $reason->hasResponse()) {
							$statusCode = $reason->getResponse() ? $reason->getResponse()->getStatusCode() : 0;

							// Log the error response
							$responseData = $reason->getResponse() ? self::redactSensitiveInfo($reason->getResponse()) : [];
							$willRetry = in_array($statusCode, $timeoutStatusCodes) && $attempt <= $retries;

							$logger?->error('API Async Error Response', [
								'method' => $requestData['method'],
								'uri' => $requestData['uri'],
								'status_code' => $statusCode,
								'reason' => $reason->getMessage(),
								'total_duration_ms' => round($totalDuration, 2),
								'attempt_duration_ms' => round($attemptDuration, 2),
								'attempt' => $attempt,
								'headers' => $responseData['headers'] ?? [],
								'will_retry' => $willRetry
							]);

							// Check if this is a timeout error and if we should retry
							if ($willRetry) {
								// Calculate delay with exponential backoff (similar to the sync version)
								$options['delay'] = 100 * pow(2, $attempt - 1); // 100ms, 200ms, 400ms, etc.

								return $doRequest(); // Try again with delay
							}
						}

						// For ConnectException (timeout-related)
						if ($reason instanceof ConnectException) {
							$willRetry = $attempt <= $retries;

							// Log the connection exception
							$logger?->error('API Async Connection Error', [
								'method' => $requestData['method'],
								'uri' => $requestData['uri'],
								'error' => $reason->getMessage(),
								'total_duration_ms' => round($totalDuration, 2),
								'attempt_duration_ms' => round($attemptDuration, 2),
								'attempt' => $attempt,
								'will_retry' => $willRetry
							]);

							if ($willRetry) {
								// Calculate delay with exponential backoff (similar to the sync version)
								$options['delay'] = 100 * pow(2, $attempt - 1); // 100ms, 200ms, 400ms, etc.

								return $doRequest(); // Try again with delay
							}
						}

						// If we can't retry or have exceeded retries, create a proper ApiException
						if ($reason instanceof RequestException) {
							$statusCode = $reason->getResponse() ? $reason->getResponse()->getStatusCode() : 0;
							$exception = ApiErrorHelper::createException(
								(int)$reason->getCode(),
								$reason->getMessage(),
								$statusCode,
								$reason->getResponse() ? $reason->getResponse()->getHeaders() : [],
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
							// Log other types of exceptions
							$logger?->error('API Async Unknown Error', [
								'method' => $requestData['method'],
								'uri' => $requestData['uri'],
								'error' => $reason->getMessage(),
								'total_duration_ms' => round($totalDuration, 2),
								'attempt' => $attempt
							]);

							// For any other type of exception, just reject with the original reason
							return \GuzzleHttp\Promise\Create::rejectionFor($reason);
						}
					}
				);
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

	/**
	 * Redact sensitive information from request/response data for logging
	 *
	 * @param RequestInterface|ResponseInterface $message The request or response to redact
	 * @return array Redacted information safe for logging
	 */
	private static function redactSensitiveInfo($message): array {
		$logData = [];

		// Common data for both request and response
		$logData['headers'] = [];
		foreach ($message->getHeaders() as $name => $values) {
			// Skip sensitive headers
			$sensitiveHeaders = [
				'authorization',
				'cookie',
				'set-cookie',
				'x-api-key',
				'api-key',
				'x-auth-token',
				'x-auth',
				'x-user-id',
				'x-email',
				'x-csrf-token',
				'x-bamboohr-token',
				'x-bamboohr-key'
			];
			if (in_array(strtolower($name), $sensitiveHeaders)) {
				$logData['headers'][$name] = '[REDACTED]';
			} else {
				$logData['headers'][$name] = implode(', ', $values);
			}
		}

		if ($message instanceof RequestInterface) {
			// Request-specific data
			$logData['method'] = $message->getMethod();
			$logData['uri'] = (string)$message->getUri();

			// Redact query parameters and sensitive path segments
			$uri = $message->getUri();
			$path = (string) $uri->getPath();

			// Redact potentially sensitive path segments
			// Look for common patterns like IDs in paths (e.g., /users/12345/profile)
			$sensitivePathPatterns = [
				'~(/users/)[^/]+(/|$)~' => '$1[ID_REDACTED]$2',
				'~(/employees/)[^/]+(/|$)~' => '$1[ID_REDACTED]$2',
				'~(/companies/)[^/]+(/|$)~' => '$1[ID_REDACTED]$2'
			];

			foreach ($sensitivePathPatterns as $pattern => $replacement) {
				$path = preg_replace($pattern, $replacement, (string) $path);
			}

			// Build the redacted URI
			$redactedUri = $uri->getScheme() . '://' . $uri->getAuthority() . $path;
			if ($uri->getQuery()) {
				$redactedUri .= '[QUERY_PARAMS_REDACTED]';
			}

			$logData['uri'] = $redactedUri;

			// Don't log request body
			$logData['body'] = '[REDACTED]';
		} else {
			// Response-specific data
			$logData['status_code'] = $message->getStatusCode();
			$logData['reason_phrase'] = $message->getReasonPhrase();

			// Don't log response body
			$logData['body'] = '[REDACTED]';
		}

		return $logData;
	}
}
