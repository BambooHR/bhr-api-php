<?php

declare(strict_types=1);

namespace BambooHR\SDK\Http;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Exception\RateLimitException;
use BambooHR\SDK\Exception\AuthenticationException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\TooManyRedirectsException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class GuzzleHttpClient implements HttpClientInterface {

	private Client $client;
	private array $rateLimitConfig;

	/**
	 * @param array $config          Guzzle client configuration
	 * @param array $rateLimitConfig Rate limit configuration
	 */
	public function __construct(array $config = [], array $rateLimitConfig = []) {
		// Set up rate limit configuration with defaults
		$this->rateLimitConfig = array_merge([
			'enabled' => true,
			'max_retries' => 3,
			'initial_delay' => 1, // seconds
			'backoff_factor' => 2,
			'max_delay' => 30 // seconds
		], $rateLimitConfig);

		// Create a handler stack with retry middleware for rate limiting
		$handlerStack = HandlerStack::create();

		if ($this->rateLimitConfig['enabled']) {
			$handlerStack->push($this->createRetryMiddleware());
		}

		// Create the Guzzle client with our configuration
		$this->client = new Client(array_merge([
			'http_errors' => false,
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'User-Agent' => 'BambooHR-PHP-SDK/2.0'
			],
			'handler' => $handlerStack
		], $config));
	}

	/**
	 * Get the retry configuration for testing purposes.
	 *
	 * @return array Retry configuration
	 */
	public function getRetryConfig(): array {
		return $this->rateLimitConfig;
	}

	/**
	 * Create a retry middleware for handling rate limits and transient errors.
	 *
	 * @return callable Middleware function
	 */
	private function createRetryMiddleware(): callable {
		return Middleware::retry(
			// Retry decision function
			function (
				$retries,
				RequestInterface $request,
				?ResponseInterface $response = null,
				?\Exception $exception = null
			) {
				// We need to use the $request parameter to avoid PHPMD warnings
				// but we don't actually need to do anything with it for retry logic
				// This line ensures the parameter is considered used
				$request->getMethod();
				// Don't retry if we've reached the maximum retries
				if ($retries >= $this->rateLimitConfig['max_retries']) {
					return false;
				}

				// Retry on server errors (5xx)
				if ($response && $response->getStatusCode() >= 500) {
					return true;
				}

				// Retry on connection exceptions (network issues)
				if ($exception instanceof ConnectException) {
					return true;
				}

				return false;
			},
			// Delay calculation function
			function ($retries) {
				// Calculate exponential backoff with jitter
				$backoffFactor = $this->rateLimitConfig['backoff_factor'];
				$delay = $this->rateLimitConfig['initial_delay'] * pow($backoffFactor, $retries - 1);
				$jitter = $delay * 0.2 * (mt_rand(0, 1000) / 1000); // Add up to 20% jitter
				$delay = min($delay + $jitter, $this->rateLimitConfig['max_delay']);

				return $delay; // Delay is already in seconds
			}
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function request(string $method, string $url, array $options = []): array {
		try {
			// Set http_errors to true to allow retry middleware to work
			$options['http_errors'] = true;
			
			$response = $this->client->request($method, $url, $options);

			return $this->parseResponse($response);
		} catch (ServerException $e) {
			// Let retry middleware handle server errors
			throw new BambooHRException(
				'Server error: ' . $this->getErrorMessage($e->getResponse()),
				$e->getCode(),
				$e
			);
		} catch (ClientException $e) {
			$response = $e->getResponse();
			$statusCode = $response->getStatusCode();

			if ($statusCode === 404) {
				throw new NotFoundException('Resource not found', 404, $e);
			}

			if ($statusCode === 429) {
				throw new RateLimitException(
					'Rate limit exceeded: ' . $this->getErrorMessage($response),
					429,
					$e
				);
			}

			if ($statusCode === 401 || $statusCode === 403) {
				throw new AuthenticationException(
					'Authentication error: ' . $this->getErrorMessage($response),
					$statusCode,
					$e
				);
			}

			$errorMessage = $this->getErrorMessage($response);
			throw new BambooHRException($errorMessage, $statusCode, $e);
		} catch (ServerException $e) {
			$response = $e->getResponse();
			$errorMessage = $this->getErrorMessage($response);
			throw new BambooHRException(
				'Server error: ' . $errorMessage,
				$response->getStatusCode(),
				$e
			);
		} catch (ConnectException $e) {
			throw new BambooHRException(
				'Connection error: ' . $e->getMessage(),
				0,
				$e
			);
		} catch (TooManyRedirectsException $e) {
			throw new BambooHRException(
				'Too many redirects: ' . $e->getMessage(),
				0,
				$e
			);
		} catch (RequestException $e) {
			$message = $e->getMessage();
			$code = $e->getCode();

			if ($e->hasResponse()) {
				$response = $e->getResponse();
				$message = $this->getErrorMessage($response);
				$code = $response->getStatusCode();
			}

			throw new BambooHRException('Request error: ' . $message, $code, $e);
		} catch (GuzzleException $e) {
			throw new BambooHRException('HTTP request failed: ' . $e->getMessage(), 0, $e);
		}
	}

	/**
	 * Parse the HTTP response.
	 *
	 * @param ResponseInterface $response
	 * @return array
	 * @throws BambooHRException If the response contains an error
	 * @throws AuthenticationException If the response indicates an authentication error
	 * @throws RateLimitException If the response indicates a rate limit error
	 * @throws NotFoundException If the response indicates a not found error
	 */
	private function parseResponse(ResponseInterface $response): array {
		$statusCode = $response->getStatusCode();
		$headers = $response->getHeaders();
		$body = (string) $response->getBody();

		// Handle specific status codes
		if ($statusCode === 429) {
			$retryAfter = $response->getHeaderLine('Retry-After');
			$message = 'Rate limit exceeded';
			if ($retryAfter) {
				$message .= '. Retry after ' . $retryAfter . ' seconds';
			}
			throw new RateLimitException($message, 429);
		}

		if ($statusCode === 404) {
			throw new NotFoundException('Resource not found', 404);
		}

		if ($statusCode === 401 || $statusCode === 403) {
			throw new AuthenticationException(
				'Authentication error: ' . $this->getErrorMessage($response),
				$statusCode
			);
		}

		// Try to parse JSON response
		if (strpos($response->getHeaderLine('Content-Type'), 'application/json') !== false) {
			$decodedBody = json_decode($body, true);

			// Check if JSON parsing was successful
			if (json_last_error() === JSON_ERROR_NONE) {
				$body = $decodedBody;

				// Check for error response
				if ($statusCode >= 400 && isset($body['error'])) {
					throw new BambooHRException(
						$body['error_description'] ?? $body['error'],
						$statusCode
					);
				}
			}
		}

		// Check for general error responses
		if ($statusCode >= 400) {
			throw new BambooHRException(
				$this->getErrorMessage($response),
				$statusCode
			);
		}

		return [
			'statusCode' => $statusCode,
			'headers' => $headers,
			'body' => $body
		];
	}

	/**
	 * Extract error message from response.
	 *
	 * @param ResponseInterface $response
	 * @return string
	 */
	private function getErrorMessage(ResponseInterface $response): string {
		$statusCode = $response->getStatusCode();
		$message = 'HTTP request failed with status code ' . $statusCode;

		// Check for BambooHR error message header
		if ($response->hasHeader('X-BambooHR-Error-Message')) {
			$message .= ': ' . $response->getHeaderLine('X-BambooHR-Error-Message');
			return $message;
		}

		// Check for rate limit information
		if ($statusCode === 429 && $response->hasHeader('Retry-After')) {
			$retryAfter = $response->getHeaderLine('Retry-After');
			$message .= ': Rate limit exceeded. Retry after ' . $retryAfter . ' seconds';
			return $message;
		}

		// Try to parse error from response body
		$body = (string) $response->getBody();
		if (!empty($body)) {
			$contentType = $response->getHeaderLine('Content-Type');

			if (strpos($contentType, 'application/json') !== false) {
				$data = json_decode($body, true);
				if (json_last_error() === JSON_ERROR_NONE) {
					if (isset($data['error_description'])) {
						$message .= ': ' . $data['error_description'];
					} elseif (isset($data['error'])) {
						$message .= ': ' . $data['error'];
					} elseif (isset($data['message'])) {
						$message .= ': ' . $data['message'];
					} elseif (isset($data['detail'])) {
						$message .= ': ' . $data['detail'];
					}
				}
			} else {
				// Truncate body if it's too long
				if (strlen($body) > 200) {
					$body = substr($body, 0, 197) . '...';
				}
				$message .= ': ' . $body;
			}
		}

		return $message;
	}
}
