<?php

namespace BhrSdk\Test\Client\Auth;

use BhrSdk\Client\Auth\BambooHRTokenRefreshProvider;
use BhrSdk\Client\Auth\TokenResponse;
use BhrSdk\ApiException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * BambooHRTokenRefreshProviderTest
 *
 * @category Class
 * @package  BhrSdk\Test\Client\Auth
 * @author   BambooHR
 */
class BambooHRTokenRefreshProviderTest extends TestCase {
	/**
	 * Test successful token refresh
	 */
	public function testSuccessfulTokenRefresh(): void {
		$mockClient = $this->createMockHttpClient(200, [
			'access_token' => 'new_access_token',
			'refresh_token' => 'new_refresh_token',
			'expires_in' => 3600,
			'token_type' => 'Bearer'
		]);

		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			apiHost: 'https://example.bamboohr.com',
			httpClient: $mockClient
		);

		$tokenResponse = $provider->refreshToken('old_refresh_token');

		$this->assertInstanceOf(TokenResponse::class, $tokenResponse);
		$this->assertEquals('new_access_token', $tokenResponse->accessToken);
		$this->assertEquals('new_refresh_token', $tokenResponse->refreshToken);
		$this->assertEquals(3600, $tokenResponse->expiresIn);
	}

	/**
	 * Test token refresh without new refresh token (no rotation)
	 */
	public function testTokenRefreshWithoutNewRefreshToken(): void {
		$mockClient = $this->createMockHttpClient(200, [
			'access_token' => 'new_access_token',
			'expires_in' => 3600,
			'token_type' => 'Bearer'
			// No refresh_token in response
		]);

		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			httpClient: $mockClient
		);

		$tokenResponse = $provider->refreshToken('old_refresh_token');

		$this->assertEquals('new_access_token', $tokenResponse->accessToken);
		$this->assertNull($tokenResponse->refreshToken);
		$this->assertEquals(3600, $tokenResponse->expiresIn);
	}

	/**
	 * Test token refresh without expires_in
	 */
	public function testTokenRefreshWithoutExpiresIn(): void {
		$mockClient = $this->createMockHttpClient(200, [
			'access_token' => 'new_access_token',
			'refresh_token' => 'new_refresh_token',
			'token_type' => 'Bearer'
			// No expires_in
		]);

		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			httpClient: $mockClient
		);

		$tokenResponse = $provider->refreshToken('old_refresh_token');

		$this->assertEquals('new_access_token', $tokenResponse->accessToken);
		$this->assertNull($tokenResponse->expiresIn);
	}

	/**
	 * Test token refresh with HTTP error status
	 */
	public function testTokenRefreshWithHttpError(): void {
		$this->expectException(ApiException::class);
		$this->expectExceptionMessage('Token refresh failed with status 400');

		$mockClient = $this->createMockHttpClient(400, [
			'error' => 'invalid_grant',
			'error_description' => 'Invalid refresh token'
		]);

		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			httpClient: $mockClient
		);

		$provider->refreshToken('invalid_refresh_token');
	}

	/**
	 * Test token refresh with invalid JSON response
	 */
	public function testTokenRefreshWithInvalidJson(): void {
		$this->expectException(ApiException::class);
		$this->expectExceptionMessage('Invalid JSON response');

		$mockResponse = $this->createMock(ResponseInterface::class);
		$mockResponse->method('getStatusCode')->willReturn(200);
		$mockResponse->method('getHeaders')->willReturn([]);

		$mockBody = $this->createMock(StreamInterface::class);
		$mockBody->method('__toString')->willReturn('invalid json {{{');
		$mockResponse->method('getBody')->willReturn($mockBody);

		/** @var ClientInterface&\PHPUnit\Framework\MockObject\MockObject $mockClient */
		$mockClient = $this->createMock(ClientInterface::class);
		$mockClient->method('request')->willReturn($mockResponse);

		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			httpClient: $mockClient
		);

		$provider->refreshToken('refresh_token');
	}

	/**
	 * Test token refresh with missing access_token in response
	 */
	public function testTokenRefreshWithMissingAccessToken(): void {
		$this->expectException(ApiException::class);
		$this->expectExceptionMessage('Token response missing required access_token field');

		$mockClient = $this->createMockHttpClient(200, [
			'refresh_token' => 'new_refresh_token',
			'expires_in' => 3600
			// Missing access_token
		]);

		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			httpClient: $mockClient
		);

		$provider->refreshToken('refresh_token');
	}

	/**
	 * Test token refresh with Guzzle exception
	 */
	public function testTokenRefreshWithGuzzleException(): void {
		$this->expectException(ApiException::class);
		$this->expectExceptionMessage('Token refresh request failed: Connection timeout');

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $mockRequest */
		$mockRequest = $this->createMock(RequestInterface::class);

		/** @var ClientInterface&\PHPUnit\Framework\MockObject\MockObject $mockClient */
		$mockClient = $this->createMock(ClientInterface::class);
		$mockClient->method('request')->willThrowException(
			new RequestException('Connection timeout', $mockRequest)
		);

		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			httpClient: $mockClient
		);

		$provider->refreshToken('refresh_token');
	}

	/**
	 * Test getting configuration values
	 */
	public function testGetConfigurationValues(): void {
		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret',
			apiHost: 'https://acme.bamboohr.com'
		);

		$this->assertEquals('test_client', $provider->getClientId());
		$this->assertEquals('https://acme.bamboohr.com/token.php?request=token', $provider->getTokenEndpoint());
	}

	/**
	 * Test default token endpoint
	 */
	public function testDefaultTokenEndpoint(): void {
		$provider = new BambooHRTokenRefreshProvider(
			clientId: 'test_client',
			clientSecret: 'test_secret'
		);

		$this->assertEquals('https://example.bamboohr.com/token.php?request=token', $provider->getTokenEndpoint());
	}

	/**
	 * Helper method to create a mock HTTP client with a JSON response
	 *
	 * @param int   $statusCode HTTP status code
	 * @param array $responseData Response data to encode as JSON
	 * @return ClientInterface Mock HTTP client
	 */
	private function createMockHttpClient(int $statusCode, array $responseData): ClientInterface {
		$mockResponse = $this->createMock(ResponseInterface::class);
		$mockResponse->method('getStatusCode')->willReturn($statusCode);
		$mockResponse->method('getHeaders')->willReturn([]);

		$mockBody = $this->createMock(StreamInterface::class);
		$mockBody->method('__toString')->willReturn(json_encode($responseData));
		$mockResponse->method('getBody')->willReturn($mockBody);

		/** @var ClientInterface&\PHPUnit\Framework\MockObject\MockObject $mockClient */
		$mockClient = $this->createMock(ClientInterface::class);
		$mockClient->method('request')->willReturn($mockResponse);

		return $mockClient;
	}
}
