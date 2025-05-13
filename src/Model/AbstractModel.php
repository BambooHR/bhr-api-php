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
		$properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

		foreach ($properties as $property) {
			$name = $property->getName();
			$value = $property->getValue($this);

			// Skip null values
			if ($value === null) {
				continue;
			}

			$data[$name] = $value;
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
			$propertyName = $key;
			if ($reflection->hasProperty($propertyName)) {
				$property = $reflection->getProperty($propertyName);
				
				// Only set public properties
				if ($property->isPublic()) {
					// Convert value to appropriate type if needed
					$value = $model->convertValueToType($property, $value);
					$model->{$propertyName} = $value;
				}
			}
		}

		return $model;
	}

	/**
	 * Convert a value to the property's type if needed.
	 *
	 * @param \ReflectionProperty $property
	 * @param mixed               $value
	 * @return mixed Converted value
	 */
	protected function convertValueToType(\ReflectionProperty $property, mixed $value): mixed {
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
	 * Convert snake_case to camelCase.
	 *
	 * @param string $input
	 * @return string
	 */
	protected function snakeToCamel(string $input): string {
		return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
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
}
