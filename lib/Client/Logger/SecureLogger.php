<?php
/**
 * SecureLogger
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Client\Logger
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client\Logger;

/**
 * SecureLogger provides logging with automatic sensitive data redaction
 *
 * This logger automatically redacts sensitive information like API keys,
 * tokens, passwords, and other credentials before logging.
 *
 * @category Class
 * @package  BhrSdk\Client\Logger
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class SecureLogger implements LoggerInterface {
	private bool $enabled;
	private string $logLevel;
	/** @var resource */
	private $outputStream;

	/**
	 * List of sensitive keys to redact
	 */
	private const SENSITIVE_KEYS = [
		'password',
		'api_key',
		'apikey',
		'api-key',
		'token',
		'access_token',
		'accesstoken',
		'access-token',
		'oauth_token',
		'oauthtoken',
		'secret',
		'authorization',
		'auth',
		'credential',
		'credentials',
	];

	/**
	 * Log level priorities
	 */
	private const LOG_LEVELS = [
		'debug' => 0,
		'info' => 1,
		'warning' => 2,
		'error' => 3,
	];

	/**
	 * Constructor
	 *
	 * @param bool          $enabled Whether logging is enabled
	 * @param string        $logLevel Minimum log level (debug, info, warning, error)
	 * @param resource|null $outputStream Output stream (defaults to STDERR)
	 */
	public function __construct(
		bool $enabled = true,
		string $logLevel = 'info',
		$outputStream = null
	) {
		$this->enabled = $enabled;
		$this->logLevel = strtolower($logLevel);
		$this->outputStream = $outputStream ?? STDERR;
	}

	/**
	 * {@inheritdoc}
	 */
	public function debug(string $message, array $context = []): void {
		$this->log('debug', $message, $context);
	}

	/**
	 * {@inheritdoc}
	 */
	public function info(string $message, array $context = []): void {
		$this->log('info', $message, $context);
	}

	/**
	 * {@inheritdoc}
	 */
	public function warning(string $message, array $context = []): void {
		$this->log('warning', $message, $context);
	}

	/**
	 * {@inheritdoc}
	 */
	public function error(string $message, array $context = []): void {
		$this->log('error', $message, $context);
	}

	/**
	 * {@inheritdoc}
	 */
	public function log(string $level, string $message, array $context = []): void {
		if (!$this->enabled) {
			return;
		}

		$level = strtolower($level);

		// Check if this log level should be output
		if (!$this->shouldLog($level)) {
			return;
		}

		// Redact sensitive data from context
		$sanitizedContext = $this->redactSensitiveData($context);

		// Format the log entry
		$logEntry = $this->formatLogEntry($level, $message, $sanitizedContext);

		// Write to output
		fwrite($this->outputStream, $logEntry . PHP_EOL);
	}

	/**
	 * Check if a log level should be output
	 *
	 * @param string $level The level to check
	 * @return bool True if should log
	 */
	private function shouldLog(string $level): bool {
		$currentPriority = self::LOG_LEVELS[$this->logLevel] ?? 1;
		$messagePriority = self::LOG_LEVELS[$level] ?? 1;

		return $messagePriority >= $currentPriority;
	}

	/**
	 * Format a log entry
	 *
	 * @param string               $level Log level
	 * @param string               $message Log message
	 * @param array<string, mixed> $context Context data
	 * @return string Formatted log entry
	 */
	private function formatLogEntry(string $level, string $message, array $context): string {
		$timestamp = date('Y-m-d H:i:s');
		$levelUpper = strtoupper($level);

		$entry = "[{$timestamp}] BHR-SDK.{$levelUpper}: {$message}";

		if (!empty($context)) {
			$entry .= ' ' . json_encode($context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}

		return $entry;
	}

	/**
	 * Redact sensitive data from an array or string
	 *
	 * @param mixed $data Data to redact
	 * @return mixed Redacted data
	 */
	private function redactSensitiveData($data) {
		if (is_array($data)) {
			return $this->redactSensitiveDataFromArray($data);
		}

		if (is_string($data)) {
			return $this->redactSensitiveDataFromString($data);
		}

		if (is_object($data)) {
			return $this->redactSensitiveDataFromObject($data);
		}

		return $data;
	}

	/**
	 * Redact sensitive data from an array
	 *
	 * @param array<string, mixed> $data Array to redact
	 * @return array<string, mixed> Redacted array
	 */
	private function redactSensitiveDataFromArray(array $data): array {
		$redacted = [];

		foreach ($data as $key => $value) {
			$keyLower = strtolower((string) $key);

			if ($this->isSensitiveKey($keyLower)) {
				$redacted[$key] = $this->maskValue($value);
			} else {
				$redacted[$key] = $this->redactSensitiveData($value);
			}
		}

		return $redacted;
	}

	/**
	 * Redact sensitive data from an object
	 *
	 * @param object $data Object to redact
	 * @return array<string, mixed> Redacted array representation
	 */
	private function redactSensitiveDataFromObject(object $data): array {
		// Convert object to array and redact
		$dataArray = json_decode(json_encode($data), true);
		return $this->redactSensitiveDataFromArray($dataArray ?? []);
	}

	/**
	 * Redact sensitive data from a string
	 *
	 * @param string $data String to redact
	 * @return string Redacted string
	 */
	private function redactSensitiveDataFromString(string $data): string {
		// Redact common patterns in strings
		$patterns = [
			// Bearer tokens
			'/Bearer\s+[a-zA-Z0-9\-._~+\/]+=*/i' => 'Bearer [REDACTED]',
			// Basic auth
			'/Basic\s+[a-zA-Z0-9+\/]+=*/i' => 'Basic [REDACTED]',
			// API keys (common patterns)
			'/["\']?api[_-]?key["\']?\s*[:=]\s*["\']?[a-zA-Z0-9\-_]+["\']?/i' => 'api_key=[REDACTED]',
			// Tokens
			'/["\']?token["\']?\s*[:=]\s*["\']?[a-zA-Z0-9\-_]+["\']?/i' => 'token=[REDACTED]',
		];

		foreach ($patterns as $pattern => $replacement) {
			$data = preg_replace($pattern, $replacement, $data);
		}

		return $data;
	}

	/**
	 * Check if a key is sensitive
	 *
	 * @param string $key Key to check
	 * @return bool True if sensitive
	 */
	private function isSensitiveKey(string $key): bool {
		foreach (self::SENSITIVE_KEYS as $sensitiveKey) {
			if (str_contains($key, $sensitiveKey)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Mask a sensitive value
	 *
	 * @param mixed $value Value to mask
	 * @return string Masked value
	 */
	private function maskValue($value): string {
		if ($value === null || $value === '') {
			return '[EMPTY]';
		}

		if (is_array($value) || is_object($value)) {
			return '[REDACTED_OBJECT]';
		}

		$stringValue = (string) $value;
		$length = strlen($stringValue);

		if ($length <= 8) {
			return '[REDACTED]';
		}

		// Show first 4 and last 4 characters
		return substr($stringValue, 0, 4) . '****' . substr($stringValue, -4);
	}

	/**
	 * Enable logging
	 *
	 * @return void
	 */
	public function enable(): void {
		$this->enabled = true;
	}

	/**
	 * Disable logging
	 *
	 * @return void
	 */
	public function disable(): void {
		$this->enabled = false;
	}

	/**
	 * Check if logging is enabled
	 *
	 * @return bool True if enabled
	 */
	public function isEnabled(): bool {
		return $this->enabled;
	}

	/**
	 * Set the minimum log level
	 *
	 * @param string $level Log level (debug, info, warning, error)
	 * @return void
	 */
	public function setLogLevel(string $level): void {
		$this->logLevel = strtolower($level);
	}

	/**
	 * Get the current log level
	 *
	 * @return string Current log level
	 */
	public function getLogLevel(): string {
		return $this->logLevel;
	}
}
