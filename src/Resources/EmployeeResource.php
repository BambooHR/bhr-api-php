<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Model\Employee;

/**
 * Resource for interacting with employee-related endpoints.
 */
class EmployeeResource extends AbstractResource {

	/**
	 * Get employee data by ID.
	 *
	 * @param int   $employeeId Employee ID (use 0 for the current user)
	 * @param array $fields     List of fields to retrieve
	 * @return array Employee data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 */
	public function getEmployee(int $employeeId, array $fields = []): array {
		if ($employeeId < 0) {
			throw new \InvalidArgumentException('Employee ID must be a non-negative integer');
		}

		if (empty($fields)) {
			$fields = ['firstName', 'lastName', 'jobTitle', 'workEmail', 'department'];
		}

		$fieldList = implode(',', $fields);
		$endpoint = "employees/{$employeeId}/?fields={$fieldList}";

		return $this->get($endpoint);
	}

	/**
	 * Get all employees with specified fields.
	 *
	 * @param array $fields List of fields to retrieve
	 * @return array List of employees
	 * @throws BambooHRException If the request fails
	 */
	public function getAllEmployees(array $fields = []): array {
		if (empty($fields)) {
			$fields = ['id', 'firstName', 'lastName', 'workEmail', 'jobTitle', 'department'];
		}

		// Using the report API to get all employees is more efficient
		return $this->client->reports()->requestCustomReport([
			'title' => 'All Employees',
			'fields' => $fields
		]);
	}

	/**
	 * Add a new employee.
	 *
	 * @param array $employeeData Employee data
	 * @return array Created employee data
	 * @throws BambooHRException If the request fails
	 * @throws \InvalidArgumentException If required fields are missing
	 */
	public function addEmployee(array $employeeData): array {
		// Validate required fields
		$this->validateRequiredParams($employeeData, ['firstName', 'lastName']);

		return $this->post('employees/', $employeeData);
	}

	/**
	 * Update an employee.
	 *
	 * @param int   $employeeId   Employee ID
	 * @param array $employeeData Employee data to update
	 * @return array Updated employee data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 * @throws \InvalidArgumentException If employee ID is invalid
	 */
	public function updateEmployee(int $employeeId, array $employeeData): array {
		if ($employeeId <= 0) {
			throw new \InvalidArgumentException('Employee ID must be a positive integer');
		}

		if (empty($employeeData)) {
			throw new \InvalidArgumentException('Employee data cannot be empty');
		}

		return $this->post("employees/{$employeeId}", $employeeData);
	}

	/**
	 * Get employee table data.
	 *
	 * @param int    $employeeId Employee ID
	 * @param string $table      Table name (e.g., 'jobInfo', 'compensation', etc.)
	 * @return array Table data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee or table is not found
	 * @throws \InvalidArgumentException If employee ID or table name is invalid
	 */
	public function getEmployeeTable(int $employeeId, string $table): array {
		if ($employeeId <= 0) {
			throw new \InvalidArgumentException('Employee ID must be a positive integer');
		}

		if (empty($table)) {
			throw new \InvalidArgumentException('Table name cannot be empty');
		}

		return $this->get("employees/{$employeeId}/tables/{$table}");
	}

	/**
	 * Add a row to an employee table.
	 *
	 * @param int    $employeeId Employee ID
	 * @param string $table      Table name
	 * @param array  $rowData    Row data
	 * @return array Added row data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee or table is not found
	 * @throws \InvalidArgumentException If parameters are invalid
	 */
	public function addTableRow(int $employeeId, string $table, array $rowData): array {
		if ($employeeId <= 0) {
			throw new \InvalidArgumentException('Employee ID must be a positive integer');
		}

		if (empty($table)) {
			throw new \InvalidArgumentException('Table name cannot be empty');
		}

		if (empty($rowData)) {
			throw new \InvalidArgumentException('Row data cannot be empty');
		}

		return $this->post("employees/{$employeeId}/tables/{$table}", $rowData);
	}

	/**
	 * Update a row in an employee table.
	 *
	 * @param int    $employeeId Employee ID
	 * @param string $table      Table name
	 * @param int    $rowId      Row ID
	 * @param array  $rowData    Row data
	 * @return array Updated row data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee, table, or row is not found
	 * @throws \InvalidArgumentException If parameters are invalid
	 */
	public function updateTableRow(int $employeeId, string $table, int $rowId, array $rowData): array {
		if ($employeeId <= 0) {
			throw new \InvalidArgumentException('Employee ID must be a positive integer');
		}

		if (empty($table)) {
			throw new \InvalidArgumentException('Table name cannot be empty');
		}

		if ($rowId <= 0) {
			throw new \InvalidArgumentException('Row ID must be a positive integer');
		}

		if (empty($rowData)) {
			throw new \InvalidArgumentException('Row data cannot be empty');
		}

		return $this->put("employees/{$employeeId}/tables/{$table}/{$rowId}", $rowData);
	}

	/**
	 * Get all available employee fields.
	 *
	 * @return array List of available fields
	 * @throws BambooHRException If the request fails
	 */
	public function getFields(): array {
		return $this->get('meta/fields');
	}

	/**
	 * Get an employee as a model object.
	 *
	 * @param int   $employeeId Employee ID
	 * @param array $fields     List of fields to retrieve
	 * @return Employee Employee model
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 */
	public function getEmployeeModel(int $employeeId, array $fields = []): Employee {
		$data = $this->getEmployee($employeeId, $fields);
		return Employee::fromArray($data);
	}

	/**
	 * Get employee photo.
	 *
	 * @param int    $employeeId Employee ID
	 * @param string $size       Photo size (small, medium, large, original)
	 * @return string Photo data (binary)
	 * @throws BambooHRException If the request fails
	 */
	public function getPhoto(int $employeeId, string $size = 'original'): string {
		$options = [
			'headers' => [
				'Accept' => 'application/octet-stream'
			]
		];

		return $this->get("employees/{$employeeId}/photo/{$size}", $options);
	}

	/**
	 * Upload employee photo.
	 *
	 * @param int    $employeeId Employee ID
	 * @param string $photoData  Binary photo data
	 * @return array Response data
	 * @throws BambooHRException If the request fails
	 */
	public function uploadPhoto(int $employeeId, string $photoData): array {
		$options = [
			'headers' => [
				'Content-Type' => 'image/jpeg'
			],
			'body' => $photoData
		];

		return $this->post("employees/{$employeeId}/photo", [], $options);
	}
}
