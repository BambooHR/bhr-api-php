<?php

declare(strict_types=1);

namespace BambooHR\SDK\Model;

/**
 * Base model class for all BambooHR API models.
 */
abstract class AbstractModel implements \JsonSerializable {

	/**
	 * Convert the model to an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(): array {
		return $this->jsonSerialize();
	}

	/**
	 * {@inheritdoc}
	 *
	 * @return array<string, mixed>
	 */
	public function jsonSerialize(): array {
		$data = [];
		$reflection = new \ReflectionClass($this);
		$properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);

		foreach ($properties as $property) {
			$property->setAccessible(true);
			$name = $property->getName();
			$value = $property->getValue($this);

			// Skip null values
			if ($value === null) {
				continue;
			}

			// Convert camelCase to snake_case for API
			$apiName = $this->camelToSnake($name);
			$data[$apiName] = $value;
		}

		return $data;
	}

	/**
	 * Create a model from an array of data.
	 *
	 * @param array<string, mixed> $data
	 * @return static
	 */
	public static function fromArray(array $data): static {
		$model = new static();
		$reflection = new \ReflectionClass($model);

		foreach ($data as $key => $value) {
			// Convert snake_case to camelCase for properties
			$propertyName = $model->snakeToCamel($key);

			if ($reflection->hasProperty($propertyName)) {
				$property = $reflection->getProperty($propertyName);
				$property->setAccessible(true);

				// Validate and convert value if needed
				$value = $model->validatePropertyValue($property, $value);

				$property->setValue($model, $value);
			}
		}

		return $model;
	}

	/**
	 * Validate and convert a property value if needed.
	 *
	 * @param \ReflectionProperty $property
	 * @param mixed               $value
	 * @return mixed Validated and possibly converted value
	 */
	protected function validatePropertyValue(\ReflectionProperty $property, mixed $value): mixed {
		// Skip null values
		if ($value === null) {
			return null;
		}

		// Get property type
		$type = $property->getType();
		if ($type === null) {
			return $value; // No type hint, return as is
		}

		$typeName = $type->getName();

		// Handle basic type conversions
		switch ($typeName) {
			case 'int':
				if (!is_int($value)) {
					return (int) $value;
				}
				break;

			case 'float':
				if (!is_float($value)) {
					return (float) $value;
				}
				break;

			case 'string':
				if (!is_string($value)) {
					return (string) $value;
				}
				break;

			case 'bool':
				if (!is_bool($value)) {
					return (bool) $value;
				}
				break;

			case 'array':
				if (!is_array($value)) {
					return (array) $value;
				}
				break;
		}

		return $value;
	}

	/**
	 * Convert camelCase to snake_case.
	 *
	 * @param string $input
	 * @return string
	 */
	protected function camelToSnake(string $input): string {
		return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
	}

	/**
	 * Convert snake_case to camelCase.
	 *
	 * @param string $input
	 * @return string
	 */
	protected function snakeToCamel(string $input): string {
		return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
	}
}
