<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;

/**
 * Resource for interacting with BambooHR metadata endpoints.
 */
class MetadataResource extends AbstractResource {

	/**
	 * Get all available fields.
	 *
	 * @return array List of available fields
	 * @throws BambooHRException If the request fails
	 */
	public function getFields(): array {
		return $this->get('meta/fields');
	}

	/**
	 * Get details about a specific field.
	 *
	 * @param string $fieldId Field ID
	 * @return array Field details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the field is not found
	 */
	public function getField(string $fieldId): array {
		if (empty(trim($fieldId))) {
			throw new \InvalidArgumentException('Field ID cannot be empty');
		}

		$fields = $this->getFields();

		foreach ($fields as $field) {
			if (isset($field['id']) && $field['id'] === $fieldId) {
				return $field;
			}
		}

		throw new NotFoundException("Field with ID '{$fieldId}' not found");
	}

	/**
	 * Get all available tables.
	 *
	 * @return array List of available tables
	 * @throws BambooHRException If the request fails
	 */
	public function getTables(): array {
		return $this->get('meta/tables');
	}

	/**
	 * Get details about a specific table.
	 *
	 * @param string $tableId Table ID
	 * @return array Table details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the table is not found
	 */
	public function getTable(string $tableId): array {
		if (empty(trim($tableId))) {
			throw new \InvalidArgumentException('Table ID cannot be empty');
		}

		$tables = $this->getTables();

		foreach ($tables as $table) {
			if (isset($table['id']) && $table['id'] === $tableId) {
				return $table;
			}
		}

		throw new NotFoundException("Table with ID '{$tableId}' not found");
	}

	/**
	 * Get all available lists.
	 *
	 * @return array List of available lists
	 * @throws BambooHRException If the request fails
	 */
	public function getLists(): array {
		return $this->get('meta/lists');
	}

	/**
	 * Get details about a specific list.
	 *
	 * @param string $listId List ID
	 * @return array List details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the list is not found
	 */
	public function getList(string $listId): array {
		if (empty(trim($listId))) {
			throw new \InvalidArgumentException('List ID cannot be empty');
		}

		$lists = $this->getLists();

		foreach ($lists as $list) {
			if (isset($list['id']) && $list['id'] === $listId) {
				return $list;
			}
		}

		throw new NotFoundException("List with ID '{$listId}' not found");
	}

	/**
	 * Get all available time off types.
	 *
	 * @return array List of available time off types
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffTypes(): array {
		return $this->get('meta/time_off/types');
	}

	/**
	 * Get all available time off policies.
	 *
	 * @return array List of available time off policies
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffPolicies(): array {
		return $this->get('meta/time_off/policies');
	}
}
