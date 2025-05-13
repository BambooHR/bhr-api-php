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
	 * @return Employee Employee data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 */
	/**
	 * Get employee data by ID.
	 *
	 * @param int   $employeeId Employee ID (use 0 for the current user)
	 * @param array $fields     List of fields to retrieve
	 * @param bool  $asArray    Whether to return data as an array instead of a model
	 * @return Employee|array   Employee data as a model or array
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 */
	public function getEmployee(int $employeeId, array $fields = [], bool $asArray = false): Employee|array {
		if (empty($fields)) {
			$fields = ['firstName', 'lastName', 'jobTitle', 'workEmail', 'department'];
		}

		$fieldList = implode(',', $fields);
		$endpoint = "employees/{$employeeId}/?fields={$fieldList}";

		$response = $this->get($endpoint);
		
		// Return as array if requested
		if ($asArray) {
			// Ensure we have an array response
			if (!is_array($response)) {
				return ['id' => $employeeId];
			}
			return $response;
		}
		
		// Return as model
		$fallback = new Employee();
		$fallback->id = $employeeId;
		return $this->safelyConvertResponseToModel($response, Employee::class, $fallback);
	}

	/**
	 * Get all employees with specified fields.
	 *
	 * @param array $fields List of fields to retrieve
	 * @return Employee[] List of employees
	 * @throws BambooHRException If the request fails
	 */
	/**
	 * Get all employees with specified fields.
	 *
	 * @param array $fields  List of fields to retrieve
	 * @param bool  $asArray Whether to return data as arrays instead of models
	 * @return array         List of employees as models or arrays
	 * @throws BambooHRException If the request fails
	 */
	public function getAllEmployees(array $fields = [], bool $asArray = false): array {
		if (empty($fields)) {
			$fields = ['id', 'firstName', 'lastName', 'workEmail', 'jobTitle', 'department'];
		}

		$fieldList = implode(',', $fields);
		$endpoint = "employees/directory?fields={$fieldList}";

		$response = $this->get($endpoint);

		if (!is_array($response) || !isset($response['employees']) || !is_array($response['employees'])) {
			return [];
		}

		$employeesArray = $response['employees'];

		// Return as array if requested
		if ($asArray) {
			return $employeesArray;
		}

		// Return as models
		$employees = [];
		foreach ($employeesArray as $employeeData) {
			$employees[] = Employee::fromArray($employeeData);
		}

		return $employees;
	}

	/**
	 * Add a new employee.
	 *
	 * @param Employee $employee Employee object
	 * @return Employee Created employee data
	 * @throws BambooHRException If the request fails
	 */
	/**
	 * Add a new employee.
	 *
	 * @param Employee|array $employee  Employee data as model or array
	 * @param bool           $asArray   Whether to return data as an array instead of a model
	 * @return Employee|array           Created employee data as a model or array
	 * @throws BambooHRException If the request fails
	 */
	public function addEmployee(Employee|array $employee, bool $asArray = false): Employee|array {
		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		// Convert to array if needed
		$employeeData = $employee instanceof Employee ? $employee->toArray() : $employee;
		
		$response = $this->post('employees', $employeeData, $options);
		
		// Return as array if requested
		if ($asArray) {
			// Ensure we have an array response
			if (!is_array($response)) {
				return $employeeData; // Return original data if API returns a string
			}
			return $response;
		}
		
		// Return as model
		$fallback = $employee instanceof Employee ? $employee : new Employee();
		return $this->safelyConvertResponseToModel($response, Employee::class, $fallback);
	}

	/**
	 * Update an employee.
	 *
	 * @param int      $employeeId Employee ID
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 */
	public function updateEmployee(int $employeeId, Employee|array $employee, bool $asArray = false): Employee|array {
		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		// Convert to array if needed
		$employeeData = $employee instanceof Employee ? $employee->toArray() : $employee;
		
		$response = $this->post("employees/$employeeId", $employeeData, $options);

		// Return as array if requested
		if ($asArray) {
			// Ensure we have an array response
			if (!is_array($response)) {
				// Add ID to the original data if API returns a string
				$employeeData['id'] = $employeeId;
				return $employeeData;
			}
			return $response;
		}
		
		// Return as model
		$fallback = $employee instanceof Employee ? $employee : new Employee();
		if ($fallback->id === null) {
			$fallback->id = $employeeId;
		}
		return $this->safelyConvertResponseToModel($response, Employee::class, $fallback);
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
