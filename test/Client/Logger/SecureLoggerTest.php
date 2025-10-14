<?php
/**
 * SecureLoggerTest
 * PHP version 8.1
 *
 * @category Class
 * @package  BhrSdk\Test\Client\Logger
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */

namespace BhrSdk\Test\Client\Logger;

use BhrSdk\Client\Logger\SecureLogger;
use PHPUnit\Framework\TestCase;

/**
 * SecureLoggerTest Class
 *
 * @category Class
 * @package  BhrSdk\Test\Client\Logger
 * @author   BambooHR
 * @link     https://www.bamboohr.com/api/documentation/
 */
class SecureLoggerTest extends TestCase
{
    private $outputStream;

    protected function setUp(): void
    {
        // Create a memory stream for testing
        $this->outputStream = fopen('php://memory', 'r+');
    }

    protected function tearDown(): void
    {
        if (is_resource($this->outputStream)) {
            fclose($this->outputStream);
        }
    }

    /**
     * Get output from the stream
     */
    private function getOutput(): string
    {
        rewind($this->outputStream);
        return stream_get_contents($this->outputStream);
    }

    /**
     * Test logger can be instantiated
     */
    public function testCanInstantiateLogger(): void
    {
        $logger = new SecureLogger();
        $this->assertInstanceOf(SecureLogger::class, $logger);
    }

    /**
     * Test logger is enabled by default
     */
    public function testLoggerIsEnabledByDefault(): void
    {
        $logger = new SecureLogger();
        $this->assertTrue($logger->isEnabled());
    }

    /**
     * Test logger can be disabled
     */
    public function testLoggerCanBeDisabled(): void
    {
        $logger = new SecureLogger(false);
        $this->assertFalse($logger->isEnabled());
    }

    /**
     * Test enable and disable methods
     */
    public function testEnableAndDisableMethods(): void
    {
        $logger = new SecureLogger();
        
        $logger->disable();
        $this->assertFalse($logger->isEnabled());
        
        $logger->enable();
        $this->assertTrue($logger->isEnabled());
    }

    /**
     * Test disabled logger produces no output
     */
    public function testDisabledLoggerProducesNoOutput(): void
    {
        $logger = new SecureLogger(false, 'info', $this->outputStream);
        $logger->info('This should not appear');
        
        $this->assertEmpty($this->getOutput());
    }

    /**
     * Test info level logging
     */
    public function testInfoLevelLogging(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        $logger->info('Test message');
        
        $output = $this->getOutput();
        $this->assertStringContainsString('INFO', $output);
        $this->assertStringContainsString('Test message', $output);
    }

    /**
     * Test debug level logging
     */
    public function testDebugLevelLogging(): void
    {
        $logger = new SecureLogger(true, 'debug', $this->outputStream);
        $logger->debug('Debug message');
        
        $output = $this->getOutput();
        $this->assertStringContainsString('DEBUG', $output);
        $this->assertStringContainsString('Debug message', $output);
    }

    /**
     * Test warning level logging
     */
    public function testWarningLevelLogging(): void
    {
        $logger = new SecureLogger(true, 'warning', $this->outputStream);
        $logger->warning('Warning message');
        
        $output = $this->getOutput();
        $this->assertStringContainsString('WARNING', $output);
        $this->assertStringContainsString('Warning message', $output);
    }

    /**
     * Test error level logging
     */
    public function testErrorLevelLogging(): void
    {
        $logger = new SecureLogger(true, 'error', $this->outputStream);
        $logger->error('Error message');
        
        $output = $this->getOutput();
        $this->assertStringContainsString('ERROR', $output);
        $this->assertStringContainsString('Error message', $output);
    }

    /**
     * Test log level filtering
     */
    public function testLogLevelFiltering(): void
    {
        $logger = new SecureLogger(true, 'warning', $this->outputStream);
        
        $logger->debug('Debug should not appear');
        $logger->info('Info should not appear');
        $logger->warning('Warning should appear');
        $logger->error('Error should appear');
        
        $output = $this->getOutput();
        $this->assertStringNotContainsString('Debug', $output);
        $this->assertStringNotContainsString('Info', $output);
        $this->assertStringContainsString('Warning', $output);
        $this->assertStringContainsString('Error', $output);
    }

    /**
     * Test API key redaction in context
     */
    public function testApiKeyRedactionInContext(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Authentication', [
            'api_key' => 'secret-api-key-12345',
            'company' => 'acme'
        ]);
        
        $output = $this->getOutput();
        $this->assertStringNotContainsString('secret-api-key-12345', $output);
        $this->assertStringContainsString('secr****2345', $output); // Shows partial masking
        $this->assertStringContainsString('acme', $output);
    }

    /**
     * Test password redaction in context
     */
    public function testPasswordRedactionInContext(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Login attempt', [
            'username' => 'john.doe',
            'password' => 'super-secret-password'
        ]);
        
        $output = $this->getOutput();
        $this->assertStringNotContainsString('super-secret-password', $output);
        $this->assertStringContainsString('supe****word', $output); // Partial masking
        $this->assertStringContainsString('john.doe', $output);
    }

    /**
     * Test OAuth token redaction
     */
    public function testOAuthTokenRedaction(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('OAuth config', [
            'access_token' => 'oauth-token-abcdef123456',
            'expires_in' => 3600
        ]);
        
        $output = $this->getOutput();
        $this->assertStringNotContainsString('oauth-token-abcdef123456', $output);
        $this->assertStringContainsString('oaut****3456', $output); // Partial masking
        $this->assertStringContainsString('3600', $output);
    }

    /**
     * Test long value masking
     */
    public function testLongValueMasking(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Authentication', [
            'api_key' => 'abcdefgh123456789xyz'
        ]);
        
        $output = $this->getOutput();
        // Should show first 4 and last 4 characters
        $this->assertStringContainsString('abcd****9xyz', $output);
    }

    /**
     * Test short value masking
     */
    public function testShortValueMasking(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Authentication', [
            'api_key' => 'short'
        ]);
        
        $output = $this->getOutput();
        $this->assertStringContainsString('[REDACTED]', $output);
        $this->assertStringNotContainsString('short', $output);
    }

    /**
     * Test nested array redaction
     */
    public function testNestedArrayRedaction(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Config', [
            'credentials' => [
                'api_key' => 'secret-key-123',
                'domain' => 'acme'
            ],
            'options' => [
                'timeout' => 30
            ]
        ]);
        
        $output = $this->getOutput();
        $this->assertStringNotContainsString('secret-key-123', $output);
        // The 'credentials' key itself is sensitive, so the whole object gets redacted
        $this->assertStringContainsString('[REDACTED_OBJECT]', $output);
        $this->assertStringContainsString('30', $output);
    }

    /**
     * Test Bearer token redaction in strings
     */
    public function testBearerTokenRedactionInStrings(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Authorization header', ['header' => 'Bearer abc123def456']);
        
        $output = $this->getOutput();
        // Bearer tokens are caught by string redaction pattern
        $this->assertStringContainsString('Bearer [REDACTED]', $output);
        $this->assertStringNotContainsString('abc123def456', $output);
    }

    /**
     * Test case-insensitive key detection
     */
    public function testCaseInsensitiveKeyDetection(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Test', [
            'API_KEY' => 'secret1',
            'Api_Key' => 'secret2',
            'apiKey' => 'secret3',
        ]);
        
        $output = $this->getOutput();
        $this->assertStringNotContainsString('secret1', $output);
        $this->assertStringNotContainsString('secret2', $output);
        $this->assertStringNotContainsString('secret3', $output);
    }

    /**
     * Test empty value handling
     */
    public function testEmptyValueHandling(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Test', [
            'api_key' => '',
            'token' => null
        ]);
        
        $output = $this->getOutput();
        $this->assertStringContainsString('[EMPTY]', $output);
    }

    /**
     * Test set and get log level
     */
    public function testSetAndGetLogLevel(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $this->assertEquals('info', $logger->getLogLevel());
        
        $logger->setLogLevel('debug');
        $this->assertEquals('debug', $logger->getLogLevel());
        
        $logger->setLogLevel('ERROR');
        $this->assertEquals('error', $logger->getLogLevel());
    }

    /**
     * Test log with context
     */
    public function testLogWithContext(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->log('info', 'Test message', ['key' => 'value']);
        
        $output = $this->getOutput();
        $this->assertStringContainsString('Test message', $output);
        $this->assertStringContainsString('key', $output);
        $this->assertStringContainsString('value', $output);
    }

    /**
     * Test multiple sensitive keys
     */
    public function testMultipleSensitiveKeys(): void
    {
        $logger = new SecureLogger(true, 'info', $this->outputStream);
        
        $logger->info('Multiple secrets', [
            'api_key' => 'key123',
            'password' => 'pass456',
            'token' => 'tok789',
            'secret' => 'sec000',
            'safe_value' => 'visible'
        ]);
        
        $output = $this->getOutput();
        $this->assertStringNotContainsString('key123', $output);
        $this->assertStringNotContainsString('pass456', $output);
        $this->assertStringNotContainsString('tok789', $output);
        $this->assertStringNotContainsString('sec000', $output);
        $this->assertStringContainsString('visible', $output);
    }
}
