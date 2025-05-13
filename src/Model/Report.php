<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents a standard report in the BambooHR system.
 */
class Report extends AbstractModel {
    public ?int $id = null;
    public ?string $name = null;
    public ?string $title = null;
    public ?array $fields = [];
    public ?string $lastRun = null;
    public ?string $lastModified = null;
    public ?array $employees = null;
    public ?array $groups = null;

    /**
     * Get the number of employees in the report.
     *
     * @return int
     */
    public function getEmployeeCount(): int {
        if (!$this->employees || !is_array($this->employees)) {
            return 0;
        }
        
        return count($this->employees);
    }

    /**
     * Get the number of groups in the report.
     *
     * @return int
     */
    public function getGroupCount(): int {
        if (!$this->groups || !is_array($this->groups)) {
            return 0;
        }
        
        return count($this->groups);
    }

    /**
     * Get the field names from the report fields.
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
}
