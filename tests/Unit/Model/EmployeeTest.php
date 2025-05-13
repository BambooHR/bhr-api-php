<?php

namespace BambooHR\SDK\Tests\Unit\Model;

use BambooHR\SDK\Model\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase {

	private Employee $employee;

	protected function setUp(): void {
		$this->employee = new Employee();
	}

	public function testPublicProperties() {
		$this->employee->id = 123;
		$this->employee->firstName = 'John';
		$this->employee->lastName = 'Doe';
		$this->employee->preferredName = 'Johnny';
		$this->employee->jobTitle = 'Developer';
		$this->employee->workEmail = 'john.doe@example.com';
		$this->employee->workPhone = '555-1234';
		$this->employee->mobilePhone = '555-5678';
		$this->employee->department = 'Engineering';
		$this->employee->location = 'New York';
		$this->employee->division = 'Technology';
		$this->employee->status = 'Active';
		$this->employee->hireDate = '2023-01-15';
		$this->employee->terminationDate = null;
		$this->employee->supervisor = 'Jane Smith';
		$this->employee->photoUrl = 'https://example.com/photo.jpg';
		$this->employee->linkedIn = 'https://linkedin.com/in/johndoe';
		$this->employee->customFields = ['customField1' => 'value1'];

		$this->assertEquals(123, $this->employee->id);
		$this->assertEquals('John', $this->employee->firstName);
		$this->assertEquals('Doe', $this->employee->lastName);
		$this->assertEquals('Johnny', $this->employee->preferredName);
		$this->assertEquals('Johnny', $this->employee->getDisplayName());
		$this->assertEquals('Developer', $this->employee->jobTitle);
		$this->assertEquals('john.doe@example.com', $this->employee->workEmail);
		$this->assertEquals('555-1234', $this->employee->workPhone);
		$this->assertEquals('555-5678', $this->employee->mobilePhone);
		$this->assertEquals('Engineering', $this->employee->department);
		$this->assertEquals('New York', $this->employee->location);
		$this->assertEquals('Technology', $this->employee->division);
		$this->assertEquals('Active', $this->employee->status);
		$this->assertEquals('2023-01-15', $this->employee->hireDate);
		$this->assertNull($this->employee->terminationDate);
		$this->assertEquals('Jane Smith', $this->employee->supervisor);
		$this->assertEquals('https://example.com/photo.jpg', $this->employee->photoUrl);
		$this->assertEquals('https://linkedin.com/in/johndoe', $this->employee->linkedIn);
		$this->assertEquals(['customField1' => 'value1'], $this->employee->customFields);
	}

	public function testFromArray() {
		$data = [
			'id' => 123,
			'firstName' => 'John',
			'lastName' => 'Doe',
			'jobTitle' => 'Developer',
			'workEmail' => 'john.doe@example.com',
			'department' => 'Engineering'
		];

		$employee = Employee::fromArray($data);

		$this->assertEquals(123, $employee->id);
		$this->assertEquals('John', $employee->firstName);
		$this->assertEquals('Doe', $employee->lastName);
		$this->assertEquals('Developer', $employee->jobTitle);
		$this->assertEquals('john.doe@example.com', $employee->workEmail);
		$this->assertEquals('Engineering', $employee->department);
	}

	public function testToArray() {
		$this->employee->id = 123;
		$this->employee->firstName = 'John';
		$this->employee->lastName = 'Doe';
		$this->employee->jobTitle = 'Developer';

		$array = $this->employee->toArray();

		$this->assertArrayHasKey('id', $array);
		$this->assertArrayHasKey('firstName', $array);
		$this->assertArrayHasKey('lastName', $array);
		$this->assertArrayHasKey('jobTitle', $array);

		$this->assertEquals(123, $array['id']);
		$this->assertEquals('John', $array['firstName']);
		$this->assertEquals('Doe', $array['lastName']);
		$this->assertEquals('Developer', $array['jobTitle']);
	}

	public function testGetFullNameWithDisplayName() {
		$this->employee->firstName = 'John';
		$this->employee->lastName = 'Doe';
		$this->employee->preferredName = 'Johnny';

		$this->assertEquals('Johnny', $this->employee->getDisplayName());
		$this->assertEquals('John Doe', $this->employee->getFullName());
	}

	public function testGetFullNameWithoutDisplayName() {
		$this->employee->firstName = 'John';
		$this->employee->lastName = 'Doe';

		$this->assertEquals('John Doe', $this->employee->getFullName());
	}

	public function testGetFullNameWithOnlyFirstName() {
		$this->employee->firstName = 'John';

		$this->assertNull($this->employee->getFullName());
	}

	public function testGetFullNameWithOnlyLastName() {
		$this->employee->lastName = 'Doe';

		$this->assertNull($this->employee->getFullName());
	}

	public function testGetCustomField() {
		$this->employee->customFields = [
			'customField1' => 'value1',
			'customField2' => 'value2'
		];

		$this->assertEquals('value1', $this->employee->getCustomField('customField1'));
		$this->assertEquals('value2', $this->employee->getCustomField('customField2'));
		$this->assertNull($this->employee->getCustomField('nonExistentField'));
	}

	public function testSetCustomField() {
		$this->employee->setCustomField('customField1', 'value1');
		$this->employee->setCustomField('customField2', 'value2');

		$this->assertEquals('value1', $this->employee->getCustomField('customField1'));
		$this->assertEquals('value2', $this->employee->getCustomField('customField2'));

		$this->assertEquals(
			['customField1' => 'value1', 'customField2' => 'value2'],
			$this->employee->customFields
		);
	}
}
