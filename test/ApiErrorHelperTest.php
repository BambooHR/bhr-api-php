<?php

/**
 * ApiErrorHelperTest
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Test;

use BhrSdk\ApiErrorHelper;
use PHPUnit\Framework\TestCase;

/**
 * ApiErrorHelperTest Class Doc Comment
 *
 * @category Class
 * @package  BhrSdk
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class ApiErrorHelperTest extends TestCase {
	/**
	 * Setup before running any test cases
	 */
	public static function setUpBeforeClass(): void {
	}

	/**
	 * Setup before running each test case
	 */
	public function setUp(): void {
	}

	/**
	 * Clean up after running each test case
	 */
	public function tearDown(): void {
	}

	/**
	 * Clean up after running all test cases
	 */
	public static function tearDownAfterClass(): void {
	}

	/**
	 * Test formatErrorMessage with a 401 status code
	 */
	public function testFormatErrorMessage401() {
		$code = 12345;
		$baseMessage = "Authentication error";
		$statusCode = 401;

		$formattedMessage = ApiErrorHelper::formatErrorMessage($code, $baseMessage, $statusCode);

		// Check that the message contains the base message
		$this->assertStringContainsString("[{$code}] {$baseMessage}. HTTP status code: {$statusCode}", $formattedMessage);

		// Check that the message contains the title for 401 errors
		$this->assertStringContainsString("Authentication failed. This could be due to:", $formattedMessage);

		// Check that the message contains at least one cause
		$this->assertStringContainsString("Invalid API key or password", $formattedMessage);

		// Check that the message contains at least one tip
		$this->assertStringContainsString("Verify your API key and subdomain are correct", $formattedMessage);
	}

	/**
	 * Test formatErrorMessage with a 404 status code
	 */
	public function testFormatErrorMessage404() {
		$code = 67890;
		$baseMessage = "Resource not found";
		$statusCode = 404;

		$formattedMessage = ApiErrorHelper::formatErrorMessage($code, $baseMessage, $statusCode);

		// Check that the message contains the base message
		$this->assertStringContainsString("[{$code}] {$baseMessage}. HTTP status code: {$statusCode}", $formattedMessage);

		// Check that the message contains the title for 404 errors
		$this->assertStringContainsString("Resource not found. This could be due to:", $formattedMessage);

		// Check that the message contains at least one cause
		$this->assertStringContainsString("The requested resource does not exist", $formattedMessage);

		// Check that the message contains at least one tip
		$this->assertStringContainsString("Verify the resource ID or path is correct", $formattedMessage);
	}

	/**
	 * Test formatErrorMessage with a 500 status code
	 */
	public function testFormatErrorMessage500() {
		$code = 54321;
		$baseMessage = "Internal server error";
		$statusCode = 500;

		$formattedMessage = ApiErrorHelper::formatErrorMessage($code, $baseMessage, $statusCode);

		// Check that the message contains the base message
		$this->assertStringContainsString("[{$code}] {$baseMessage}. HTTP status code: {$statusCode}", $formattedMessage);

		// Check that the message contains the title for 500 errors
		$this->assertStringContainsString("Internal server error. This could be due to:", $formattedMessage);

		// Check that the message contains at least one cause
		$this->assertStringContainsString("Unexpected condition on the server", $formattedMessage);

		// Check that the message contains at least one tip
		$this->assertStringContainsString("Retry the request after a short delay", $formattedMessage);
	}

	/**
	 * Test formatErrorMessage with an unknown status code
	 */
	public function testFormatErrorMessageUnknownStatusCode() {
		$code = 99999;
		$baseMessage = "Unknown error";
		$statusCode = 599; // A status code that doesn't exist in the ERROR_MESSAGES array

		$formattedMessage = ApiErrorHelper::formatErrorMessage($code, $baseMessage, $statusCode);

		// For unknown status codes, only the base message should be returned without additional context
		$this->assertEquals("[{$code}] {$baseMessage}. HTTP status code: {$statusCode}", $formattedMessage);

		// The message should not contain any of the standard parts like "This could be due to:"
		$this->assertStringNotContainsString("This could be due to:", $formattedMessage);
	}
}
