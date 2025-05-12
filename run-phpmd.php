#!/usr/bin/env php
<?php

/**
 * PHPMD wrapper script that suppresses deprecated warnings
 * 
 * This script sets the error reporting level to exclude E_DEPRECATED warnings
 * before running PHPMD, allowing for cleaner output in quality checks.
 */

// Get the arguments passed to this script
$args = array_slice($argv, 1);

// Build the command with error_reporting directive
$phpmdPath = __DIR__ . '/vendor/bin/phpmd';
$command = 'php -d error_reporting=' . (E_ALL & ~E_DEPRECATED) . ' ' . 
           escapeshellarg($phpmdPath) . ' ' . 
           implode(' ', array_map('escapeshellarg', $args));

// Execute PHPMD with the arguments
$exitCode = 0;
system($command, $exitCode);

// Return the same exit code as PHPMD
exit($exitCode);
