<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents a custom report in the BambooHR system.
 */
class CustomReport extends AbstractModel {

	public string $title;
	public array $fields = [];
	public ?array $filterBy = null;
	public ?string $format = 'json';
	public ?string $lastChanged = null;

	/**
	 * @param string $title  Report title
	 * @param array  $fields Fields to include in the report
	 */
	public function __construct(string $title = 'Custom Report', array $fields = []) {
		$this->title = $title;
		$this->fields = $fields;
	}

	/**
	 * Add a field to the report.
	 *
	 * @param string $field
	 * @return self
	 */
	public function addField(string $field): self {
		if (!in_array($field, $this->fields)) {
			$this->fields[] = $field;
		}

		return $this;
	}

	/**
	 * Add a filter to the report.
	 *
	 * @param string $field    Field name
	 * @param string $operator Operator (=, >, <, etc.)
	 * @param mixed  $value    Filter value
	 * @return self
	 */
	public function addFilter(string $field, string $operator, $value): self {
		if ($this->filterBy === null) {
			$this->filterBy = [];
		}

		$this->filterBy[] = [
			'field' => $field,
			'operator' => $operator,
			'value' => $value
		];

		return $this;
	}
}
