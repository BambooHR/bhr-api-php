<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Model\TimeOffRequest;

/**
 * Resource for interacting with BambooHR time off endpoints.
 */
class TimeOffResource extends AbstractResource {

	/**
	 * Get time off requests.
	 * 
	 * @link https://documentation.bamboohr.com/reference/time-off-get-a-list-of-time-off-requests
	 *
	 * @param array $params  Query parameters
	 * @param bool  $asArray Whether to return requests as arrays instead of model objects
	 * @return array         List of time off requests as models or arrays
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffRequests(array $params = [], bool $asArray = false): array {
		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "time_off/requests$queryString";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		$response = $this->get($endpoint, $options);

		// Return raw response if requested and it contains requests
		if ($asArray && isset($response['requests']) && is_array($response['requests'])) {
			return $response['requests'];
		}

		// Convert to model objects
		$requests = [];
		foreach ($response as $requestData) {
			$requests[] = TimeOffRequest::fromArray($requestData);
		}

		return $requests;
	}

	/**
	 * Add a new time off request.
	 * 
	 * @link https://documentation.bamboohr.com/reference/time-off-add-a-time-off-request
	 *
	 * @param int $employeeId The ID of the employee
	 * @param array $requestData Time off request data
	 * @return bool True if the request was successfully created
	 * @throws BambooHRException If the request fails
	 */
	public function addTimeOffRequest(int $employeeId, array $requestData): bool {
		$endpoint = "employees/{$employeeId}/time_off/request";

		$options = [
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json'
			],
			'json' => $requestData
		];

		$this->put($endpoint, $options);
		
		// If no exception was thrown, the request was successful
		return true;
	}

	/**
	 * Update a time off request.
	 * 
	 * @link https://documentation.bamboohr.com/reference/time-off-1
	 *
	 * @param int           $requestId Time off request ID
	 * @param TimeOffRequest|array $request Time off request object or array
	 * @param bool $asArray Whether to return data as an array instead of a model
	 * @return TimeOffRequest|array Updated time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function updateTimeOffRequest(int $requestId, TimeOffRequest|array $request, bool $asArray = false): TimeOffRequest|array {
		$options = [
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json'
			]
		];

		// Convert to array if needed
		$requestData = $request instanceof TimeOffRequest ? $request->toArray() : $request;
		$options['json'] = $requestData;

		$response = $this->put("time_off/requests/{$requestId}", $options);
		
		// Return as array if requested
		if ($asArray) {
			return is_array($response) ? $response : $requestData;
		}

		// Return as model
		$result = $request instanceof TimeOffRequest ? $request : TimeOffRequest::fromArray($requestData);
		
		// If the response contains an ID, update the result object
		if (is_array($response) && isset($response['id'])) {
			$result->id = $response['id'];
		}
		
		return $result;
	}

	/**
	 * Approve a time off request.
	 * 
	 * @link https://documentation.bamboohr.com/reference/time-off-1
	 *
	 * @param int    $requestId Time off request ID
	 * @param string $note      Optional approval note
	 * @param bool   $asArray   Whether to return data as an array
	 * @return TimeOffRequest|array Approved time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function approveTimeOffRequest(int $requestId, string $note = '', bool $asArray = false): TimeOffRequest|array {
		$requestData = [
			'status' => 'approved',
			'note' => $note
		];

		return $this->updateTimeOffRequest($requestId, $requestData, $asArray);
	}

	/**
	 * Deny a time off request.
	 * 
	 * @link https://documentation.bamboohr.com/reference/time-off-1
	 *
	 * @param int    $requestId Time off request ID
	 * @param string $note      Optional denial note
	 * @param bool   $asArray   Whether to return data as an array
	 * @return TimeOffRequest|array Denied time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function denyTimeOffRequest(int $requestId, string $note = '', bool $asArray = false): TimeOffRequest|array {
		$requestData = [
			'status' => 'denied',
			'note' => $note
		];

		return $this->updateTimeOffRequest($requestId, $requestData, $asArray);
	}

	/**
	 * Cancel a time off request.
	 * 
	 * @link https://documentation.bamboohr.com/reference/time-off-1
	 *
	 * @param int    $requestId Time off request ID
	 * @param string $note      Optional cancellation note
	 * @param bool   $asArray   Whether to return data as an array
	 * @return TimeOffRequest|array Cancelled time off request
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the request is not found
	 */
	public function cancelTimeOffRequest(int $requestId, string $note = '', bool $asArray = false): TimeOffRequest|array {
		$requestData = [
			'status' => 'canceled',
			'note' => $note
		];

		return $this->updateTimeOffRequest($requestId, $requestData, $asArray);
	}

	/**
	 * Get time off balances for an employee.
	 * 
	 * @link https://documentation.bamboohr.com/reference/estimate-future-time-off-balances-1
	 *
	 * @param int   $employeeId Employee ID
	 * @param array $params     Query parameters
	 * @return array Time off balances
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the employee is not found
	 */
	public function getTimeOffBalances(int $employeeId, array $params = []): array {
		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "employees/$employeeId/time_off/calculator$queryString";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}

	/**
	 * Get time off policies.
	 * 
	 * @link https://documentation.bamboohr.com/reference/get-time-off-policies-1
	 *
	 * @param array $params Query parameters
	 * @param bool  $asArray Whether to return data as an array
	 * @return array Time off policies
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffPolicies(array $params = [], bool $asArray = true): array {
		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "meta/time_off/policies$queryString";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}

	/**
	 * Get time off types.
	 * 
	 * @link https://documentation.bamboohr.com/reference/get-time-off-types-1
	 *
	 * @param array $params Query parameters
	 * @param bool  $asArray Whether to return data as an array
	 * @return array Time off types
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffTypes(array $params = [], bool $asArray = true): array {
		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "meta/time_off/types$queryString";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}
}
