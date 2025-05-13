<?php

namespace BambooHR\SDK\Tests\Unit;

use BambooHR\SDK\Authentication\OAuthAuthentication;
use BambooHR\SDK\BambooHRClient;
use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Http\HttpClientInterface;
use BambooHR\SDK\Resources\DirectoryResource;
use BambooHR\SDK\Resources\EmployeeResource;
use BambooHR\SDK\Resources\ReportResource;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class BambooHRClientTest extends TestCase {

	private BambooHRClient $client;
	private OAuthAuthentication $authentication;
	private HttpClientInterface $httpClient;
	private LoggerInterface $logger;

	protected function setUp(): void {
		$this->authentication = $this->createMock(OAuthAuthentication::class);
		$this->httpClient = $this->createMock(HttpClientInterface::class);
		$this->logger = $this->createMock(LoggerInterface::class);

		// Default behavior for isTokenExpiringSoon
		$this->authentication->method('isTokenExpiringSoon')
			->willReturn(false);

		$this->client = new BambooHRClient(
			'test-company',
			$this->authentication,
			$this->httpClient,
			$this->logger
		);
	}

	public function testGetBaseUrl() {
		$this->assertEquals(
			'https://api.bamboohr.com/api/gateway.php/test-company/v1',
			$this->client->getBaseUrl()
		);
	}

	public function testAuthenticate() {
		$params = ['code' => 'test-code', 'redirect_uri' => 'https://example.com/callback'];
		$expectedResult = ['access_token' => 'test-token'];

		$this->authentication->expects($this->once())
			->method('authenticate')
			->with('test-company', 'authorization_code', $params)
			->willReturn($expectedResult);

		$result = $this->client->authenticate('authorization_code', $params);

		$this->assertEquals($expectedResult, $result);
	}

	public function testGetAuthorizationUrl() {
		$params = ['redirect_uri' => 'https://example.com/callback'];
		$expectedUrl = 'https://test-company.bamboohr.com/authorize.php?response_type=code';

		$this->authentication->expects($this->once())
			->method('getAuthorizationUrl')
			->with('test-company', $params)
			->willReturn($expectedUrl);

		$url = $this->client->getAuthorizationUrl($params);

		$this->assertEquals($expectedUrl, $url);
	}

	public function testIsAuthenticated() {
		$this->authentication->expects($this->once())
			->method('isAuthenticated')
			->willReturn(true);

		$this->assertTrue($this->client->isAuthenticated());
	}

	public function testRequest() {
		$options = ['json' => ['name' => 'test']];
		$authOptions = array_merge($options, ['headers' => ['Authorization' => 'Bearer token']]);
		$expectedResponse = ['id' => 123, 'name' => 'test'];

		$this->authentication->expects($this->once())
			->method('addAuthToRequest')
			->with($options)
			->willReturn($authOptions);

		$this->httpClient->expects($this->once())
			->method('request')
			->with(
				$this->equalTo('POST'),
				$this->equalTo('https://api.bamboohr.com/api/gateway.php/test-company/v1/employees'),
				$this->callback(function ($actualOptions) use ($authOptions) {
					// Check that all expected options are present
					foreach ($authOptions as $key => $value) {
						if (!isset($actualOptions[$key])) {
							return false;
						}

						// For headers, check that all expected headers are present
						if ($key === 'headers' && is_array($value)) {
							foreach ($value as $headerKey => $headerValue) {
								if (
									!isset($actualOptions['headers'][$headerKey]) ||
									$actualOptions['headers'][$headerKey] !== $headerValue
								) {
									return false;
								}
							}
						} elseif ($actualOptions[$key] !== $value) {
							return false;
						}
					}

					// Verify X-Request-ID is present but don't check its exact value
					return isset($actualOptions['headers']['X-Request-ID']) &&
						   is_string($actualOptions['headers']['X-Request-ID']) &&
						   strpos($actualOptions['headers']['X-Request-ID'], 'bhr_') === 0;
				})
			)
			->willReturn(['statusCode' => 200, 'body' => $expectedResponse]);

		$response = $this->client->request('POST', 'employees', $options);

		$this->assertEquals($expectedResponse, $response);
	}

	public function testRequestWithTokenRefresh() {
		// Create a new client with fresh mocks to avoid conflicts
		$authentication = $this->createMock(OAuthAuthentication::class);
		$httpClient = $this->createMock(HttpClientInterface::class);
		$logger = $this->createMock(LoggerInterface::class);

		$options = ['json' => ['name' => 'test']];
		$authOptions = array_merge($options, ['headers' => ['Authorization' => 'Bearer token']]);
		$refreshedAuthOptions = array_merge($options, ['headers' => ['Authorization' => 'Bearer new-token']]);
		$expectedResponse = ['id' => 123, 'name' => 'test'];

		// Configure authentication mock
		$authentication->expects($this->any())
			->method('isTokenExpiringSoon')
			->willReturn(false);

		$authentication->expects($this->exactly(2))
			->method('addAuthToRequest')
			->willReturnOnConsecutiveCalls($authOptions, $refreshedAuthOptions);

		$authentication->expects($this->exactly(2))
			->method('canRefreshToken')
			->willReturn(true);

		$authentication->expects($this->once())
			->method('refreshToken')
			->with('test-company')
			->willReturn(['access_token' => 'new-token']);

		// Configure HTTP client mock
		$httpClient->expects($this->exactly(2))
			->method('request')
			->willReturnOnConsecutiveCalls(
				['statusCode' => 401, 'body' => ['error' => 'Unauthorized']],
				['statusCode' => 200, 'body' => $expectedResponse]
			);

		// Create a client with our configured mocks
		$client = new BambooHRClient(
			'test-company',
			$authentication,
			$httpClient,
			$logger
		);

		$response = $client->request('POST', 'employees', $options);

		$this->assertEquals($expectedResponse, $response);
	}

	public function testRequestFailure() {
		// Create a new client with fresh mocks to avoid conflicts
		$authentication = $this->createMock(OAuthAuthentication::class);
		$httpClient = $this->createMock(HttpClientInterface::class);
		$logger = $this->createMock(LoggerInterface::class);

		$options = [];
		$authOptions = ['headers' => ['Authorization' => 'Bearer token']];

		// Configure authentication mock
		$authentication->expects($this->any())
			->method('isTokenExpiringSoon')
			->willReturn(false);

		$authentication->expects($this->once())
			->method('addAuthToRequest')
			->with($options)
			->willReturn($authOptions);

		// Configure HTTP client mock to throw an exception
		$httpClient->expects($this->once())
			->method('request')
			->willThrowException(new \Exception('API error'));

		// Create a client with our configured mocks
		$client = new BambooHRClient(
			'test-company',
			$authentication,
			$httpClient,
			$logger
		);

		$this->expectException(BambooHRException::class);

		$client->request('GET', 'employees', $options);
	}

	public function testEmployees() {
		$resource = $this->client->employees();

		$this->assertInstanceOf(EmployeeResource::class, $resource);
	}

	public function testDirectory() {
		$resource = $this->client->directory();

		$this->assertInstanceOf(DirectoryResource::class, $resource);
	}

	public function testReports() {
		$resource = $this->client->reports();

		$this->assertInstanceOf(ReportResource::class, $resource);
	}

	public function testGetters() {
		$this->assertSame($this->httpClient, $this->client->getHttpClient());
		$this->assertSame($this->authentication, $this->client->getAuthentication());
		$this->assertSame($this->logger, $this->client->getLogger());
	}
}
