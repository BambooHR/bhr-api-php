<?php

namespace BhrSdk\Test\Client\Auth;

use BhrSdk\Client\Auth\TokenManager;
use BhrSdk\Client\Auth\TokenResponse;
use PHPUnit\Framework\TestCase;

/**
 * TokenManagerTest
 *
 * @category Class
 * @package  BhrSdk\Test\Client\Auth
 * @author   BambooHR
 */
class TokenManagerTest extends TestCase {
	/**
	 * Test basic token manager creation
	 */
	public function testTokenManagerCreation(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456',
			expiresIn: 3600
		);

		$this->assertEquals('access123', $manager->getAccessToken());
		$this->assertEquals('refresh456', $manager->getRefreshToken());
		$this->assertTrue($manager->hasRefreshCapability());
	}

	/**
	 * Test token manager without refresh token
	 */
	public function testTokenManagerWithoutRefreshToken(): void {
		$manager = new TokenManager(
			accessToken: 'access123'
		);

		$this->assertEquals('access123', $manager->getAccessToken());
		$this->assertNull($manager->getRefreshToken());
		$this->assertFalse($manager->hasRefreshCapability());
	}

	/**
	 * Test that needsRefresh returns false when no refresh token
	 */
	public function testNeedsRefreshWithoutRefreshToken(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: null,
			expiresIn: 10 // Expires soon
		);

		$this->assertFalse($manager->needsRefresh());
	}

	/**
	 * Test that needsRefresh returns false when expiry is unknown
	 */
	public function testNeedsRefreshWithUnknownExpiry(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456'
			// No expiresIn provided
		);

		$this->assertFalse($manager->needsRefresh());
	}

	/**
	 * Test that needsRefresh returns true within buffer period
	 */
	public function testNeedsRefreshWithinBufferPeriod(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456',
			expiresIn: 200 // Expires in 200 seconds (within 5 min buffer)
		);

		$this->assertTrue($manager->needsRefresh());
	}

	/**
	 * Test that needsRefresh returns false when token is fresh
	 */
	public function testNeedsRefreshWhenTokenFresh(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456',
			expiresIn: 3600 // Expires in 1 hour
		);

		$this->assertFalse($manager->needsRefresh());
	}

	/**
	 * Test isExpired returns true when token is expired
	 */
	public function testIsExpiredWhenExpired(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456',
			expiresIn: -10 // Expired 10 seconds ago
		);

		$this->assertTrue($manager->isExpired());
	}

	/**
	 * Test isExpired returns false when token is not expired
	 */
	public function testIsExpiredWhenNotExpired(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456',
			expiresIn: 3600
		);

		$this->assertFalse($manager->isExpired());
	}

	/**
	 * Test isExpired returns false when expiry is unknown
	 */
	public function testIsExpiredWhenExpiryUnknown(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456'
		);

		$this->assertFalse($manager->isExpired());
	}

	/**
	 * Test updating tokens after refresh
	 */
	public function testUpdateTokens(): void {
		$manager = new TokenManager(
			accessToken: 'old_access',
			refreshToken: 'old_refresh',
			expiresIn: 100
		);

		$tokenResponse = new TokenResponse(
			accessToken: 'new_access',
			refreshToken: 'new_refresh',
			expiresIn: 3600
		);

		$manager->updateTokens($tokenResponse);

		$this->assertEquals('new_access', $manager->getAccessToken());
		$this->assertEquals('new_refresh', $manager->getRefreshToken());
	}

	/**
	 * Test updating tokens without new refresh token (no rotation)
	 */
	public function testUpdateTokensWithoutNewRefreshToken(): void {
		$manager = new TokenManager(
			accessToken: 'old_access',
			refreshToken: 'old_refresh',
			expiresIn: 100
		);

		$tokenResponse = new TokenResponse(
			accessToken: 'new_access',
			refreshToken: null, // No new refresh token
			expiresIn: 3600
		);

		$manager->updateTokens($tokenResponse);

		$this->assertEquals('new_access', $manager->getAccessToken());
		$this->assertEquals('old_refresh', $manager->getRefreshToken()); // Kept old one
	}

	/**
	 * Test refresh callback is invoked
	 */
	public function testRefreshCallbackInvoked(): void {
		$callbackInvoked = false;
		$newAccessToken = null;
		$newRefreshToken = null;
		$oldAccessToken = null;
		$oldRefreshToken = null;

		$callback = function ($new_access, $new_refresh, $old_access, $old_refresh) use (
			&$callbackInvoked,
			&$newAccessToken,
			&$newRefreshToken,
			&$oldAccessToken,
			&$oldRefreshToken
		) {
			$callbackInvoked = true;
			$newAccessToken = $new_access;
			$newRefreshToken = $new_refresh;
			$oldAccessToken = $old_access;
			$oldRefreshToken = $old_refresh;
		};

		$manager = new TokenManager(
			accessToken: 'old_access',
			refreshToken: 'old_refresh',
			expiresIn: 100,
			onTokenRefresh: $callback
		);

		$tokenResponse = new TokenResponse(
			accessToken: 'new_access',
			refreshToken: 'new_refresh',
			expiresIn: 3600
		);

		$manager->updateTokens($tokenResponse);

		$this->assertTrue($callbackInvoked);
		$this->assertEquals('new_access', $newAccessToken);
		$this->assertEquals('new_refresh', $newRefreshToken);
		$this->assertEquals('old_access', $oldAccessToken);
		$this->assertEquals('old_refresh', $oldRefreshToken);
	}

	/**
	 * Test setting refresh callback after construction
	 */
	public function testSetRefreshCallback(): void {
		$callbackInvoked = false;

		$manager = new TokenManager(
			accessToken: 'old_access',
			refreshToken: 'old_refresh'
		);

		$manager->setRefreshCallback(function () use (&$callbackInvoked) {
			$callbackInvoked = true;
		});

		$tokenResponse = new TokenResponse(
			accessToken: 'new_access'
		);

		$manager->updateTokens($tokenResponse);

		$this->assertTrue($callbackInvoked);
	}

	/**
	 * Test getting expiration information
	 */
	public function testGetExpirationInfo(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456',
			expiresIn: 3600
		);

		$expiresAt = $manager->getExpiresAt();
		$this->assertNotNull($expiresAt);
		$this->assertGreaterThan(time(), $expiresAt);

		$secondsUntilExpiry = $manager->getSecondsUntilExpiry();
		$this->assertNotNull($secondsUntilExpiry);
		$this->assertGreaterThan(0, $secondsUntilExpiry);
		$this->assertLessThanOrEqual(3600, $secondsUntilExpiry);
	}

	/**
	 * Test getting seconds until expiry returns zero for expired token
	 */
	public function testGetSecondsUntilExpiryForExpiredToken(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456',
			expiresIn: -100 // Expired
		);

		$this->assertEquals(0, $manager->getSecondsUntilExpiry());
	}

	/**
	 * Test getting expiration info when expiry is unknown
	 */
	public function testGetExpirationInfoWhenUnknown(): void {
		$manager = new TokenManager(
			accessToken: 'access123',
			refreshToken: 'refresh456'
		);

		$this->assertNull($manager->getExpiresAt());
		$this->assertNull($manager->getSecondsUntilExpiry());
	}
}
