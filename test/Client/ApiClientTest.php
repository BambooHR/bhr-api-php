<?php
/**
 * ApiClientTest
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Test\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Test\Client;

use BhrSdk\Client\ApiClient;
use BhrSdk\Client\Logger\SecureLogger;
use BhrSdk\Configuration;
use BhrSdk\HeaderSelector;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

/**
 * ApiClientTest Class
 *
 * @category Class
 * @package  BhrSdk\Test\Client
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class ApiClientTest extends TestCase {
	/**
	 * Test that ApiClient can be instantiated
	 */
	public function testCanInstantiateClient(): void {
		$client = new ApiClient();
		$this->assertInstanceOf(ApiClient::class, $client);
	}

	/**
	 * Test fluent interface returns self
	 */
	public function testFluentInterfaceReturnsSelf(): void {
		$client = new ApiClient();

		$result = $client->withApiKey('test-key');
		$this->assertSame($client, $result);

		$result = $client->forCompany('test-company');
		$this->assertSame($client, $result);

		$result = $client->withRetries(3);
		$this->assertSame($client, $result);

		$result = $client->withDebug(true);
		$this->assertSame($client, $result);
	}

	/**
	 * Test API key authentication sets correct credentials
	 */
	public function testWithApiKeySetCredentials(): void {
		$client = new ApiClient();
		$client->withApiKey('my-api-key')
			   ->forCompany('test-company')
			   ->build();

		$config = $client->getConfiguration();
		$this->assertEquals('my-api-key', $config->getUsername());
		$this->assertEquals('x', $config->getPassword());
	}

	/**
	 * Test OAuth authentication sets access token
	 */
	public function testWithOAuthSetsAccessToken(): void {
		$client = new ApiClient();
		$client->withOAuth('my-oauth-token')
			   ->forCompany('test-company')
			   ->build();

		$config = $client->getConfiguration();
		$this->assertEquals('my-oauth-token', $config->getAccessToken());
	}

	/**
	 * Test forCompany sets correct host
	 */
	public function testForCompanySetsHost(): void {
		$client = new ApiClient();
		$client->forCompany('acme');

		$config = $client->getConfiguration();
		$this->assertEquals('https://acme.bamboohr.com', $config->getHost());
	}

	/**
	 * Test withHost sets custom host
	 */
	public function testWithHostSetsCustomHost(): void {
		$client = new ApiClient();
		$client->withHost('https://custom.bamboohr.com');

		$config = $client->getConfiguration();
		$this->assertEquals('https://custom.bamboohr.com', $config->getHost());
	}

	/**
	 * Test withRetries sets retry count
	 */
	public function testWithRetriesSetsRetryCount(): void {
		$client = new ApiClient();
		$client->withRetries(3);

		$config = $client->getConfiguration();
		$this->assertEquals(3, $config->getRetries());
	}

	/**
	 * Test withDebug sets debug flag
	 */
	public function testWithDebugSetsDebugFlag(): void {
		$client = new ApiClient();
		$client->withDebug(true);

		$config = $client->getConfiguration();
		$this->assertTrue($config->getDebug());
	}

	/**
	 * Test withHttpClient sets custom client
	 */
	public function testWithHttpClientSetsCustomClient(): void {
		$client = new ApiClient();
		$customHttpClient = new Client();

		$result = $client->withHttpClient($customHttpClient);
		$this->assertSame($client, $result);
	}

	/**
	 * Test build validates configuration
	 */
	public function testBuildValidatesConfiguration(): void {
		$client = new ApiClient();
		$client->withApiKey('test-key')
			   ->forCompany('test-company');

		$result = $client->build();
		$this->assertSame($client, $result);
	}

	/**
	 * Test build throws exception when authentication is missing
	 */
	public function testBuildThrowsExceptionWhenAuthMissing(): void {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Authentication is required');

		$client = new ApiClient();
		$client->forCompany('test-company')
			   ->build();
	}

	/**
	 * Test build throws exception when company is missing
	 */
	public function testBuildThrowsExceptionWhenCompanyMissing(): void {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Company domain is required');

		$client = new ApiClient();
		$client->withApiKey('test-key')
			   ->build();
	}

	/**
	 * Test getApi throws exception for non-existent class
	 */
	public function testGetApiThrowsExceptionForNonExistentClass(): void {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage("API class 'NonExistentClass' does not exist");

		$client = new ApiClient();
		$client->withApiKey('test-key')
			   ->forCompany('test-company')
			   /** @phpstan-ignore-next-line */
			   ->getApi('NonExistentClass');
	}

	/**
	 * Test complete fluent chain
	 */
	public function testCompleteFluentChain(): void {
		$client = new ApiClient();

		$result = $client
			->withApiKey('test-key')
			->forCompany('test-company')
			->withRetries(3)
			->withDebug(false)
			->build();

		$this->assertSame($client, $result);

		$config = $client->getConfiguration();
		$this->assertEquals('test-key', $config->getUsername());
		$this->assertEquals('https://test-company.bamboohr.com', $config->getHost());
		$this->assertEquals(3, $config->getRetries());
		$this->assertFalse($config->getDebug());
	}

	/**
	 * Test getConfiguration returns Configuration object
	 */
	public function testGetConfigurationReturnsConfigurationObject(): void {
		$client = new ApiClient();
		$config = $client->getConfiguration();

		$this->assertInstanceOf(Configuration::class, $config);
	}

	/**
	 * Test getAuthBuilder returns null initially
	 */
	public function testGetAuthBuilderReturnsNullInitially(): void {
		$client = new ApiClient();
		$this->assertNull($client->getAuthBuilder());
	}

	/**
	 * Test getAuthBuilder returns AuthBuilder after authentication
	 */
	public function testGetAuthBuilderReturnsAuthBuilderAfterAuth(): void {
		$client = new ApiClient();
		$client->withApiKey('test-key');

		$authBuilder = $client->getAuthBuilder();
		$this->assertInstanceOf(\BhrSdk\Client\AuthBuilder::class, $authBuilder);
	}

	/**
	 * Test getSanitizedAuthInfo returns sanitized info
	 */
	public function testGetSanitizedAuthInfoReturnsSanitizedInfo(): void {
		$client = new ApiClient();
		$client->withApiKey('abcd1234567890wxyz')
			   ->forCompany('test-company')
			   ->build();

		$info = $client->getSanitizedAuthInfo();

		$this->assertEquals('api_key', $info['type']);
		$this->assertTrue($info['configured']);
		$this->assertEquals('abcd********wxyz', $info['api_key']);
	}

	/**
	 * Test getSanitizedAuthInfo returns none when not configured
	 */
	public function testGetSanitizedAuthInfoReturnsNoneWhenNotConfigured(): void {
		$client = new ApiClient();
		$info = $client->getSanitizedAuthInfo();

		$this->assertEquals('none', $info['type']);
		$this->assertFalse($info['configured']);
	}

	/**
	 * Test constructor accepts AuthBuilder
	 */
	public function testConstructorAcceptsAuthBuilder(): void {
		$authBuilder = new \BhrSdk\Client\AuthBuilder();
		$authBuilder->withApiKey('test-key');

		$client = new ApiClient($authBuilder);
		$client->forCompany('test-company')
			   ->build();

		$config = $client->getConfiguration();
		$this->assertEquals('test-key', $config->getUsername());
		$this->assertEquals('x', $config->getPassword());
	}

	/**
	 * By default the client initialises a disabled SecureLogger so callers
	 * always get a usable LoggerInterface; getLogger() should never return null.
	 */
	public function testGetLoggerReturnsDisabledLoggerByDefault(): void {
		$client = new ApiClient();
		$logger = $client->getLogger();
		$this->assertInstanceOf(SecureLogger::class, $logger);
	}

	/**
	 * Test withLogging enables logging
	 */
	public function testWithLoggingEnablesLogging(): void {
		$client = new ApiClient();
		$client->withLogging();

		$logger = $client->getLogger();
		$this->assertInstanceOf(SecureLogger::class, $logger);
	}

	/**
	 * Test withLogging accepts custom logger
	 */
	public function testWithLoggingAcceptsCustomLogger(): void {
		$customLogger = new SecureLogger(true, 'debug');
		$client = new ApiClient();
		$client->withLogging($customLogger);

		$logger = $client->getLogger();
		$this->assertSame($customLogger, $logger);
	}

	/**
	 * Test constructor accepts logger
	 */
	public function testConstructorAcceptsLogger(): void {
		$customLogger = new SecureLogger(true, 'debug');
		$client = new ApiClient(null, $customLogger);

		$logger = $client->getLogger();
		$this->assertSame($customLogger, $logger);
	}

	/**
	 * Test logging integration with build
	 */
	public function testLoggingIntegrationWithBuild(): void {
		// Create a memory stream for testing
		$stream = fopen('php://memory', 'r+');
		if ($stream === false) {
			$this->fail('Failed to open memory stream');
		}
		$logger = new SecureLogger(true, 'info', $stream);

		$client = new ApiClient(null, $logger);
		$client->withApiKey('test-api-key-12345')
			   ->forCompany('test-company')
			   ->build();

		// Get log output
		rewind($stream);
		$output = stream_get_contents($stream);
		if ($output === false) {
			$output = '';
		}
		fclose($stream);

		// Verify logging occurred
		$this->assertStringContainsString('Building API client configuration', $output);
		$this->assertStringContainsString('Authentication configured', $output);
		$this->assertStringContainsString('API client built successfully', $output);

		// Verify sensitive data is masked
		$this->assertStringNotContainsString('test-api-key-12345', $output);
	}

	/**
	 * Test withHeaderSelector sets header selector
	 */
	public function testWithHeaderSelectorSetsHeaderSelector(): void {
		$headerSelector = new HeaderSelector();
		$client = new ApiClient();

		$result = $client->withHeaderSelector($headerSelector);

		$this->assertSame($client, $result);
	}

	/**
	 * Test withHostIndex sets host index
	 */
	public function testWithHostIndexSetsHostIndex(): void {
		$client = new ApiClient();

		$result = $client->withHostIndex(2);

		$this->assertSame($client, $result);
	}

	/**
	 * Test fluent chain with all options
	 */
	public function testCompleteFluentChainWithAllOptions(): void {
		$headerSelector = new HeaderSelector();
		$client = new ApiClient();

		$result = $client
			->withApiKey('test-key')
			->forCompany('test-company')
			->withRetries(3)
			->withDebug(false)
			->withHeaderSelector($headerSelector)
			->withHostIndex(1)
			->build();

		$this->assertSame($client, $result);
	}

	/**
	 * The per-API accessor tests used to be written out by hand, one method
	 * per API. That list went stale the moment the spec renamed a tag: it
	 * still asserted on tabularData() and lastChangeInformation() after the
	 * generator had replaced them with employeeTables() and changeTracking(),
	 * so the suite failed on APIs that no longer existed while the genuinely
	 * new ones went completely untested.
	 *
	 * Driving the test off the generator's own FILES manifest instead means
	 * coverage tracks the spec automatically and this list cannot drift.
	 *
	 * @param class-string $class
	 *
	 * @dataProvider generatedApiProvider
	 */
	public function testGeneratedAccessorReturnsExpectedApi(string $method, string $class): void {
		$client = new ApiClient();
		$client->withApiKey('test-key')
			   ->forCompany('test-company')
			   ->build();

		$this->assertTrue(
			method_exists($client, $method),
			"ApiClient is missing the {$method}() accessor for {$class}. Run `make sync-accessors`."
		);
		$this->assertInstanceOf($class, $client->{$method}());
	}

	/**
	 * Every generated API class, read from the same source of truth that
	 * scripts/sync_accessors.php uses.
	 *
	 * @return array<string, array{string, class-string}>
	 */
	public static function generatedApiProvider(): array {
		$manifest = __DIR__ . '/../../.openapi-generator/FILES';
		self::assertFileExists($manifest, 'generator FILES manifest missing — has the SDK been generated?');

		$cases = [];
		foreach (explode("\n", (string) file_get_contents($manifest)) as $line) {
			if (preg_match('#^lib/Api/(\w+)\.php$#', trim($line), $matches) !== 1) {
				continue;
			}
			$class = $matches[1];
			$method = lcfirst((string) preg_replace('/Api$/', '', $class));
			/** @var class-string $fqcn */
			$fqcn = '\\BhrSdk\\Api\\' . $class;
			$cases[$class] = [$method, $fqcn];
		}

		self::assertNotEmpty($cases, 'no lib/Api/*.php entries found in the FILES manifest');

		return $cases;
	}

	/**
	 * Test manual() convenience method
	 */
	public function testManualConvenienceMethod(): void {
		$client = new ApiClient();
		$client->withApiKey('test-key')
			   ->forCompany('test-company')
			   ->build();

		$api = $client->manual();
		$this->assertInstanceOf(\BhrSdk\Api\ManualApi::class, $api);
	}
}
