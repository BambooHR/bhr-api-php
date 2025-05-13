<?php

declare(strict_types=1);

namespace BambooHR\SDK\Http;

interface HttpClientInterface {

	/**
	 * Send an HTTP request.
	 *
	 * @param string $method  HTTP method
	 * @param string $url     Request URL
	 * @param array  $options Request options
	 * @return array Response data with keys: statusCode, headers, body
	 * @throws \BambooHR\SDK\Exception\BambooHRException If the request fails
	 * @throws \BambooHR\SDK\Exception\AuthenticationException If authentication fails
	 * @throws \BambooHR\SDK\Exception\RateLimitException If rate limit is exceeded
	 * @throws \BambooHR\SDK\Exception\NotFoundException If resource is not found
	 */
	public function request(string $method, string $url, array $options = []): array;
}
