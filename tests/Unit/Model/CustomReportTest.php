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

		$this->assertEquals('Test Report', $report->getTitle());
		$this->assertEquals(['firstName', 'lastName'], $report->getFields());
	}

	public function testGettersAndSetters() {
		$this->report
			->setTitle('Updated Report')
			->setFields(['id', 'firstName', 'lastName'])
			->setFilterBy([
				['field' => 'status', 'operator' => '=', 'value' => 'Active']
			])
			->setFormat('json')
			->setLastChanged('2023-01-01');

		$this->assertEquals('Updated Report', $this->report->getTitle());
		$this->assertEquals(['id', 'firstName', 'lastName'], $this->report->getFields());
		$this->assertEquals([
			['field' => 'status', 'operator' => '=', 'value' => 'Active']
		], $this->report->getFilterBy());
		$this->assertEquals('json', $this->report->getFormat());
		$this->assertEquals('2023-01-01', $this->report->getLastChanged());
	}

	public function testAddField() {
		$this->report->setFields(['firstName']);
		$this->report->addField('lastName');
		$this->report->addField('jobTitle');

		$this->assertEquals(['firstName', 'lastName', 'jobTitle'], $this->report->getFields());

		// Adding a duplicate field should not add it again
		$this->report->addField('lastName');

		$this->assertEquals(['firstName', 'lastName', 'jobTitle'], $this->report->getFields());
	}

	public function testAddFilter() {
		$this->report->addFilter('status', '=', 'Active');
		$this->report->addFilter('department', '=', 'Engineering');

		$expectedFilters = [
			['field' => 'status', 'operator' => '=', 'value' => 'Active'],
			['field' => 'department', 'operator' => '=', 'value' => 'Engineering']
		];

		$this->assertEquals($expectedFilters, $this->report->getFilterBy());
	}

	public function testToArray() {
		$this->report
			->setTitle('Test Report')
			->setFields(['firstName', 'lastName'])
			->addFilter('status', '=', 'Active')
			->setFormat('json');

		$array = $this->report->toArray();

		$this->assertArrayHasKey('title', $array);
		$this->assertArrayHasKey('fields', $array);
		$this->assertArrayHasKey('filter_by', $array);
		$this->assertArrayHasKey('format', $array);

		$this->assertEquals('Test Report', $array['title']);
		$this->assertEquals(['firstName', 'lastName'], $array['fields']);
		$this->assertEquals([
			['field' => 'status', 'operator' => '=', 'value' => 'Active']
		], $array['filter_by']);
		$this->assertEquals('json', $array['format']);
	}
}
