<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents a custom report in the BambooHR system.
 */
class CustomReport extends AbstractModel {

	protected string $title;
	protected array $fields = [];
	protected ?array $filterBy = null;
	protected ?string $format = 'json';
	protected ?string $lastChanged = null;

	/**
	 * @param string $title  Report title
	 * @param array  $fields Fields to include in the report
	 */
	public function __construct(string $title = 'Custom Report', array $fields = []) {
		$this->title = $title;
		$this->fields = $fields;
	}

	/**
	 * Get the report title.
	 *
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * Set the report title.
	 *
	 * @param string $title
	 * @return self
	 */
	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}

	/**
	 * Get the report fields.
	 *
	 * @return array
	 */
	public function getFields(): array {
		return $this->fields;
	}

	/**
	 * Set the report fields.
	 *
	 * @param array $fields
	 * @return self
	 */
	public function setFields(array $fields): self {
		$this->fields = $fields;
		return $this;
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
	 * Get the report filters.
	 *
	 * @return array|null
	 */
	public function getFilterBy(): ?array {
		return $this->filterBy;
	}

	/**
	 * Set the report filters.
	 *
	 * @param array|null $filterBy
	 * @return self
	 */
	public function setFilterBy(?array $filterBy): self {
		$this->filterBy = $filterBy;
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

	/**
	 * Get the report format.
	 *
	 * @return string|null
	 */
	public function getFormat(): ?string {
		return $this->format;
	}

	/**
	 * Set the report format.
	 *
	 * @param string|null $format
	 * @return self
	 */
	public function setFormat(?string $format): self {
		$this->format = $format;
		return $this;
	}

	/**
	 * Get the last changed date filter.
	 *
	 * @return string|null
	 */
	public function getLastChanged(): ?string {
		return $this->lastChanged;
	}

	/**
	 * Set the last changed date filter.
	 *
	 * @param string|null $lastChanged
	 * @return self
	 */
	public function setLastChanged(?string $lastChanged): self {
		$this->lastChanged = $lastChanged;
		return $this;
	}
}
