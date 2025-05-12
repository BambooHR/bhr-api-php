<?php

namespace BambooHR\SDK\Tests\Unit\Model;

use BambooHR\SDK\Model\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase {

	private Employee $employee;

	protected function setUp(): void {
		$this->employee = new Employee();
	}

	public function testGettersAndSetters() {
		$this->employee
			->setId(123)
			->setFirstName('John')
			->setLastName('Doe')
			->setPreferredName('Johnny')
			->setJobTitle('Developer')
			->setWorkEmail('john.doe@example.com')
			->setWorkPhone('555-1234')
			->setMobilePhone('555-5678')
			->setDepartment('Engineering')
			->setLocation('New York')
			->setDivision('Technology')
			->setStatus('Active')
			->setHireDate('2023-01-15')
			->setTerminationDate(null)
			->setSupervisor('Jane Smith')
			->setPhotoUrl('https://example.com/photo.jpg')
			->setLinkedIn('https://linkedin.com/in/johndoe')
			->setCustomFields(['customField1' => 'value1']);

		$this->assertEquals(123, $this->employee->getId());
		$this->assertEquals('John', $this->employee->getFirstName());
		$this->assertEquals('Doe', $this->employee->getLastName());
		$this->assertEquals('Johnny', $this->employee->getPreferredName());
		$this->assertEquals('Johnny', $this->employee->getDisplayName());
		$this->assertEquals('Developer', $this->employee->getJobTitle());
		$this->assertEquals('john.doe@example.com', $this->employee->getWorkEmail());
		$this->assertEquals('555-1234', $this->employee->getWorkPhone());
		$this->assertEquals('555-5678', $this->employee->getMobilePhone());
		$this->assertEquals('Engineering', $this->employee->getDepartment());
		$this->assertEquals('New York', $this->employee->getLocation());
		$this->assertEquals('Technology', $this->employee->getDivision());
		$this->assertEquals('Active', $this->employee->getStatus());
		$this->assertEquals('2023-01-15', $this->employee->getHireDate());
		$this->assertNull($this->employee->getTerminationDate());
		$this->assertEquals('Jane Smith', $this->employee->getSupervisor());
		$this->assertEquals('https://example.com/photo.jpg', $this->employee->getPhotoUrl());
		$this->assertEquals('https://linkedin.com/in/johndoe', $this->employee->getLinkedIn());
		$this->assertEquals(['customField1' => 'value1'], $this->employee->getCustomFields());
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

		$this->assertEquals(123, $employee->getId());
		$this->assertEquals('John', $employee->getFirstName());
		$this->assertEquals('Doe', $employee->getLastName());
		$this->assertEquals('Developer', $employee->getJobTitle());
		$this->assertEquals('john.doe@example.com', $employee->getWorkEmail());
		$this->assertEquals('Engineering', $employee->getDepartment());
	}

	public function testToArray() {
		$this->employee
			->setId(123)
			->setFirstName('John')
			->setLastName('Doe')
			->setJobTitle('Developer');

		$array = $this->employee->toArray();

		$this->assertArrayHasKey('id', $array);
		$this->assertArrayHasKey('first_name', $array);
		$this->assertArrayHasKey('last_name', $array);
		$this->assertArrayHasKey('job_title', $array);

		$this->assertEquals(123, $array['id']);
		$this->assertEquals('John', $array['first_name']);
		$this->assertEquals('Doe', $array['last_name']);
		$this->assertEquals('Developer', $array['job_title']);
	}

	public function testGetFullNameWithDisplayName() {
		$this->employee
			->setFirstName('John')
			->setLastName('Doe')
			->setPreferredName('Johnny');

		$this->assertEquals('Johnny', $this->employee->getDisplayName());
		$this->assertEquals('John Doe', $this->employee->getFullName());
	}

	public function testGetFullNameWithoutDisplayName() {
		$this->employee
			->setFirstName('John')
			->setLastName('Doe');

		$this->assertEquals('John Doe', $this->employee->getFullName());
	}

	public function testGetFullNameWithOnlyFirstName() {
		$this->employee->setFirstName('John');

		$this->assertNull($this->employee->getFullName());
	}

	public function testGetFullNameWithOnlyLastName() {
		$this->employee->setLastName('Doe');

		$this->assertNull($this->employee->getFullName());
	}

	public function testGetCustomField() {
		$this->employee->setCustomFields([
			'customField1' => 'value1',
			'customField2' => 'value2'
		]);

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
			$this->employee->getCustomFields()
		);
	}
}
