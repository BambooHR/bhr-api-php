<?php

namespace BambooHR\SDK\Tests\Unit\Resources;

use BambooHR\SDK\BambooHRClient;
use BambooHR\SDK\Resources\EmployeeResource;
use BambooHR\SDK\Model\Employee;
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

		$this->assertInstanceOf(Employee::class, $result);
		$this->assertEquals($employeeId, $result->id);
		$this->assertEquals('John', $result->firstName);
		$this->assertEquals('Doe', $result->lastName);
		$this->assertEquals('Developer', $result->jobTitle);
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

		$this->assertInstanceOf(Employee::class, $result);
		$this->assertEquals($employeeId, $result->id);
		$this->assertEquals('John', $result->firstName);
		$this->assertEquals('Doe', $result->lastName);
	}

	public function testAddEmployee() {
		$employee = new Employee();
		$employee->firstName = 'Jane';
		$employee->lastName = 'Smith';
		$employee->jobTitle = 'Manager';

		$expectedResponse = [
			'id' => 456,
			'firstName' => 'Jane',
			'lastName' => 'Smith'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with(
						 $this->equalTo('POST'),
						 $this->equalTo('employees'),
						 $this->callback(function ($options) {
							 return isset($options['json']);
						 })
					 )
					 ->willReturn($expectedResponse);

		$result = $this->resource->addEmployee($employee);

		$this->assertInstanceOf(Employee::class, $result);
		$this->assertEquals(456, $result->id);
		$this->assertEquals('Jane', $result->firstName);
		$this->assertEquals('Smith', $result->lastName);
	}

	public function testUpdateEmployee() {
		$employeeId = 123;
		$employee = new Employee();
		$employee->jobTitle = 'Senior Developer';

		$expectedResponse = [
			'id' => $employeeId,
			'firstName' => 'John',
			'lastName' => 'Doe',
			'jobTitle' => 'Senior Developer'
		];

		// Test with default parameter (returns model)
		$this->client->expects($this->once())
					 ->method('request')
					 ->with(
						 $this->equalTo('POST'),
						 $this->equalTo("employees/{$employeeId}"),
						 $this->callback(function ($options) {
							 return isset($options['json']);
						 })
					 )
					 ->willReturn($expectedResponse);

		$result = $this->resource->updateEmployee($employeeId, $employee);

		$this->assertInstanceOf(Employee::class, $result);
		$this->assertEquals($employeeId, $result->id);
		$this->assertEquals('John', $result->firstName);
		$this->assertEquals('Doe', $result->lastName);
		$this->assertEquals('Senior Developer', $result->jobTitle);
	}
	
	/**
	 * Test updateEmployee with asArray parameter
	 */
	public function testUpdateEmployeeAsArray() {
		$employeeId = 123;
		$employee = new Employee();
		$employee->jobTitle = 'Senior Developer';

		$expectedResponse = [
			'id' => $employeeId,
			'first_name' => 'John',
			'last_name' => 'Doe',
			'job_title' => 'Senior Developer'
		];

		$this->client->expects($this->once())
					 ->method('request')
					 ->with(
						 $this->equalTo('POST'),
						 $this->equalTo("employees/{$employeeId}"),
						 $this->callback(function ($options) {
							 return isset($options['json']);
						 })
					 )
					 ->willReturn($expectedResponse);

		// Test with asArray=true parameter (returns array)
		$resultArray = $this->resource->updateEmployee($employeeId, $employee, true);
		
		$this->assertIsArray($resultArray);
		$this->assertEquals($employeeId, $resultArray['id']);
		$this->assertEquals('John', $resultArray['first_name']);
		$this->assertEquals('Doe', $resultArray['last_name']);
		$this->assertEquals('Senior Developer', $resultArray['job_title']);
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



	protected function setUp(): void {
		$this->client = $this->createMock(BambooHRClient::class);
		$this->resource = new EmployeeResource($this->client);
	}
}
