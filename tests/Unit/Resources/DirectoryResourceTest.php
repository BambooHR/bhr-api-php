<?php

namespace BambooHR\SDK\Tests\Unit\Resources;

use BambooHR\SDK\BambooHRClient;
use BambooHR\SDK\Resources\DirectoryResource;
use PHPUnit\Framework\TestCase;

class DirectoryResourceTest extends TestCase {

	private DirectoryResource $resource;
	private BambooHRClient $client;

	protected function setUp(): void {
		$this->client = $this->createMock(BambooHRClient::class);
		$this->resource = new DirectoryResource($this->client);
	}

	public function testGetDirectory() {
		$expectedEndpoint = 'employees/directory';
		$expectedResponse = [
			'fields' => [
				[
					'id' => 'displayName',
					'type' => 'text',
					'name' => 'Display Name'
				],
				[
					'id' => 'firstName',
					'type' => 'text',
					'name' => 'First Name'
				]
			],
			'employees' => [
				[
					'id' => 123,
					'displayName' => 'John Doe',
					'firstName' => 'John',
					'lastName' => 'Doe'
				],
				[
					'id' => 456,
					'displayName' => 'Jane Smith',
					'firstName' => 'Jane',
					'lastName' => 'Smith'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with('GET', $expectedEndpoint)
			->willReturn($expectedResponse);

		$result = $this->resource->getDirectory();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testGetDirectoryEmployee() {
		$employeeId = 123;
		$directoryData = [
			'fields' => [
				[
					'id' => 'displayName',
					'type' => 'text',
					'name' => 'Display Name'
				]
			],
			'employees' => [
				[
					'id' => 123,
					'displayName' => 'John Doe',
					'firstName' => 'John',
					'lastName' => 'Doe'
				],
				[
					'id' => 456,
					'displayName' => 'Jane Smith',
					'firstName' => 'Jane',
					'lastName' => 'Smith'
				]
			]
		];

		$expectedEmployee = [
			'id' => 123,
			'displayName' => 'John Doe',
			'firstName' => 'John',
			'lastName' => 'Doe'
		];

		$this->client->expects($this->once())
			->method('request')
			->with('GET', 'employees/directory')
			->willReturn($directoryData);

		$result = $this->resource->getDirectoryEmployee($employeeId);

		$this->assertEquals($expectedEmployee, $result);
	}

	public function testGetDirectoryEmployeeNotFound() {
		$employeeId = 999;
		$directoryData = [
			'fields' => [
				[
					'id' => 'displayName',
					'type' => 'text',
					'name' => 'Display Name'
				]
			],
			'employees' => [
				[
					'id' => 123,
					'displayName' => 'John Doe',
					'firstName' => 'John',
					'lastName' => 'Doe'
				],
				[
					'id' => 456,
					'displayName' => 'Jane Smith',
					'firstName' => 'Jane',
					'lastName' => 'Smith'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with('GET', 'employees/directory')
			->willReturn($directoryData);

		$result = $this->resource->getDirectoryEmployee($employeeId);

		$this->assertNull($result);
	}

	public function testSearchDirectory() {
		$query = 'john';
		$directoryData = [
			'fields' => [
				[
					'id' => 'displayName',
					'type' => 'text',
					'name' => 'Display Name'
				],
				[
					'id' => 'firstName',
					'type' => 'text',
					'name' => 'First Name'
				]
			],
			'employees' => [
				[
					'id' => 123,
					'displayName' => 'John Doe',
					'firstName' => 'John',
					'lastName' => 'Doe',
					'jobTitle' => 'Developer'
				],
				[
					'id' => 456,
					'displayName' => 'Jane Smith',
					'firstName' => 'Jane',
					'lastName' => 'Smith',
					'jobTitle' => 'Manager'
				]
			]
		];

		$expectedResult = [
			'fields' => [
				[
					'id' => 'displayName',
					'type' => 'text',
					'name' => 'Display Name'
				],
				[
					'id' => 'firstName',
					'type' => 'text',
					'name' => 'First Name'
				]
			],
			'employees' => [
				[
					'id' => 123,
					'displayName' => 'John Doe',
					'firstName' => 'John',
					'lastName' => 'Doe',
					'jobTitle' => 'Developer'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with('GET', 'employees/directory')
			->willReturn($directoryData);

		$result = $this->resource->searchDirectory($query);

		$this->assertEquals($expectedResult, $result);
	}

	public function testSearchDirectoryNoResults() {
		$query = 'xyz';
		$directoryData = [
			'fields' => [
				[
					'id' => 'displayName',
					'type' => 'text',
					'name' => 'Display Name'
				]
			],
			'employees' => [
				[
					'id' => 123,
					'displayName' => 'John Doe',
					'firstName' => 'John',
					'lastName' => 'Doe'
				],
				[
					'id' => 456,
					'displayName' => 'Jane Smith',
					'firstName' => 'Jane',
					'lastName' => 'Smith'
				]
			]
		];

		$expectedResult = [
			'fields' => [
				[
					'id' => 'displayName',
					'type' => 'text',
					'name' => 'Display Name'
				]
			],
			'employees' => []
		];

		$this->client->expects($this->once())
			->method('request')
			->with('GET', 'employees/directory')
			->willReturn($directoryData);

		$result = $this->resource->searchDirectory($query);

		$this->assertEquals($expectedResult, $result);
	}
}
