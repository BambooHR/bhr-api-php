<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Util\Validator;

/**
 * Resource for interacting with BambooHR time off endpoints.
 */
class TimeOffResource extends AbstractResource {

	/**
	 * Get time off requests.
	 *
	 * @param array $params Query parameters
	 * @return array List of time off requests
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffRequests(array $params = []): array {
		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "time_off/requests{$queryString}";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}

	/**
	 * Get a specific time off request.
	 *
	 * @param int $requestId Time off request ID
	 * @return array Time off request details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function getTimeOffRequest(int $requestId): array {
		Validator::positiveInteger($requestId, 'Request ID');

		$endpoint = "time_off/requests/{$requestId}";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}

	/**
	 * Add a time off request.
	 *
	 * @param array $requestData Time off request data
	 * @return array Created time off request
	 * @throws BambooHRException If the request fails
	 * @throws \InvalidArgumentException If required fields are missing
	 */
	public function addTimeOffRequest(array $requestData): array {
		// Validate required fields
		$this->validateRequiredParams($requestData, ['employeeId', 'status', 'start', 'end', 'timeOffTypeId']);

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->post('time_off/requests', $requestData, $options);
	}

	/**
	 * Update a time off request.
	 *
	 * @param int   $requestId   Time off request ID
	 * @param array $requestData Time off request data
	 * @return array Updated time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function updateTimeOffRequest(int $requestId, array $requestData): array {
		Validator::positiveInteger($requestId, 'Request ID');

		if (empty($requestData)) {
			throw new \InvalidArgumentException('Request data cannot be empty');
		}

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->put("time_off/requests/{$requestId}", $requestData, $options);
	}

	/**
	 * Approve a time off request.
	 *
	 * @param int    $requestId Time off request ID
	 * @param string $note      Optional approval note
	 * @return array Approved time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function approveTimeOffRequest(int $requestId, string $note = ''): array {
		Validator::positiveInteger($requestId, 'Request ID');

		$requestData = [
			'status' => 'approved',
			'note' => $note
		];

		return $this->updateTimeOffRequest($requestId, $requestData);
	}

	/**
	 * Deny a time off request.
	 *
	 * @param int    $requestId Time off request ID
	 * @param string $note      Optional denial note
	 * @return array Denied time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function denyTimeOffRequest(int $requestId, string $note = ''): array {
		Validator::positiveInteger($requestId, 'Request ID');

		$requestData = [
			'status' => 'denied',
			'note' => $note
		];

		return $this->updateTimeOffRequest($requestId, $requestData);
	}

	/**
	 * Cancel a time off request.
	 *
	 * @param int    $requestId Time off request ID
	 * @param string $note      Optional cancellation note
	 * @return array Cancelled time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function cancelTimeOffRequest(int $requestId, string $note = ''): array {
		Validator::positiveInteger($requestId, 'Request ID');

		$requestData = [
			'status' => 'canceled',
			'note' => $note
		];

		return $this->updateTimeOffRequest($requestId, $requestData);
	}

	/**
	 * Get time off balances for an employee.
	 *
	 * @param int   $employeeId Employee ID
	 * @param array $params     Query parameters
	 * @return array Time off balances
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 */
	public function getTimeOffBalances(int $employeeId, array $params = []): array {
		Validator::positiveInteger($employeeId, 'Employee ID');

		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "employees/{$employeeId}/time_off/balances{$queryString}";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}
}
