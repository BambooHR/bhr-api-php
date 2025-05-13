<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Represents a field metadata in the BambooHR system.
 */
class Field extends AbstractModel {
    public ?string $id = null;
    public ?string $name = null;
    public ?string $type = null;
    public ?bool $required = null;
    public ?bool $readOnly = null;
    public ?array $options = null;
    public ?array $permissions = null;
    public ?string $alias = null;

    /**
     * Check if the field is a list type.
     *
     * @return bool
     */
    public function isList(): bool {
        return $this->type === 'list' && !empty($this->options);
    }

    /**
     * Check if the field is a date type.
     *
     * @return bool
     */
    public function isDate(): bool {
        return $this->type === 'date';
    }

    /**
     * Check if the field is a text type.
     *
     * @return bool
     */
    public function isText(): bool {
        return $this->type === 'text';
    }

    /**
     * Check if the field is a numeric type.
     *
     * @return bool
     */
    public function isNumeric(): bool {
        return $this->type === 'integer' || $this->type === 'float' || $this->type === 'currency';
    }

    /**
     * Get option label by value.
     *
     * @param string $value
     * @return string|null
     */
    public function getOptionLabel(string $value): ?string {
        if (!$this->options || !is_array($this->options)) {
            return null;
        }

        foreach ($this->options as $option) {
            if (isset($option['id']) && $option['id'] === $value) {
                return $option['label'] ?? null;
            }
        }

        return null;
    }
}
