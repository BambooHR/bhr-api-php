<?php

declare(strict_types=1);

namespace BambooHR\SDK\Util;

/**
 * Utility class for validating input parameters.
 */
class Validator {

	/**
	 * Validates that a value is a positive integer.
	 *
	 * @param mixed  $value     The value to validate
	 * @param string $paramName The parameter name for error messages
	 * @throws \InvalidArgumentException If the value is not a positive integer
	 */
	public static function positiveInteger($value, string $paramName): void {
		if (!is_int($value) || $value <= 0) {
			throw new \InvalidArgumentException(
				sprintf('%s must be a positive integer, got: %s', $paramName, gettype($value))
			);
		}
	}

	/**
	 * Validates that a value is not empty.
	 *
	 * @param mixed  $value     The value to validate
	 * @param string $paramName The parameter name for error messages
	 * @throws \InvalidArgumentException If the value is empty
	 */
	public static function notEmpty($value, string $paramName): void {
		if (empty($value)) {
			throw new \InvalidArgumentException(sprintf('%s cannot be empty', $paramName));
		}
	}

	/**
	 * Validates that an array contains all required keys.
	 *
	 * @param array  $data         The array to validate
	 * @param array  $requiredKeys The required keys
	 * @param string $contextName  The context name for error messages
	 * @throws \InvalidArgumentException If any required key is missing
	 */
	public static function requiredKeys(array $data, array $requiredKeys, string $contextName): void {
		$missingKeys = [];

		foreach ($requiredKeys as $key) {
			if (!array_key_exists($key, $data)) {
				$missingKeys[] = $key;
			}
		}

		if (!empty($missingKeys)) {
			throw new \InvalidArgumentException(
				sprintf(
					'%s is missing required keys: %s',
					$contextName,
					implode(', ', $missingKeys)
				)
			);
		}
	}

	/**
	 * Validates that a value is a valid date string in the specified format.
	 *
	 * @param string $date      The date string to validate
	 * @param string $paramName The parameter name for error messages
	 * @param string $format    The expected date format (default: Y-m-d)
	 * @throws \InvalidArgumentException If the date is invalid
	 */
	public static function date(string $date, string $paramName, string $format = 'Y-m-d'): void {
		$dateTime = \DateTime::createFromFormat($format, $date);

		if ($dateTime === false || $dateTime->format($format) !== $date) {
			throw new \InvalidArgumentException(
				sprintf('%s must be a valid date in format %s, got: %s', $paramName, $format, $date)
			);
		}
	}
}
