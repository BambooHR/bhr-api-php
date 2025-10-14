<?php
/**
 * LoggerInterface
 * PHP version 8.1
 *
 * @category Interface
 * @package  BhrSdk\Client\Logger
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Client\Logger;

/**
 * LoggerInterface defines the contract for logging in the SDK
 *
 * @category Interface
 * @package  BhrSdk\Client\Logger
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
interface LoggerInterface
{
    /**
     * Log a debug message
     *
     * @param string $message The message to log
     * @param array<string, mixed> $context Additional context data
     * @return void
     */
    public function debug(string $message, array $context = []): void;

    /**
     * Log an info message
     *
     * @param string $message The message to log
     * @param array<string, mixed> $context Additional context data
     * @return void
     */
    public function info(string $message, array $context = []): void;

    /**
     * Log a warning message
     *
     * @param string $message The message to log
     * @param array<string, mixed> $context Additional context data
     * @return void
     */
    public function warning(string $message, array $context = []): void;

    /**
     * Log an error message
     *
     * @param string $message The message to log
     * @param array<string, mixed> $context Additional context data
     * @return void
     */
    public function error(string $message, array $context = []): void;

    /**
     * Log a message at the specified level
     *
     * @param string $level Log level (debug, info, warning, error)
     * @param string $message The message to log
     * @param array<string, mixed> $context Additional context data
     * @return void
     */
    public function log(string $level, string $message, array $context = []): void;
}
