<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents a table metadata in the BambooHR system.
 */
class Table extends AbstractModel {
    public ?string $id = null;
    public ?string $name = null;
    public ?string $alias = null;
    public ?bool $singular = null;
    public ?array $fields = null;
    public ?array $permissions = null;

    /**
     * Get a specific field by ID.
     *
     * @param string $fieldId
     * @return Field|null
     */
    public function getField(string $fieldId): ?Field {
        if (!$this->fields) {
            return null;
        }
        
        foreach ($this->fields as $field) {
            if ($field instanceof Field && $field->id === $fieldId) {
                return $field;
            }
            
            if (is_array($field) && isset($field['id']) && $field['id'] === $fieldId) {
                return Field::fromArray($field);
            }
        }
        
        return null;
    }

    /**
     * Get field names as an array.
     *
     * @return array
     */
    public function getFieldNames(): array {
        if (!$this->fields || !is_array($this->fields)) {
            return [];
        }

        $names = [];
        foreach ($this->fields as $field) {
            if (isset($field['name'])) {
                $names[] = $field['name'];
            }
        }

        return $names;
    }

    /**
     * Get field IDs as an array.
     *
     * @return array
     */
    public function getFieldIds(): array {
        if (!$this->fields || !is_array($this->fields)) {
            return [];
        }

        $ids = [];
        foreach ($this->fields as $field) {
            if (isset($field['id'])) {
                $ids[] = $field['id'];
            }
        }

        return $ids;
    }
}
