<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Model\CustomReport;
use BambooHR\SDK\Model\Report;

/**
 * Resource for interacting with report-related endpoints.
 */
class ReportResource extends AbstractResource {

	/**
	 * Request a custom report.
	 * @link https://documentation.bamboohr.com/reference/request-custom-report
	 *
	 * @param array|CustomReport $reportData Report configuration as array or CustomReport model
	 * @param bool              $asArray    Whether to return data as an array instead of a model
	 * @return Report|array                 Report data as a model or array
	 * @throws BambooHRException If the request fails
	 */
	public function requestCustomReport(array|CustomReport $reportData, bool $asArray = false): Report|array {
		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		// Convert to array if needed
		$reportDataArray = $reportData instanceof CustomReport ? $reportData->toArray() : $reportData;

		$response = $this->post('reports/custom', $reportDataArray, $options);

		// Return as array if requested
		if ($asArray) {
			// Ensure we have an array response
			if (!is_array($response)) {
				return $reportDataArray;
			}
			return $response;
		}

		// Return as model
		return $this->safelyConvertResponseToModel($response, Report::class);
	}

	/**
	 * Get data from a standard report.
	 *
	 * @param string $reportId Report name
	 * @param array  $params     Additional parameters
	 * @param bool   $asArray    Whether to return data as an array instead of a model
	 * @return Report|array      Report data as a model or array
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the report is not found
	 */
	public function getStandardReport(string $reportId, array $params = [], bool $asArray = false): Report|array {
		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		$queryString = http_build_query($params);
		$endpoint = "reports/$reportId" . ($queryString ? "?{$queryString}" : '');

		$response = $this->get($endpoint, $options);

		// Return as array if requested
		if ($asArray) {
			return $response;
		}

		// Return as model
		return $this->safelyConvertResponseToModel($response, Report::class);
	}

	/**
	 * Get data from a dataset.
	 *
	 * @param string $dataset Dataset name
	 * @param array  $params  Request parameters including fields, filters, etc.
	 * @return array Dataset data
	 * @throws BambooHRException If the request fails
	 * @throws \InvalidArgumentException If dataset name is empty
	 */
	public function getDataFromDataset(string $dataset, array $params = []): array {
		if (empty(trim($dataset))) {
			throw new \InvalidArgumentException('Dataset name cannot be empty');
		}

		// Add the dataset name to the params if not already included
		if (!isset($params['datasetName'])) {
			$params['datasetName'] = $dataset;
		}

		$options = [
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json'
			],
			'json' => $params
		];

		return $this->post("datasets/", $params, $options);
	}

	/**
	 * Get a list of available datasets.
	 *
	 * @return array List of available datasets
	 * @throws BambooHRException If the request fails
	 */
	public function getDatasets(): array {
		$options = [
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json'
			]
		];
		
		return $this->get('datasets', $options);
	}

	/**
	 * Get a list of available reports.
	 *
	 * @return array List of available reports
	 * @throws BambooHRException If the request fails
	 */
	public function getReports(): array {
		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get('reports', $options);
	}
}
