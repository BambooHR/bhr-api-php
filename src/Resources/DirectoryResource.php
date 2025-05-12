<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;

/**
 * Resource for interacting with company directory endpoints.
 */
class DirectoryResource extends AbstractResource {

	/**
	 * Get the company directory.
	 *
	 * @return array Directory data with 'fields' and 'employees' keys
	 * @throws BambooHRException If the request fails
	 */
	public function getDirectory(): array {
		$response = $this->get('employees/directory');

		// Ensure we have a properly formatted response
		if (!is_array($response) || !isset($response['employees']) || !isset($response['fields'])) {
			throw new BambooHRException('Invalid directory response format');
		}

		return $response;
	}

	/**
	 * Get a specific employee from the directory.
	 *
	 * @param int $employeeId Employee ID
	 * @return array|null Employee directory data or null if not found
	 * @throws BambooHRException If the request fails
	 * @throws \InvalidArgumentException If employee ID is invalid
	 */
	public function getDirectoryEmployee(int $employeeId): ?array {
		if ($employeeId <= 0) {
			throw new \InvalidArgumentException('Employee ID must be a positive integer');
		}

		$directory = $this->getDirectory();

		if (!isset($directory['employees']) || !is_array($directory['employees'])) {
			return null;
		}

		foreach ($directory['employees'] as $employee) {
			if (isset($employee['id']) && $employee['id'] == $employeeId) {
				return $employee;
			}
		}

		return null;
	}

	/**
	 * Search the company directory.
	 *
	 * @param string $query Search query
	 * @return array Matching employees with 'fields' and 'employees' keys
	 * @throws BambooHRException If the request fails
	 * @throws \InvalidArgumentException If query is empty
	 */
	public function searchDirectory(string $query): array {
		if (empty(trim($query))) {
			throw new \InvalidArgumentException('Search query cannot be empty');
		}

		$directory = $this->getDirectory();
		$results = [];

		if (!isset($directory['employees']) || !is_array($directory['employees'])) {
			return [
				'fields' => $directory['fields'] ?? [],
				'employees' => []
			];
		}

		$query = strtolower(trim($query));

		foreach ($directory['employees'] as $employee) {
			// Search in common fields
			$searchFields = [
				'displayName', 'firstName', 'lastName', 'jobTitle',
				'department', 'workPhone', 'mobilePhone', 'workEmail'
			];

			foreach ($searchFields as $field) {
				if (
					isset($employee[$field]) &&
					is_string($employee[$field]) &&
					strpos(strtolower($employee[$field]), $query) !== false
				) {
					$results[] = $employee;
					break; // Found a match, no need to check other fields
				}
			}
		}

		return [
			'fields' => $directory['fields'] ?? [],
			'employees' => $results
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
