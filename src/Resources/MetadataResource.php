<?php

declare(strict_types=1);

namespace BambooHR\SDK\Resources;

use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Model\Table;
use BambooHR\SDK\Model\Field;

/**
 * Resource for interacting with BambooHR metadata endpoints.
 */
class MetadataResource extends AbstractResource {

	/**
	 * Get all available fields.
	 *
	 * @return Field[] List of available fields
	 * @throws BambooHRException If the request fails
	 */
	/**
	 * Get all available fields.
	 *
	 * @link https://documentation.bamboohr.com/reference/meta-fields
	 * @param bool $asArray Whether to return fields as arrays instead of Field objects
	 * @return Field[]|array
	 * @throws BambooHRException If the request fails
	 */
	public function getFields(bool $asArray = false): array {
		$response = $this->get('meta/fields');
		if ($asArray) {
			return $response;
		}
		$fields = [];
		foreach ($response as $fieldData) {
			$fields[] = Field::fromArray($fieldData);
		}
		return $fields;
	}

	/**
	 * Get details about a specific field.
	 *
	 * @param string $fieldId Field ID
	 * @return Field Field details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the field is not found
	 */
	/**
	 * Get details about a specific field.
	 *
	 * @link https://documentation.bamboohr.com/reference/meta-fields
	 * @param string $fieldId Field ID
	 * @param bool $asArray Whether to return the field as an array
	 * @return Field|array Field details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the field is not found
	 */
	public function getField(string $fieldId, bool $asArray = false): Field|array {
		$fields = $this->getFields($asArray);
		if ($asArray) {
			foreach ($fields as $field) {
				if (isset($field['id']) && $field['id'] === $fieldId) {
					return $field;
				}
			}
		} else {
			foreach ($fields as $field) {
				if ($field->id === $fieldId) {
					return $field;
				}
			}
		}
		throw new NotFoundException("Field with ID '{$fieldId}' not found");
	}

	/**
	 * Get all available tables.
	 *
	 * @return Table[] List of available tables
	 * @throws BambooHRException If the request fails
	 */
	/**
	 * Get all available tables.
	 *
	 * @link https://documentation.bamboohr.com/reference/meta-tables
	 * @param bool $asArray Whether to return tables as arrays instead of Table objects
	 * @return Table[]|array
	 * @throws BambooHRException If the request fails
	 */
	public function getTables(bool $asArray = false): array {
		$response = $this->get('meta/tables');
		if ($asArray) {
			return $response;
		}
		$tables = [];
		foreach ($response as $tableData) {
			// Use the alias as the ID since the API doesn't provide an explicit ID
			if (isset($tableData['alias'])) {
				$tableData['id'] = $tableData['alias'];
			}
			// Convert field arrays to Field objects
			if (isset($tableData['fields']) && is_array($tableData['fields'])) {
				$fieldObjects = [];
				foreach ($tableData['fields'] as $fieldData) {
					$fieldObjects[] = Field::fromArray($fieldData);
				}
				$tableData['fields'] = $fieldObjects;
			}
			$tables[] = Table::fromArray($tableData);
		}
		return $tables;
	}

	/**
	 * Get details about a specific table.
	 *
	 * @param string $tableId Table ID
	 * @return Table Table details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the table is not found
	 */
	/**
	 * Get details about a specific table.
	 *
	 * @link https://documentation.bamboohr.com/reference/meta-tables
	 * @param string $tableId Table ID
	 * @param bool $asArray Whether to return the table as an array
	 * @return Table|array Table details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the table is not found
	 */
	public function getTable(string $tableId, bool $asArray = false): Table|array {
		$tables = $this->getTables($asArray);
		if ($asArray) {
			foreach ($tables as $table) {
				if (isset($table['id']) && $table['id'] === $tableId) {
					return $table;
				}
			}
		} else {
			foreach ($tables as $table) {
				if ($table->id === $tableId) {
					return $table;
				}
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
	/**
	 * Get all available lists.
	 *
	 * @link https://documentation.bamboohr.com/reference/meta-lists
	 * @param bool $asArray Whether to return lists as arrays (default true)
	 * @return array List of available lists
	 * @throws BambooHRException If the request fails
	 */
	public function getLists(bool $asArray = true): array {
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
	/**
	 * Get details about a specific list.
	 *
	 * @link https://documentation.bamboohr.com/reference/meta-lists
	 * @param string $listId List ID
	 * @param bool $asArray Whether to return the list as an array (default true)
	 * @return array List details
	 * @throws BambooHRException If the request fails
	 * @throws NotFoundException If the list is not found
	 */
	public function getList(string $listId, bool $asArray = true): array {
		if (empty(trim($listId))) {
			throw new \InvalidArgumentException('List ID cannot be empty');
		}

		$lists = $this->getLists($asArray);
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
	/**
	 * Get all available time off types.
	 *
	 * @link https://documentation.bamboohr.com/reference/get-time-off-types-1
	 * @param bool $asArray Whether to return types as arrays (default true)
	 * @return array List of available time off types
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffTypes(bool $asArray = true): array {
		return $this->get('meta/time_off/types');
	}

	/**
	 * Get all available time off policies.
	 *
	 * @return array List of available time off policies
	 * @throws BambooHRException If the request fails
	 */
	/**
	 * Get all available time off policies.
	 *
	 * @link https://documentation.bamboohr.com/reference/get-time-off-policies-1
	 * @param bool $asArray Whether to return policies as arrays (default true)
	 * @return array List of available time off policies
	 * @throws BambooHRException If the request fails
	 */
	public function getTimeOffPolicies(bool $asArray = true): array {
		return $this->get('meta/time_off/policies');
	}
}
