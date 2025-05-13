<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Model\DirectoryEntry;

/**
 * Resource for interacting with company directory endpoints.
 */
class DirectoryResource extends AbstractResource {

	/**
	 * Get the company directory.
	 *
	 * @param bool $asArray Whether to return employees as arrays instead of model objects
	 * @return array Directory data with 'fields' and 'employees' keys
	 * @throws BambooHRException If the request fails
	 */
	public function getDirectory(bool $asArray = false): array {
		$response = $this->get('employees/directory');

		// Ensure we have a properly formatted response
		if (!is_array($response) || !isset($response['employees']) || !isset($response['fields'])) {
			throw new BambooHRException('Invalid directory response format');
		}

		// Return employees as arrays if requested
		if ($asArray) {
			return $response;
		}

		// Convert employees to model objects
		$employees = [];
		foreach ($response['employees'] as $employeeData) {
			$employees[] = DirectoryEntry::fromArray($employeeData);
		}

		return [
			'fields' => $response['fields'],
			'employees' => $employees
		];
	}

	/**
	 * Get a specific employee from the directory.
	 *
	 * @param int  $employeeId Employee ID
	 * @param bool $asArray    Whether to return employee as an array instead of a model object
	 * @return DirectoryEntry|array|null Employee directory entry, array, or null if not found
	 * @throws BambooHRException If the request fails
	 */
	public function getDirectoryEmployee(int $employeeId, bool $asArray = false): DirectoryEntry|array|null {
		$directory = $this->getDirectory($asArray);

		if (!isset($directory['employees']) || !is_array($directory['employees'])) {
			return null;
		}

		foreach ($directory['employees'] as $employee) {
			// Check ID based on whether we're working with arrays or models
			$employeeId1 = $asArray ? $employee['id'] : $employee->id;
			if ($employeeId1 === $employeeId) {
				return $employee;
			}
		}

		return null;
	}

	/**
	 * Search the company directory for employees matching a query.
	 *
	 * @param string $query    Search query
	 * @param bool   $asArray  Whether to return employees as arrays instead of model objects
	 * @return array Filtered directory data
	 * @throws BambooHRException If the request fails
	 */
	public function searchDirectory(string $query, bool $asArray = false): array {
		$directory = $this->getDirectory($asArray);
		$query = strtolower(trim($query));

		if (empty($query)) {
			return $directory;
		}

		$filteredEmployees = [];
		foreach ($directory['employees'] as $employee) {
			// Search in various fields based on whether we're working with arrays or models
			if ($asArray) {
				$searchableText = strtolower(
					($employee['display_name'] ?? '') . ' ' .
					($employee['first_name'] ?? '') . ' ' .
					($employee['last_name'] ?? '') . ' ' .
					($employee['job_title'] ?? '') . ' ' .
					($employee['department'] ?? '')
				);
			} else {
				$searchableText = strtolower(
					$employee->displayName . ' ' .
					$employee->firstName . ' ' .
					$employee->lastName . ' ' .
					($employee->jobTitle ?? '') . ' ' .
					($employee->department ?? '')
				);
			}

			if (strpos($searchableText, $query) !== false) {
				$filteredEmployees[] = $employee;
			}
		}

		return [
			'fields' => $directory['fields'],
			'employees' => $filteredEmployees
		];
	}

	/**
	 * Get employees by department.
	 *
	 * @param string $department Department name
	 * @return array Employees in the specified department
	 * @throws BambooHRException If the request fails
	 */
	public function getEmployeesByDepartment(string $department): array {
		if (empty(trim($department))) {
			throw new \InvalidArgumentException('Department name cannot be empty');
		}

		$directory = $this->getDirectory();
		$results = [];

		if (!isset($directory['employees']) || !is_array($directory['employees'])) {
			return [
				'fields' => $directory['fields'] ?? [],
				'employees' => []
			];
		}

		$department = strtolower(trim($department));

		foreach ($directory['employees'] as $employee) {
			if (
				isset($employee['department']) &&
				is_string($employee['department']) &&
				strtolower($employee['department']) === $department
			) {
				$results[] = $employee;
			}
		}

		return [
			'fields' => $directory['fields'] ?? [],
			'employees' => $results
		];
	}
}
