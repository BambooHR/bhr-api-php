<?php

namespace BambooHR\SDK\Tests\Unit\Model;

use BambooHR\SDK\Model\CustomReport;
use PHPUnit\Framework\TestCase;

class CustomReportTest extends TestCase {

	private CustomReport $report;

	protected function setUp(): void {
		$this->report = new CustomReport('Test Report');
	}

	public function testConstructor() {
		$report = new CustomReport('Test Report', ['firstName', 'lastName']);

		$this->assertEquals('Test Report', $report->title);
		$this->assertEquals(['firstName', 'lastName'], $report->fields);
	}

	public function testPublicProperties() {
		$this->report->title = 'Updated Report';
		$this->report->fields = ['id', 'firstName', 'lastName'];
		$this->report->filterBy = [
			['field' => 'status', 'operator' => '=', 'value' => 'Active']
		];
		$this->report->format = 'json';
		$this->report->lastChanged = '2023-01-01';

		$this->assertEquals('Updated Report', $this->report->title);
		$this->assertEquals(['id', 'firstName', 'lastName'], $this->report->fields);
		$this->assertEquals([
			['field' => 'status', 'operator' => '=', 'value' => 'Active']
		], $this->report->filterBy);
		$this->assertEquals('json', $this->report->format);
		$this->assertEquals('2023-01-01', $this->report->lastChanged);
	}

	public function testAddField() {
		$this->report->fields = ['firstName'];
		$this->report->addField('lastName');
		$this->report->addField('jobTitle');

		$this->assertEquals(['firstName', 'lastName', 'jobTitle'], $this->report->fields);

		// Adding a duplicate field should not add it again
		$this->report->addField('lastName');

		$this->assertEquals(['firstName', 'lastName', 'jobTitle'], $this->report->fields);
	}

	public function testAddFilter() {
		$this->report->addFilter('status', '=', 'Active');
		$this->report->addFilter('department', '=', 'Engineering');

		$expectedFilters = [
			['field' => 'status', 'operator' => '=', 'value' => 'Active'],
			['field' => 'department', 'operator' => '=', 'value' => 'Engineering']
		];

		$this->assertEquals($expectedFilters, $this->report->filterBy);
	}

	public function testToArray() {
		$this->report->title = 'Test Report';
		$this->report->fields = ['firstName', 'lastName'];
		$this->report->addFilter('status', '=', 'Active');
		$this->report->format = 'json';

		$array = $this->report->toArray();

		$this->assertArrayHasKey('title', $array);
		$this->assertArrayHasKey('fields', $array);
		$this->assertArrayHasKey('filterBy', $array);
		$this->assertArrayHasKey('format', $array);

		$this->assertEquals('Test Report', $array['title']);
		$this->assertEquals(['firstName', 'lastName'], $array['fields']);
		$this->assertEquals([
			['field' => 'status', 'operator' => '=', 'value' => 'Active']
		], $array['filterBy']);
		$this->assertEquals('json', $array['format']);
	}
}
