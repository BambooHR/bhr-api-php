<?php

namespace BambooHR\SDK\Tests\Unit\Authentication;

use BambooHR\SDK\Authentication\OAuthAuthentication;
use BambooHR\SDK\Exception\AuthenticationException;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class OAuthAuthenticationTest extends TestCase {

	private OAuthAuthentication $auth;

	protected function setUp(): void {
		$this->auth = new OAuthAuthentication('test-client-id', 'test-client-secret');
	}

	public function testGetAuthorizationUrl() {
		$url = $this->auth->getAuthorizationUrl('test-company', [
			'redirect_uri' => 'https://example.com/callback',
			'scope' => 'employees:read',
			'state' => 'test-state'
		]);

		$this->assertStringContainsString('https://test-company.bamboohr.com/authorize.php?request=authorize', $url);
		$this->assertStringContainsString('client_id=test-client-id', $url);
		$this->assertStringContainsString('redirect_uri=https%3A%2F%2Fexample.com%2Fcallback', $url);
		$this->assertStringContainsString('scope=employees%3Aread', $url);
		$this->assertStringContainsString('state=test-state', $url);
	}

	public function testIsAuthenticatedReturnsFalseWhenNotAuthenticated() {
		$this->assertFalse($this->auth->isAuthenticated());
	}

	public function testIsAuthenticatedReturnsTrueWhenAuthenticated() {
		// Use reflection to set private properties
		$reflection = new ReflectionClass($this->auth);

		$accessTokenProp = $reflection->getProperty('accessToken');
		$accessTokenProp->setAccessible(true);
		$accessTokenProp->setValue($this->auth, 'test-access-token');

		$expiresAtProp = $reflection->getProperty('expiresAt');
		$expiresAtProp->setAccessible(true);
		$expiresAtProp->setValue($this->auth, time() + 3600);

		$this->assertTrue($this->auth->isAuthenticated());
	}

	public function testIsAuthenticatedReturnsFalseWhenTokenExpired() {
		// Use reflection to set private properties
		$reflection = new ReflectionClass($this->auth);

		$accessTokenProp = $reflection->getProperty('accessToken');
		$accessTokenProp->setAccessible(true);
		$accessTokenProp->setValue($this->auth, 'test-access-token');

		$expiresAtProp = $reflection->getProperty('expiresAt');
		$expiresAtProp->setAccessible(true);
		$expiresAtProp->setValue($this->auth, time() - 1); // Expired

		$this->assertFalse($this->auth->isAuthenticated());
	}

	public function testAddAuthToRequestThrowsExceptionWhenNotAuthenticated() {
		$this->expectException(AuthenticationException::class);

		$this->auth->addAuthToRequest([]);
	}

	public function testAddAuthToRequestAddsAuthorizationHeader() {
		// Use reflection to set private properties
		$reflection = new ReflectionClass($this->auth);

		$accessTokenProp = $reflection->getProperty('accessToken');
		$accessTokenProp->setAccessible(true);
		$accessTokenProp->setValue($this->auth, 'test-access-token');

		$tokenTypeProp = $reflection->getProperty('tokenType');
		$tokenTypeProp->setAccessible(true);
		$tokenTypeProp->setValue($this->auth, 'Bearer');

		$expiresAtProp = $reflection->getProperty('expiresAt');
		$expiresAtProp->setAccessible(true);
		$expiresAtProp->setValue($this->auth, time() + 3600);

		$options = $this->auth->addAuthToRequest([]);

		$this->assertArrayHasKey('headers', $options);
		$this->assertArrayHasKey('Authorization', $options['headers']);
		$this->assertEquals('Bearer test-access-token', $options['headers']['Authorization']);
	}

	public function testCanRefreshTokenReturnsFalseWhenNoRefreshToken() {
		$this->assertFalse($this->auth->canRefreshToken());
	}

	public function testCanRefreshTokenReturnsTrueWhenRefreshTokenExists() {
		// Use reflection to set private properties
		$reflection = new ReflectionClass($this->auth);

		$refreshTokenProp = $reflection->getProperty('refreshToken');
		$refreshTokenProp->setAccessible(true);
		$refreshTokenProp->setValue($this->auth, 'test-refresh-token');

		$this->assertTrue($this->auth->canRefreshToken());
	}

	public function testSetTokens() {
		$this->auth->setTokens(
			'test-access-token',
			'test-refresh-token',
			time() + 3600,
			'Bearer'
		);

		$this->assertTrue($this->auth->isAuthenticated());
		$this->assertTrue($this->auth->canRefreshToken());

		// Check that the tokens were set correctly
		$reflection = new ReflectionClass($this->auth);

		$accessTokenProp = $reflection->getProperty('accessToken');
		$accessTokenProp->setAccessible(true);
		$this->assertEquals('test-access-token', $accessTokenProp->getValue($this->auth));

		$refreshTokenProp = $reflection->getProperty('refreshToken');
		$refreshTokenProp->setAccessible(true);
		$this->assertEquals('test-refresh-token', $refreshTokenProp->getValue($this->auth));
	}
}
