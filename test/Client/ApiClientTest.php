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
class ApiClientTest extends TestCase
{
    /**
     * Test that ApiClient can be instantiated
     */
    public function testCanInstantiateClient(): void
    {
        $client = new ApiClient();
        $this->assertInstanceOf(ApiClient::class, $client);
    }

    /**
     * Test fluent interface returns self
     */
    public function testFluentInterfaceReturnsSelf(): void
    {
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
    public function testWithApiKeySetCredentials(): void
    {
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
    public function testWithOAuthSetsAccessToken(): void
    {
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
    public function testForCompanySetsHost(): void
    {
        $client = new ApiClient();
        $client->forCompany('acme');

        $config = $client->getConfiguration();
        $this->assertEquals('https://acme.bamboohr.com', $config->getHost());
    }

    /**
     * Test withHost sets custom host
     */
    public function testWithHostSetsCustomHost(): void
    {
        $client = new ApiClient();
        $client->withHost('https://custom.bamboohr.com');

        $config = $client->getConfiguration();
        $this->assertEquals('https://custom.bamboohr.com', $config->getHost());
    }

    /**
     * Test withRetries sets retry count
     */
    public function testWithRetriesSetsRetryCount(): void
    {
        $client = new ApiClient();
        $client->withRetries(3);

        $config = $client->getConfiguration();
        $this->assertEquals(3, $config->getRetries());
    }

    /**
     * Test withDebug sets debug flag
     */
    public function testWithDebugSetsDebugFlag(): void
    {
        $client = new ApiClient();
        $client->withDebug(true);

        $config = $client->getConfiguration();
        $this->assertTrue($config->getDebug());
    }

    /**
     * Test withHttpClient sets custom client
     */
    public function testWithHttpClientSetsCustomClient(): void
    {
        $client = new ApiClient();
        $customHttpClient = new Client();
        
        $result = $client->withHttpClient($customHttpClient);
        $this->assertSame($client, $result);
    }

    /**
     * Test build validates configuration
     */
    public function testBuildValidatesConfiguration(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company');

        $result = $client->build();
        $this->assertSame($client, $result);
    }

    /**
     * Test build throws exception when authentication is missing
     */
    public function testBuildThrowsExceptionWhenAuthMissing(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Authentication is required');

        $client = new ApiClient();
        $client->forCompany('test-company')
               ->build();
    }

    /**
     * Test build throws exception when company is missing
     */
    public function testBuildThrowsExceptionWhenCompanyMissing(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Company domain is required');

        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->build();
    }

    /**
     * Test getApi throws exception for non-existent class
     */
    public function testGetApiThrowsExceptionForNonExistentClass(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("API class 'NonExistentClass' does not exist");

        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->getApi('NonExistentClass');
    }

    /**
     * Test complete fluent chain
     */
    public function testCompleteFluentChain(): void
    {
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
    public function testGetConfigurationReturnsConfigurationObject(): void
    {
        $client = new ApiClient();
        $config = $client->getConfiguration();

        $this->assertInstanceOf(Configuration::class, $config);
    }

    /**
     * Test getAuthBuilder returns null initially
     */
    public function testGetAuthBuilderReturnsNullInitially(): void
    {
        $client = new ApiClient();
        $this->assertNull($client->getAuthBuilder());
    }

    /**
     * Test getAuthBuilder returns AuthBuilder after authentication
     */
    public function testGetAuthBuilderReturnsAuthBuilderAfterAuth(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key');

        $authBuilder = $client->getAuthBuilder();
        $this->assertInstanceOf(\BhrSdk\Client\AuthBuilder::class, $authBuilder);
    }

    /**
     * Test getSanitizedAuthInfo returns sanitized info
     */
    public function testGetSanitizedAuthInfoReturnsSanitizedInfo(): void
    {
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
    public function testGetSanitizedAuthInfoReturnsNoneWhenNotConfigured(): void
    {
        $client = new ApiClient();
        $info = $client->getSanitizedAuthInfo();
        
        $this->assertEquals('none', $info['type']);
        $this->assertFalse($info['configured']);
    }

    /**
     * Test constructor accepts AuthBuilder
     */
    public function testConstructorAcceptsAuthBuilder(): void
    {
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
     * Test getLogger returns null by default
     */
    public function testGetLoggerReturnsNullByDefault(): void
    {
        $client = new ApiClient();
        $this->assertNull($client->getLogger());
    }

    /**
     * Test withLogging enables logging
     */
    public function testWithLoggingEnablesLogging(): void
    {
        $client = new ApiClient();
        $client->withLogging();

        $logger = $client->getLogger();
        $this->assertInstanceOf(SecureLogger::class, $logger);
    }

    /**
     * Test withLogging accepts custom logger
     */
    public function testWithLoggingAcceptsCustomLogger(): void
    {
        $customLogger = new SecureLogger(true, 'debug');
        $client = new ApiClient();
        $client->withLogging($customLogger);

        $logger = $client->getLogger();
        $this->assertSame($customLogger, $logger);
    }

    /**
     * Test constructor accepts logger
     */
    public function testConstructorAcceptsLogger(): void
    {
        $customLogger = new SecureLogger(true, 'debug');
        $client = new ApiClient(null, $customLogger);

        $logger = $client->getLogger();
        $this->assertSame($customLogger, $logger);
    }

    /**
     * Test logging integration with build
     */
    public function testLoggingIntegrationWithBuild(): void
    {
        // Create a memory stream for testing
        $stream = fopen('php://memory', 'r+');
        $logger = new SecureLogger(true, 'info', $stream);

        $client = new ApiClient(null, $logger);
        $client->withApiKey('test-api-key-12345')
               ->forCompany('test-company')
               ->build();

        // Get log output
        rewind($stream);
        $output = stream_get_contents($stream);
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
    public function testWithHeaderSelectorSetsHeaderSelector(): void
    {
        $headerSelector = new HeaderSelector();
        $client = new ApiClient();
        
        $result = $client->withHeaderSelector($headerSelector);
        
        $this->assertSame($client, $result);
    }

    /**
     * Test withHostIndex sets host index
     */
    public function testWithHostIndexSetsHostIndex(): void
    {
        $client = new ApiClient();
        
        $result = $client->withHostIndex(2);
        
        $this->assertSame($client, $result);
    }

    /**
     * Test fluent chain with all options
     */
    public function testCompleteFluentChainWithAllOptions(): void
    {
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
     * Test employees() convenience method
     */
    public function testEmployeesConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->employees();
        $this->assertInstanceOf(\BhrSdk\Api\EmployeesApi::class, $api);
    }

    /**
     * Test timeOff() convenience method
     */
    public function testTimeOffConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->timeOff();
        $this->assertInstanceOf(\BhrSdk\Api\TimeOffApi::class, $api);
    }

    /**
     * Test benefits() convenience method
     */
    public function testBenefitsConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->benefits();
        $this->assertInstanceOf(\BhrSdk\Api\BenefitsApi::class, $api);
    }

    /**
     * Test reports() convenience method
     */
    public function testReportsConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->reports();
        $this->assertInstanceOf(\BhrSdk\Api\ReportsApi::class, $api);
    }

    /**
     * Test tabularData() convenience method
     */
    public function testTabularDataConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->tabularData();
        $this->assertInstanceOf(\BhrSdk\Api\TabularDataApi::class, $api);
    }

    /**
     * Test photos() convenience method
     */
    public function testPhotosConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->photos();
        $this->assertInstanceOf(\BhrSdk\Api\PhotosApi::class, $api);
    }

    /**
     * Test webhooks() convenience method
     */
    public function testWebhooksConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->webhooks();
        $this->assertInstanceOf(\BhrSdk\Api\WebhooksApi::class, $api);
    }

    /**
     * Test goals() convenience method
     */
    public function testGoalsConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->goals();
        $this->assertInstanceOf(\BhrSdk\Api\GoalsApi::class, $api);
    }

    /**
     * Test training() convenience method
     */
    public function testTrainingConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->training();
        $this->assertInstanceOf(\BhrSdk\Api\TrainingApi::class, $api);
    }

    /**
     * Test timeTracking() convenience method
     */
    public function testTimeTrackingConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->timeTracking();
        $this->assertInstanceOf(\BhrSdk\Api\TimeTrackingApi::class, $api);
    }

    /**
     * Test accountInformation() convenience method
     */
    public function testAccountInformationConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->accountInformation();
        $this->assertInstanceOf(\BhrSdk\Api\AccountInformationApi::class, $api);
    }

    /**
     * Test applicantTracking() convenience method
     */
    public function testApplicantTrackingConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->applicantTracking();
        $this->assertInstanceOf(\BhrSdk\Api\ApplicantTrackingApi::class, $api);
    }

    /**
     * Test companyFiles() convenience method
     */
    public function testCompanyFilesConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->companyFiles();
        $this->assertInstanceOf(\BhrSdk\Api\CompanyFilesApi::class, $api);
    }

    /**
     * Test employeeFiles() convenience method
     */
    public function testEmployeeFilesConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->employeeFiles();
        $this->assertInstanceOf(\BhrSdk\Api\EmployeeFilesApi::class, $api);
    }

    /**
     * Test ats() convenience method
     */
    public function testAtsConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->ats();
        $this->assertInstanceOf(\BhrSdk\Api\ATSApi::class, $api);
    }

    /**
     * Test customReports() convenience method
     */
    public function testCustomReportsConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->customReports();
        $this->assertInstanceOf(\BhrSdk\Api\CustomReportsApi::class, $api);
    }

    /**
     * Test datasets() convenience method
     */
    public function testDatasetsConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->datasets();
        $this->assertInstanceOf(\BhrSdk\Api\DatasetsApi::class, $api);
    }

    /**
     * Test hours() convenience method
     */
    public function testHoursConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->hours();
        $this->assertInstanceOf(\BhrSdk\Api\HoursApi::class, $api);
    }

    /**
     * Test lastChangeInformation() convenience method
     */
    public function testLastChangeInformationConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->lastChangeInformation();
        $this->assertInstanceOf(\BhrSdk\Api\LastChangeInformationApi::class, $api);
    }

    /**
     * Test login() convenience method
     */
    public function testLoginConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->login();
        $this->assertInstanceOf(\BhrSdk\Api\LoginApi::class, $api);
    }

    /**
     * Test publicAPI() convenience method
     */
    public function testPublicAPIConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->publicAPI();
        $this->assertInstanceOf(\BhrSdk\Api\PublicAPIApi::class, $api);
    }

    /**
     * Test manual() convenience method
     */
    public function testManualConvenienceMethod(): void
    {
        $client = new ApiClient();
        $client->withApiKey('test-key')
               ->forCompany('test-company')
               ->build();

        $api = $client->manual();
        $this->assertInstanceOf(\BhrSdk\Api\ManualApi::class, $api);
    }
}
