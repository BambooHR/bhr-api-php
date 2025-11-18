<?php

namespace BhrSdk\Test\Client\Middleware;

use BhrSdk\Client\Middleware\OAuth2Middleware;
use BhrSdk\Client\Auth\TokenManager;
use BhrSdk\Client\Auth\BambooHRTokenRefreshProvider;
use BhrSdk\Client\Auth\TokenResponse;
use BhrSdk\Configuration;
use BhrSdk\Exceptions\AuthenticationFailedException;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * OAuth2MiddlewareTest
 *
 * @category Class
 * @package  BhrSdk\Test\Client\Middleware
 * @author   BambooHR
 */
class OAuth2MiddlewareTest extends TestCase {
	/**
	 * Test middleware passes through when no refresh capability
	 */
	public function testPassThroughWithoutRefreshCapability(): void {
		$tokenManager = new TokenManager('access_token'); // No refresh token

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$config = new Configuration();

		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock(RequestInterface::class);
		$response = $this->createMock(ResponseInterface::class);
		$client = new Client();

		$sendRequest = function ($req, $opts) use ($response) {
			return $response;
		};

		$result = $middleware->handle($sendRequest, $request, $client, []);
		$this->assertSame($response, $result);
	}

	/**
	 * Test proactive token refresh when token needs refresh
	 */
	public function testProactiveRefreshWhenTokenNeedsRefresh(): void {
		// Token that needs refresh (expires in 200 seconds, within buffer)
		$tokenManager = new TokenManager('old_access', 'refresh_token', 200);

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$refreshProvider->expects($this->once())
			->method('refreshToken')
			->with('refresh_token')
			->willReturn(new TokenResponse('new_access', 'new_refresh', 3600));

		$config = new Configuration();
		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock(RequestInterface::class);
		$request->expects($this->once())
			->method('withHeader')
			->with('Authorization', 'Bearer new_access')
			->willReturnSelf();

		$response = $this->createMock(ResponseInterface::class);
		$client = new Client();

		$sendRequest = function ($req, $opts) use ($response) {
			return $response;
		};

		$result = $middleware->handle($sendRequest, $request, $client, []);

		$this->assertSame($response, $result);
		$this->assertEquals('new_access', $tokenManager->getAccessToken());
		$this->assertEquals('new_access', $config->getAccessToken());
	}

	/**
	 * Test reactive refresh on 401 error
	 */
	public function testReactiveRefreshOn401Error(): void {
		$tokenManager = new TokenManager('access_token', 'refresh_token', 3600);

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$refreshProvider->expects($this->once())
			->method('refreshToken')
			->with('refresh_token')
			->willReturn(new TokenResponse('new_access', 'new_refresh', 3600));

		$config = new Configuration();
		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock(RequestInterface::class);
		$request->expects($this->once())
			->method('withHeader')
			->with('Authorization', 'Bearer new_access')
			->willReturnSelf();

		$response = $this->createMock(ResponseInterface::class);
		$client = new Client();

		$callCount = 0;
		$sendRequest = function ($req, $opts) use (&$callCount, $response) {
			$callCount++;
			if ($callCount === 1) {
				// First call returns 401
				throw new AuthenticationFailedException('Authentication failed');
			}
			// Second call (after refresh) succeeds
			return $response;
		};

		$result = $middleware->handle($sendRequest, $request, $client, []);

		$this->assertSame($response, $result);
		$this->assertEquals(2, $callCount); // Original + retry
		$this->assertEquals('new_access', $tokenManager->getAccessToken());
	}

	/**
	 * Test that 401 is thrown if refresh fails
	 */
	public function testThrows401IfRefreshFails(): void {
		$this->expectException(AuthenticationFailedException::class);

		$tokenManager = new TokenManager('access_token', 'refresh_token', 3600);

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$refreshProvider->expects($this->once())
			->method('refreshToken')
			->willThrowException(new \Exception('Refresh failed'));

		$config = new Configuration();
		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock(RequestInterface::class);
		$client = new Client();

		$sendRequest = function ($req, $opts) {
			throw new AuthenticationFailedException('Authentication failed');
		};

		$middleware->handle($sendRequest, $request, $client, []);
	}

	/**
	 * Test that middleware doesn't retry after already refreshing
	 */
	public function testNoRetryLoopAfterRefresh(): void {
		$this->expectException(AuthenticationFailedException::class);

		$tokenManager = new TokenManager('access_token', 'refresh_token', 3600);

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$refreshProvider->expects($this->once())
			->method('refreshToken')
			->willReturn(new TokenResponse('new_access', 'new_refresh', 3600));

		$config = new Configuration();
		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock(RequestInterface::class);
		$request->method('withHeader')->willReturnSelf();
		$client = new Client();

		$sendRequest = function ($req, $opts) {
			// Always throws 401, even after refresh
			throw new AuthenticationFailedException('Authentication failed');
		};

		// Should only try refresh once, then throw
		$middleware->handle($sendRequest, $request, $client, []);
	}

	/**
	 * Test that successful requests pass through without refresh
	 */
	public function testSuccessfulRequestPassesThrough(): void {
		$tokenManager = new TokenManager('access_token', 'refresh_token', 3600);

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$refreshProvider->expects($this->never())->method('refreshToken');

		$config = new Configuration();
		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock(RequestInterface::class);
		/** @var ResponseInterface&\PHPUnit\Framework\MockObject\MockObject $response */
		$response = $this->createMock(ResponseInterface::class);
		$client = new Client();

		$sendRequest = function ($req, $opts) use ($response) {
			return $response;
		};

		$result = $middleware->handle($sendRequest, $request, $client, []);
		$this->assertSame($response, $result);
	}

	/**
	 * Test isRefreshing flag
	 */
	public function testIsRefreshingFlag(): void {
		$tokenManager = new TokenManager('access_token', 'refresh_token', 3600);

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$config = new Configuration();

		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		$this->assertFalse($middleware->isRefreshing());
	}

	/**
	 * Test that proactive refresh failure doesn't block request
	 */
	public function testProactiveRefreshFailureDoesntBlockRequest(): void {
		// Token that needs refresh
		$tokenManager = new TokenManager('old_access', 'refresh_token', 200);

		/** @var BambooHRTokenRefreshProvider&\PHPUnit\Framework\MockObject\MockObject $refreshProvider */
		$refreshProvider = $this->createMock(BambooHRTokenRefreshProvider::class);
		$refreshProvider->expects($this->once())
			->method('refreshToken')
			->willThrowException(new \Exception('Network error'));

		$config = new Configuration();
		$middleware = new OAuth2Middleware($tokenManager, $refreshProvider, $config);

		/** @var RequestInterface&\PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock(RequestInterface::class);
		/** @var ResponseInterface&\PHPUnit\Framework\MockObject\MockObject $response */
		$response = $this->createMock(ResponseInterface::class);
		$client = new Client();

		$sendRequest = function ($req, $opts) use ($response) {
			// Request succeeds despite proactive refresh failure
			return $response;
		};

		$result = $middleware->handle($sendRequest, $request, $client, []);

		// Request still went through
		$this->assertSame($response, $result);
	}
}
