<?php

namespace BambooHR\SDK\Tests\Unit\Resources;

use BambooHR\SDK\BambooHRClient;
use BambooHR\SDK\Resources\DirectoryResource;
use BambooHR\SDK\Model\DirectoryEntry;
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
		$apiResponse = [
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
			->willReturn($apiResponse);

		$result = $this->resource->getDirectory();

		// Verify fields are returned correctly
		$this->assertEquals($apiResponse['fields'], $result['fields']);

		// Verify employees are DirectoryEntry objects with correct data
		$this->assertCount(2, $result['employees']);
		$this->assertInstanceOf(DirectoryEntry::class, $result['employees'][0]);
		$this->assertInstanceOf(DirectoryEntry::class, $result['employees'][1]);

		// Verify first employee data
		$this->assertEquals(123, $result['employees'][0]->id);
		$this->assertEquals('John Doe', $result['employees'][0]->displayName);
		$this->assertEquals('John', $result['employees'][0]->firstName);
		$this->assertEquals('Doe', $result['employees'][0]->lastName);

		// Verify second employee data
		$this->assertEquals(456, $result['employees'][1]->id);
		$this->assertEquals('Jane Smith', $result['employees'][1]->displayName);
		$this->assertEquals('Jane', $result['employees'][1]->firstName);
		$this->assertEquals('Smith', $result['employees'][1]->lastName);
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

		$this->client->expects($this->once())
			->method('request')
			->with('GET', 'employees/directory')
			->willReturn($directoryData);

		$result = $this->resource->getDirectoryEmployee($employeeId);

		// Verify result is a DirectoryEntry object with correct data
		$this->assertInstanceOf(DirectoryEntry::class, $result);
		$this->assertEquals(123, $result->id);
		$this->assertEquals('John Doe', $result->displayName);
		$this->assertEquals('John', $result->firstName);
		$this->assertEquals('Doe', $result->lastName);
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

		$this->client->expects($this->once())
			->method('request')
			->with('GET', 'employees/directory')
			->willReturn($directoryData);

		$result = $this->resource->searchDirectory($query);

		// Verify fields are returned correctly
		$this->assertEquals($directoryData['fields'], $result['fields']);

		// Verify employees are DirectoryEntry objects with correct data
		$this->assertCount(1, $result['employees']);
		$this->assertInstanceOf(DirectoryEntry::class, $result['employees'][0]);

		// Verify employee data
		$this->assertEquals(123, $result['employees'][0]->id);
		$this->assertEquals('John Doe', $result['employees'][0]->displayName);
		$this->assertEquals('John', $result['employees'][0]->firstName);
		$this->assertEquals('Doe', $result['employees'][0]->lastName);
		$this->assertEquals('Developer', $result['employees'][0]->jobTitle);
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

		$this->client->expects($this->once())
			->method('request')
			->with('GET', 'employees/directory')
			->willReturn($directoryData);

		$result = $this->resource->searchDirectory($query);

		// Verify fields are returned correctly
		$this->assertEquals($directoryData['fields'], $result['fields']);

		// Verify employees array is empty
		$this->assertCount(0, $result['employees']);
		$this->assertEmpty($result['employees']);
	}
}
