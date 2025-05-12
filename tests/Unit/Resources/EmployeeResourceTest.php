<?php

namespace BambooHR\SDK\Tests\Unit\Resources;

use BambooHR\SDK\BambooHRClient;
use BambooHR\SDK\Resources\EmployeeResource;
use PHPUnit\Framework\TestCase;

class EmployeeResourceTest extends TestCase {

	private EmployeeResource $resource;
	private BambooHRClient $client;

	public function testGetEmployee() {
		$employeeId = 123;
		$fields = ['firstName', 'lastName', 'jobTitle'];
		$expectedEndpoint = "employees/$employeeId/?fields=firstName,lastName,jobTitle";
		$expectedResponse = [
			'id' => $employeeId,
			'firstName' => 'John',
			'lastName' => 'Doe',
			'jobTitle' => 'Developer'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with('GET', $expectedEndpoint)
					 ->willReturn($expectedResponse);

		$result = $this->resource->getEmployee($employeeId, $fields);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testGetEmployeeWithDefaultFields() {
		$employeeId = 123;
		$expectedFields = ['firstName', 'lastName', 'jobTitle', 'workEmail', 'department'];
		$expectedEndpoint = "employees/{$employeeId}/?fields=firstName,lastName,jobTitle,workEmail,department";
		$expectedResponse = [
			'id' => $employeeId,
			'firstName' => 'John',
			'lastName' => 'Doe'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with('GET', $expectedEndpoint)
					 ->willReturn($expectedResponse);

		$result = $this->resource->getEmployee($employeeId);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testAddEmployee() {
		$employeeData = [
			'firstName' => 'Jane',
			'lastName' => 'Smith',
			'jobTitle' => 'Manager'
		];
		$expectedResponse = [
			'id' => 456,
			'firstName' => 'Jane',
			'lastName' => 'Smith'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with(
						 $this->equalTo('POST'),
						 $this->equalTo('employees/'),
						 $this->callback(function ($options) use ($employeeData) {
							 return isset($options['json']) && $options['json'] === $employeeData;
						 })
					 )
					 ->willReturn($expectedResponse);

		$result = $this->resource->addEmployee($employeeData);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testUpdateEmployee() {
		$employeeId = 123;
		$employeeData = [
			'jobTitle' => 'Senior Developer'
		];
		$expectedResponse = [
			'id' => $employeeId,
			'firstName' => 'John',
			'lastName' => 'Doe',
			'jobTitle' => 'Senior Developer'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with(
						 $this->equalTo('POST'),
						 $this->equalTo("employees/{$employeeId}"),
						 $this->callback(function ($options) use ($employeeData) {
							 return isset($options['json']) && $options['json'] === $employeeData;
						 })
					 )
					 ->willReturn($expectedResponse);

		$result = $this->resource->updateEmployee($employeeId, $employeeData);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testGetEmployeeTable() {
		$employeeId = 123;
		$table = 'jobInfo';
		$expectedEndpoint = "employees/{$employeeId}/tables/{$table}";
		$expectedResponse = [
			'table' => 'jobInfo',
			'rows' => [
				[
					'id' => 1,
					'jobTitle' => 'Developer',
					'department' => 'Engineering'
				]
			]
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with('GET', $expectedEndpoint)
					 ->willReturn($expectedResponse);

		$result = $this->resource->getEmployeeTable($employeeId, $table);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testAddTableRow() {
		$employeeId = 123;
		$table = 'jobInfo';
		$rowData = [
			'jobTitle' => 'Senior Developer',
			'department' => 'Engineering'
		];
		$expectedEndpoint = "employees/{$employeeId}/tables/{$table}";
		$expectedResponse = [
			'id' => 2,
			'jobTitle' => 'Senior Developer',
			'department' => 'Engineering'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with(
						 $this->equalTo('POST'),
						 $this->equalTo($expectedEndpoint),
						 $this->callback(function ($options) use ($rowData) {
							 return isset($options['json']) && $options['json'] === $rowData;
						 })
					 )
					 ->willReturn($expectedResponse);

		$result = $this->resource->addTableRow($employeeId, $table, $rowData);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testUpdateTableRow() {
		$employeeId = 123;
		$table = 'jobInfo';
		$rowId = 2;
		$rowData = [
			'jobTitle' => 'Lead Developer'
		];
		$expectedEndpoint = "employees/{$employeeId}/tables/{$table}/{$rowId}";
		$expectedResponse = [
			'id' => $rowId,
			'jobTitle' => 'Lead Developer',
			'department' => 'Engineering'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with(
						 $this->equalTo('PUT'),
						 $this->equalTo($expectedEndpoint),
						 $this->callback(function ($options) use ($rowData) {
							 return isset($options['json']) && $options['json'] === $rowData;
						 })
					 )
					 ->willReturn($expectedResponse);

		$result = $this->resource->updateTableRow($employeeId, $table, $rowId, $rowData);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testGetFields() {
		$expectedEndpoint = 'meta/fields';
		$expectedResponse = [
			'fields' => [
				[
					'id' => 'firstName',
					'name' => 'First Name',
					'type' => 'text'
				],
				[
					'id' => 'lastName',
					'name' => 'Last Name',
					'type' => 'text'
				]
			]
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with('GET', $expectedEndpoint)
					 ->willReturn($expectedResponse);

		$result = $this->resource->getFields();

		$this->assertEquals($expectedResponse, $result);
	}

	protected function setUp(): void {
		$this->client = $this->createMock(BambooHRClient::class);
		$this->resource = new EmployeeResource($this->client);
	}
}
