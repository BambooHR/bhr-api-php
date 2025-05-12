<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Model\CustomReport;

/**
 * Resource for interacting with report-related endpoints.
 */
class ReportResource extends AbstractResource {

	/**
	 * Request a custom report.
	 *
	 * @param array $reportData Report configuration
	 * @return array Report data
	 * @throws BambooHRException If the request fails
	 * @throws \InvalidArgumentException If required fields are missing
	 */
	public function requestCustomReport(array $reportData): array {
		// Validate required fields
		$this->validateRequiredParams($reportData, ['title', 'fields']);

		// Validate fields is an array
		if (!is_array($reportData['fields'])) {
			throw new \InvalidArgumentException('Fields must be an array');
		}

		// Ensure fields is not empty
		if (empty($reportData['fields'])) {
			throw new \InvalidArgumentException('Fields cannot be empty');
		}

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->post('reports/custom', $reportData, $options);
	}

	/**
	 * Request a custom report using a CustomReport model.
	 *
	 * @param CustomReport $report Custom report model
	 * @return array Report data
	 * @throws BambooHRException If the request fails
	 */
	public function requestCustomReportFromModel(CustomReport $report): array {
		return $this->requestCustomReport($report->toArray());
	}

	/**
	 * Get data from a standard report.
	 *
	 * @param string $reportName Report name
	 * @param array  $params     Additional parameters
	 * @return array Report data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the report is not found
	 * @throws \InvalidArgumentException If report name is empty
	 */
	public function getStandardReport(string $reportName, array $params = []): array {
		if (empty(trim($reportName))) {
			throw new \InvalidArgumentException('Report name cannot be empty');
		}

		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "reports/{$reportName}{$queryString}";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}

	/**
	 * Get data from a dataset.
	 *
	 * @param string $dataset Dataset name
	 * @param array  $params  Additional parameters
	 * @return array Dataset data
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the dataset is not found
	 * @throws \InvalidArgumentException If dataset name is empty
	 */
	public function getDataFromDataset(string $dataset, array $params = []): array {
		if (empty(trim($dataset))) {
			throw new \InvalidArgumentException('Dataset name cannot be empty');
		}

		$queryString = !empty($params) ? '?' . http_build_query($params) : '';
		$endpoint = "datasets/{$dataset}{$queryString}";

		$options = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		return $this->get($endpoint, $options);
	}

	/**
	 * Get a list of available reports.
	 *
	 * @return array List of available reports
	 * @throws BambooHRException If the request fails
	 */
	public function getReports(): array {
		return $this->get('meta/reports');
	}

	/**
	 * Get a list of available report formats.
	 *
	 * @return array List of available report formats
	 * @throws BambooHRException If the request fails
	 */
	public function getReportFormats(): array {
		$reports = $this->getReports();
		$formats = [];

		if (isset($reports['formats']) && is_array($reports['formats'])) {
			$formats = $reports['formats'];
		}

		return $formats;
	}

	/**
	 * Get a list of available datasets.
	 *
	 * @return array List of available datasets
	 * @throws BambooHRException If the request fails
	 */
	public function getDatasets(): array {
		return $this->get('meta/datasets');
	}
}
