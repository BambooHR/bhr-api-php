<?php

namespace BambooHR\SDK\Tests\Unit;

use BambooHR\SDK\Authentication\OAuthAuthentication;
use BambooHR\SDK\BambooHRBuilder;
use BambooHR\SDK\BambooHRClient;
use BambooHR\SDK\Http\HttpClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class BambooHRBuilderTest extends TestCase {

	public function testBuildWithRequiredParameters() {
		$builder = new BambooHRBuilder();
		$builder->withCompanyDomain('test-company');
		$builder->withOAuth('client-id', 'client-secret');

		$client = $builder->build();

		$this->assertInstanceOf(BambooHRClient::class, $client);
	}

	public function testBuildWithAllParameters() {
		$httpClient = $this->createMock(HttpClientInterface::class);
		$logger = $this->createMock(LoggerInterface::class);

		$builder = new BambooHRBuilder();
		$builder->withCompanyDomain('test-company');
		$builder->withOAuth('client-id', 'client-secret');
		$builder->withHttpClient($httpClient);
		$builder->withLogger($logger);
		$builder->withTimeout(60);
		$builder->withOptions(['custom_option' => 'value']);

		$client = $builder->build();

		$this->assertInstanceOf(BambooHRClient::class, $client);
	}

	public function testBuildWithCustomAuthentication() {
		$builder = new BambooHRBuilder();
		$builder->withCompanyDomain('test-company');
		$builder->withOAuth('client-id', 'client-secret');

		$client = $builder->build();

		$this->assertInstanceOf(BambooHRClient::class, $client);
	}

	public function testBuildWithoutCompanyDomainThrowsException() {
		$this->expectException(\InvalidArgumentException::class);

		$builder = new BambooHRBuilder();
		$builder->withOAuth('client-id', 'client-secret');

		$builder->build();
	}

	public function testBuildWithoutAuthenticationThrowsException() {
		$this->expectException(\InvalidArgumentException::class);

		$builder = new BambooHRBuilder();
		$builder->withCompanyDomain('test-company');

		$builder->build();
	}

	public function testFluentInterface() {
		$httpClient = $this->createMock(HttpClientInterface::class);
		$logger = $this->createMock(LoggerInterface::class);

		$builder = new BambooHRBuilder();
		$result = $builder
			->withCompanyDomain('test-company')
			->withOAuth('client-id', 'client-secret')
			->withHttpClient($httpClient)
			->withLogger($logger)
			->withTimeout(60)
			->withOptions(['custom_option' => 'value']);

		$this->assertSame($builder, $result);
	}
}
