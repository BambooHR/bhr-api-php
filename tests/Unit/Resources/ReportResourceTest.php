<?php

namespace BambooHR\SDK\Tests\Unit\Resources;

use BambooHR\SDK\BambooHRClient;
use BambooHR\SDK\Resources\ReportResource;
use BambooHR\SDK\Model\Report;
use BambooHR\SDK\Model\CustomReport;
use PHPUnit\Framework\TestCase;

class ReportResourceTest extends TestCase {

	private ReportResource $resource;
	private BambooHRClient $client;

	protected function setUp(): void {
		$this->client = $this->createMock(BambooHRClient::class);
		$this->resource = new ReportResource($this->client);
	}

	public function testRequestCustomReport() {
		$reportData = [
			'title' => 'Test Report',
			'fields' => ['firstName', 'lastName', 'jobTitle']
		];

		$expectedEndpoint = 'reports/custom';
		$expectedHeaders = [
			'Accept' => 'application/json'
		];

		$apiResponse = [
			'title' => 'Test Report',
			'fields' => [
				['id' => 'firstName', 'name' => 'First Name'],
				['id' => 'lastName', 'name' => 'Last Name'],
				['id' => 'jobTitle', 'name' => 'Job Title']
			],
			'employees' => [
				[
					'id' => 123,
					'firstName' => 'John',
					'lastName' => 'Doe',
					'jobTitle' => 'Developer'
				],
				[
					'id' => 456,
					'firstName' => 'Jane',
					'lastName' => 'Smith',
					'jobTitle' => 'Manager'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with(
				$this->equalTo('POST'),
				$this->equalTo($expectedEndpoint),
				$this->callback(function ($options) use ($reportData, $expectedHeaders) {
					return isset($options['json']) && $options['json'] === $reportData &&
						   isset($options['headers']) && $options['headers'] === $expectedHeaders;
				})
			)
			->willReturn($apiResponse);

		$result = $this->resource->requestCustomReport($reportData);

		// Verify result is a Report object with correct data
		$this->assertInstanceOf(Report::class, $result);
		$this->assertEquals('Test Report', $result->title);
		
		// Verify fields
		$this->assertEquals($apiResponse['fields'], $result->fields);
		
		// Verify employees
		$this->assertEquals($apiResponse['employees'], $result->employees);
	}

	public function testGetStandardReport() {
		$reportId = '123';
		$params = ['format' => 'json'];

		$expectedEndpoint = 'reports/123?format=json';
		$expectedHeaders = [
			'Accept' => 'application/json'
		];

		$apiResponse = [
			'title' => 'Employee Directory',
			'employees' => [
				[
					'id' => 123,
					'name' => 'John Doe',
					'department' => 'Engineering'
				],
				[
					'id' => 456,
					'name' => 'Jane Smith',
					'department' => 'Marketing'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with(
				$this->equalTo('GET'),
				$this->equalTo($expectedEndpoint),
				$this->callback(function ($options) use ($expectedHeaders) {
					return isset($options['headers']) && $options['headers'] === $expectedHeaders;
				})
			)
			->willReturn($apiResponse);

		$result = $this->resource->getStandardReport($reportId, $params);

		// Verify result is a Report object with correct data
		$this->assertInstanceOf(Report::class, $result);
		$this->assertEquals('Employee Directory', $result->title);
		
		// Verify employees data
		$this->assertEquals($apiResponse['employees'], $result->employees);
	}

	public function testGetDataFromDataset() {
		$dataset = 'employees';
		$params = ['status' => 'active'];

		$expectedEndpoint = 'datasets/';
		$expectedHeaders = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json'
		];

		// Expected request parameters
		$expectedParams = [
			'datasetName' => 'employees',
			'status' => 'active'
		];

		$expectedResponse = [
			'employees' => [
				[
					'id' => 123,
					'firstName' => 'John',
					'lastName' => 'Doe'
				],
				[
					'id' => 456,
					'firstName' => 'Jane',
					'lastName' => 'Smith'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with(
				$this->equalTo('POST'),
				$this->equalTo($expectedEndpoint),
				$this->callback(function ($options) use ($expectedHeaders, $expectedParams) {
					return isset($options['headers']) && $options['headers'] === $expectedHeaders &&
						   isset($options['json']) && $options['json'] == $expectedParams; // == ignores order
				})
			)
			->willReturn($expectedResponse);

		$result = $this->resource->getDataFromDataset($dataset, $params);

		$this->assertEquals($expectedResponse, $result);
	}

	public function testGetReports() {
		$expectedEndpoint = 'reports';
		$expectedResponse = [
			'reports' => [
				[
					'id' => 'EmployeeDirectory',
					'name' => 'Employee Directory'
				],
				[
					'id' => 'EmployeeChanges',
					'name' => 'Employee Changes'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with('GET', $expectedEndpoint)
			->willReturn($expectedResponse);

		$result = $this->resource->getReports();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testGetDatasets() {
		$expectedEndpoint = 'datasets';
		$expectedHeaders = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json'
		];
		$expectedResponse = [
			'datasets' => [
				[
					'id' => 'employees',
					'name' => 'Employees'
				],
				[
					'id' => 'timeOff',
					'name' => 'Time Off'
				]
			]
		];

		$this->client->expects($this->once())
			->method('request')
			->with(
				$this->equalTo('GET'),
				$this->equalTo($expectedEndpoint),
				$this->callback(function ($options) use ($expectedHeaders) {
					return isset($options['headers']) && $options['headers'] === $expectedHeaders;
				})
			)
			->willReturn($expectedResponse);

		$result = $this->resource->getDatasets();

		$this->assertEquals($expectedResponse, $result);
	}
}
