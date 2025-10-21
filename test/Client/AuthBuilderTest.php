<?php
/**
 * AuthBuilderTest
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Test\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Test\Client;

use BhrSdk\Client\AuthBuilder;
use BhrSdk\Configuration;
use PHPUnit\Framework\TestCase;

/**
 * AuthBuilderTest Class
 *
 * @category Class
 * @package  BhrSdk\Test\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class AuthBuilderTest extends TestCase {
	/**
	 * Test that AuthBuilder can be instantiated
	 */
	public function testCanInstantiateAuthBuilder(): void {
		$builder = new AuthBuilder();
		$this->assertInstanceOf(AuthBuilder::class, $builder);
	}

	/**
	 * Test fluent interface returns self
	 */
	public function testFluentInterfaceReturnsSelf(): void {
		$builder = new AuthBuilder();

		$result = $builder->withApiKey('test-key');
		$this->assertSame($builder, $result);

		$builder = new AuthBuilder();
		$result = $builder->withOAuth('test-token');
		$this->assertSame($builder, $result);
	}

	/**
	 * Test API key authentication configuration
	 */
	public function testWithApiKey(): void {
		$builder = new AuthBuilder();
		$builder->withApiKey('my-api-key');

		$this->assertTrue($builder->isConfigured());
		$this->assertEquals('api_key', $builder->getAuthType());
		$this->assertTrue($builder->validate());
	}

	/**
	 * Test OAuth authentication configuration
	 */
	public function testWithOAuth(): void {
		$builder = new AuthBuilder();
		$builder->withOAuth('my-oauth-token');

		$this->assertTrue($builder->isConfigured());
		$this->assertEquals('oauth', $builder->getAuthType());
		$this->assertTrue($builder->validate());
	}

	/**
	 * Test that unconfigured builder reports not configured
	 */
	public function testIsNotConfiguredByDefault(): void {
		$builder = new AuthBuilder();
		$this->assertFalse($builder->isConfigured());
		$this->assertNull($builder->getAuthType());
	}

	/**
	 * Test applying API key auth to Configuration
	 */
	public function testApplyApiKeyToConfiguration(): void {
		$builder = new AuthBuilder();
		$builder->withApiKey('test-api-key');

		$config = new Configuration();
		$builder->applyTo($config);

		$this->assertEquals('test-api-key', $config->getUsername());
		$this->assertEquals('x', $config->getPassword());
	}

	/**
	 * Test applying OAuth auth to Configuration
	 */
	public function testApplyOAuthToConfiguration(): void {
		$builder = new AuthBuilder();
		$builder->withOAuth('test-oauth-token');

		$config = new Configuration();
		$builder->applyTo($config);

		$this->assertEquals('test-oauth-token', $config->getAccessToken());
	}

	/**
	 * Test that applyTo throws exception when not configured
	 */
	public function testApplyToThrowsExceptionWhenNotConfigured(): void {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('No authentication method configured');

		$builder = new AuthBuilder();
		$config = new Configuration();
		$builder->applyTo($config);
	}

	/**
	 * Test validate throws exception when not configured
	 */
	public function testValidateThrowsExceptionWhenNotConfigured(): void {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('No authentication method configured');

		$builder = new AuthBuilder();
		$builder->validate();
	}

	/**
	 * Test validate throws exception for empty API key
	 */
	public function testValidateThrowsExceptionForEmptyApiKey(): void {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('API key cannot be empty');

		$builder = new AuthBuilder();
		$builder->withApiKey('');
		$builder->validate();
	}

	/**
	 * Test validate throws exception for empty OAuth token
	 */
	public function testValidateThrowsExceptionForEmptyOAuthToken(): void {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('OAuth token cannot be empty');

		$builder = new AuthBuilder();
		$builder->withOAuth('');
		$builder->validate();
	}

	/**
	 * Test getSanitizedInfo masks API key
	 */
	public function testGetSanitizedInfoMasksApiKey(): void {
		$builder = new AuthBuilder();
		$builder->withApiKey('abcd1234567890wxyz');

		$info = $builder->getSanitizedInfo();

		$this->assertEquals('api_key', $info['type']);
		$this->assertTrue($info['configured']);
		$this->assertEquals('abcd********wxyz', $info['api_key']);
	}

	/**
	 * Test getSanitizedInfo masks short API key completely
	 */
	public function testGetSanitizedInfoMasksShortApiKey(): void {
		$builder = new AuthBuilder();
		$builder->withApiKey('short');

		$info = $builder->getSanitizedInfo();

		$this->assertEquals('********', $info['api_key']);
	}

	/**
	 * Test getSanitizedInfo masks OAuth token
	 */
	public function testGetSanitizedInfoMasksOAuthToken(): void {
		$builder = new AuthBuilder();
		$builder->withOAuth('token1234567890abcd');

		$info = $builder->getSanitizedInfo();

		$this->assertEquals('oauth', $info['type']);
		$this->assertTrue($info['configured']);
		$this->assertEquals('toke********abcd', $info['oauth_token']);
	}

	/**
	 * Test getSanitizedInfo for unconfigured builder
	 */
	public function testGetSanitizedInfoForUnconfigured(): void {
		$builder = new AuthBuilder();

		$info = $builder->getSanitizedInfo();

		$this->assertEquals('none', $info['type']);
		$this->assertFalse($info['configured']);
	}

	/**
	 * Test reset clears all configuration
	 */
	public function testResetClearsConfiguration(): void {
		$builder = new AuthBuilder();
		$builder->withApiKey('test-key');

		$this->assertTrue($builder->isConfigured());

		$result = $builder->reset();

		$this->assertSame($builder, $result);
		$this->assertFalse($builder->isConfigured());
		$this->assertNull($builder->getAuthType());
	}

	/**
	 * Test switching between auth methods
	 */
	public function testSwitchingBetweenAuthMethods(): void {
		$builder = new AuthBuilder();

		// Start with API key
		$builder->withApiKey('api-key');
		$this->assertEquals('api_key', $builder->getAuthType());

		// Switch to OAuth
		$builder->withOAuth('oauth-token');
		$this->assertEquals('oauth', $builder->getAuthType());
	}

	/**
	 * Test that last auth method wins when multiple are set
	 */
	public function testLastAuthMethodWins(): void {
		$builder = new AuthBuilder();

		$builder->withApiKey('api-key');
		$builder->withOAuth('oauth-token'); // This should win

		$config = new Configuration();
		$builder->applyTo($config);

		$this->assertEquals('oauth-token', $config->getAccessToken());
	}
}
