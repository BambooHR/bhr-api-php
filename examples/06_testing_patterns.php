<?php
/**
 * Example 6: Testing Patterns for SDK v2
 * 
 * This example demonstrates how to write testable code
 * using the BambooHR SDK v2 and common testing patterns.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// ============================================================================
// PATTERN 1: Dependency Injection
// ============================================================================

echo "=== Testing Pattern 1: Dependency Injection ===\n\n";

/**
 * Good: Injectable ApiClient for easy mocking
 */
class EmployeeService {
	private ApiClient $client;
	
	public function __construct(ApiClient $client) {
		$this->client = $client;
	}
	
	public function getEmployeeName(string $employeeId): string {
		$employeesApi = $this->client->employees();
		$employee = $employeesApi->getEmployee('firstName,lastName', $employeeId);
		
		return ($employee['firstName'] ?? '') . ' ' . ($employee['lastName'] ?? '');
	}
	
	public function isEmployeeActive(string $employeeId): bool {
		try {
			$employeesApi = $this->client->employees();
			$employee = $employeesApi->getEmployee('status', $employeeId);
			return ($employee['status'] ?? '') === 'Active';
		} catch (ApiException $e) {
			if ($e->getCode() === 404) {
				return false;
			}
			throw $e;
		}
	}
}

echo "✓ Service uses constructor injection for testability\n";
echo "✓ Easy to mock ApiClient in tests\n";
echo "✓ No global state or static dependencies\n\n";

echo "Example PHPUnit Test:\n";
echo <<<'PHP'
class EmployeeServiceTest extends TestCase {
    public function testGetEmployeeName(): void {
        // Create mock client
        $mockClient = $this->createMock(ApiClient::class);
        $mockEmployeesApi = $this->createMock(EmployeesApi::class);
        
        // Setup expectations
        $mockEmployee = $this->createMock(Employee::class);
        $mockEmployee->method('getFirstName')->willReturn('John');
        $mockEmployee->method('getLastName')->willReturn('Doe');
        
        $mockEmployeesApi->expects($this->once())
            ->method('getEmployee')
            ->with('firstName,lastName', '123')
            ->willReturn($mockEmployee);
        
        $mockClient->method('employees')->willReturn($mockEmployeesApi);
        
        // Test
        $service = new EmployeeService($mockClient);
        $name = $service->getEmployeeName('123');
        
        $this->assertEquals('John Doe', $name);
    }
    
    public function testIsEmployeeActiveReturnsFalseFor404(): void {
        $mockClient = $this->createMock(ApiClient::class);
        $mockEmployeesApi = $this->createMock(EmployeesApi::class);
        
        $mockEmployeesApi->method('getEmployee')
            ->willThrowException(new ApiException('Not found', 404));
        
        $mockClient->method('employees')->willReturn($mockEmployeesApi);
        
        $service = new EmployeeService($mockClient);
        $isActive = $service->isEmployeeActive('999');
        
        $this->assertFalse($isActive);
    }
}

PHP;

// ============================================================================
// PATTERN 2: Interface-Based Design
// ============================================================================

echo "\n\n=== Testing Pattern 2: Interface-Based Design ===\n\n";

/**
 * Define an interface for your BambooHR operations
 */
interface BambooHRServiceInterface {
	public function getEmployee(string $id): array;
	public function updateEmployee(string $id, array $data): void;
	public function getDirectory(): array;
}

/**
 * Real implementation using SDK
 */
class BambooHRService implements BambooHRServiceInterface {
	private ApiClient $client;
	
	public function __construct(ApiClient $client) {
		$this->client = $client;
	}
	
	public function getEmployee(string $id): array {
		$employeesApi = $this->client->employees();
		$employee = $employeesApi->getEmployee('firstName,lastName,workEmail', $id);
		
		return [
			'id' => $id,
			'firstName' => $employee['firstName'] ?? '',
			'lastName' => $employee['lastName'] ?? '',
			'email' => $employee['workEmail'] ?? ''
		];
	}
	
	public function updateEmployee(string $id, array $data): void {
		$employeesApi = $this->client->employees();
		$request = new \BhrSdk\Model\EmployeeUpdateRequest($data);
		$employeesApi->updateEmployee($id, $request);
	}
	
	public function getDirectory(): array {
		$employeesApi = $this->client->employees();
		$directory = $employeesApi->getEmployeesDirectory();
		
		$employees = [];
		// Use array access since SDK model may be incomplete
		$directoryEmployees = $directory['employees'] ?? [];
		foreach ($directoryEmployees as $employee) {
			$employees[] = [
				'id' => $employee['id'] ?? $employee->id ?? '',
				'name' => $employee['displayName'] ?? $employee->displayName ?? ''
			];
		}
		
		return $employees;
	}
}

/**
 * Mock implementation for testing
 */
class MockBambooHRService implements BambooHRServiceInterface {
	private array $employees = [
		'123' => [
			'id' => '123',
			'firstName' => 'John',
			'lastName' => 'Doe',
			'email' => 'john@example.com'
		]
	];
	
	public function getEmployee(string $id): array {
		if (!isset($this->employees[$id])) {
			throw new \Exception("Employee not found", 404);
		}
		return $this->employees[$id];
	}
	
	public function updateEmployee(string $id, array $data): void {
		if (!isset($this->employees[$id])) {
			throw new \Exception("Employee not found", 404);
		}
		$this->employees[$id] = array_merge($this->employees[$id], $data);
	}
	
	public function getDirectory(): array {
		return array_values($this->employees);
	}
}

echo "✓ Interface allows easy swapping of implementations\n";
echo "✓ Mock implementation for fast unit tests\n";
echo "✓ Real implementation for integration tests\n\n";

echo "Example Usage in Tests:\n";
echo <<<'PHP'
class EmployeeControllerTest extends TestCase {
    public function testShowEmployee(): void {
        // Use mock service for fast unit test
        $mockService = new MockBambooHRService();
        $controller = new EmployeeController($mockService);
        
        $response = $controller->show('123');
        
        $this->assertEquals('John', $response['firstName']);
    }
}

class EmployeeControllerIntegrationTest extends TestCase {
    public function testShowEmployeeIntegration(): void {
        // Use real service for integration test
        $client = $this->createConfiguredClient();
        $realService = new BambooHRService($client);
        $controller = new EmployeeController($realService);
        
        $response = $controller->show('123');
        
        $this->assertArrayHasKey('firstName', $response);
    }
}

PHP;

// ============================================================================
// PATTERN 3: Test Fixtures and Factories
// ============================================================================

echo "\n\n=== Testing Pattern 3: Test Fixtures and Factories ===\n\n";

/**
 * Factory for creating test ApiClient instances
 */
class ApiClientFactory {
	public static function createForTesting(): ApiClient {
		return (new ApiClient())
			->withApiKey('test_api_key')
			->forCompany('testcompany')
			->build();
	}
	
	public static function createWithOAuthForTesting(): ApiClient {
		return (new ApiClient())
			->withOAuthRefresh(
				accessToken: 'test_access_token',
				refreshToken: 'test_refresh_token',
				clientId: 'test_client_id',
				clientSecret: 'test_client_secret',
				expiresIn: 3600
			)
			->forCompany('testcompany')
			->build();
	}
}

/**
 * Factory for creating test data
 */
class EmployeeFactory {
	public static function create(array $overrides = []): array {
		return array_merge([
			'id' => '123',
			'firstName' => 'Test',
			'lastName' => 'Employee',
			'workEmail' => 'test@example.com',
			'department' => 'Engineering',
			'jobTitle' => 'Developer',
			'hireDate' => '2024-01-15'
		], $overrides);
	}
	
	public static function createMultiple(int $count, array $overrides = []): array {
		$employees = [];
		for ($i = 1; $i <= $count; $i++) {
			$employees[] = self::create(array_merge([
				'id' => (string)$i,
				'firstName' => "Employee{$i}"
			], $overrides));
		}
		return $employees;
	}
}

echo "✓ Factories reduce test code duplication\n";
echo "✓ Easy to create test data with custom values\n";
echo "✓ Consistent test setup across test suite\n\n";

echo "Example Usage:\n";
echo <<<'PHP'
class EmployeeReportTest extends TestCase {
    public function testGenerateReport(): void {
        // Create test employees quickly
        $employees = EmployeeFactory::createMultiple(5, [
            'department' => 'Engineering'
        ]);
        
        // ... test logic
    }
    
    public function testNewHire(): void {
        $newHire = EmployeeFactory::create([
            'hireDate' => date('Y-m-d'),
            'status' => 'Active'
        ]);
        
        // ... test logic
    }
}

PHP;

// ============================================================================
// PATTERN 4: Integration Test Helpers
// ============================================================================

echo "\n\n=== Testing Pattern 4: Integration Test Helpers ===\n\n";

/**
 * Base class for integration tests
 */
abstract class BambooHRIntegrationTest {
	protected ApiClient $client;
	protected bool $skipIntegration = false;
	
	protected function setUp(): void {
		// Skip integration tests if no API key configured
		if (!getenv('BAMBOO_API_KEY')) {
			$this->skipIntegration = true;
			return;
		}
		
		$this->client = (new ApiClient())
			->withApiKey(getenv('BAMBOO_API_KEY'))
			->forCompany(getenv('BAMBOO_COMPANY') ?: 'testcompany')
			->build();
	}
	
	protected function skipIfNoApiKey(): void {
		if ($this->skipIntegration) {
			$this->markTestSkipped('Integration tests require BAMBOO_API_KEY environment variable');
		}
	}
	
	protected function createTestEmployee(array $data): string {
		// Helper to create test employee and clean up after test
		// ... implementation
		return '123'; // employee ID
	}
	
	protected function cleanupTestEmployee(string $id): void {
		// Helper to delete test employee after test
		// ... implementation
	}
}

echo "✓ Base class for integration tests\n";
echo "✓ Automatic test skipping without API key\n";
echo "✓ Helper methods for test data setup/teardown\n";
echo "✓ Shared configuration across integration tests\n\n";

echo "Example Usage:\n";
echo <<<'PHP'
class EmployeeApiIntegrationTest extends BambooHRIntegrationTest {
    public function testCreateAndUpdateEmployee(): void {
        $this->skipIfNoApiKey();
        
        // Create test employee
        $employeeId = $this->createTestEmployee([
            'firstName' => 'Integration',
            'lastName' => 'Test'
        ]);
        
        try {
            // Test update
            $employeesApi = $this->client->employees();
            $request = new EmployeeUpdateRequest(['jobTitle' => 'Tester']);
            $employeesApi->updateEmployee($employeeId, $request);
            
            // Verify
            $employee = $employeesApi->getEmployee('jobTitle', $employeeId);
            $this->assertEquals('Tester', $employee->getJobTitle());
            
        } finally {
            // Cleanup
            $this->cleanupTestEmployee($employeeId);
        }
    }
}

PHP;

// ============================================================================
// PATTERN 5: Testing OAuth Token Refresh
// ============================================================================

echo "\n\n=== Testing Pattern 5: Testing OAuth Token Refresh ===\n\n";

echo "Testing token refresh callbacks:\n\n";
echo <<<'PHP'
class OAuthTokenRefreshTest extends TestCase {
    public function testTokenRefreshCallbackInvoked(): void {
        $callbackInvoked = false;
        $capturedTokens = [];
        
        $callback = function ($newAccess, $newRefresh, $oldAccess, $oldRefresh) 
            use (&$callbackInvoked, &$capturedTokens) {
            $callbackInvoked = true;
            $capturedTokens = [
                'new_access' => $newAccess,
                'new_refresh' => $newRefresh,
                'old_access' => $oldAccess,
                'old_refresh' => $oldRefresh
            ];
        };
        
        // Create client with short expiry to trigger refresh
        $client = (new ApiClient())
            ->withOAuthRefresh(
                accessToken: 'old_token',
                refreshToken: 'refresh_token',
                clientId: 'test_client',
                clientSecret: 'test_secret',
                expiresIn: 1 // Expires in 1 second
            )
            ->onTokenRefresh($callback)
            ->forCompany('testcompany')
            ->build();
        
        // Wait for expiry
        sleep(2);
        
        // Make API call that should trigger refresh
        // ... (in real test, mock the HTTP response)
        
        $this->assertTrue($callbackInvoked);
        $this->assertNotEmpty($capturedTokens['new_access']);
    }
}

PHP;

// ============================================================================
// BEST PRACTICES SUMMARY
// ============================================================================

echo "\n" . str_repeat('=', 70) . "\n";
echo "TESTING BEST PRACTICES SUMMARY\n";
echo str_repeat('=', 70) . "\n\n";

echo "Unit Testing:\n";
echo "  ✓ Use dependency injection for ApiClient\n";
echo "  ✓ Mock SDK components (EmployeesApi, TimeOffApi, etc.)\n";
echo "  ✓ Test business logic independently of API calls\n";
echo "  ✓ Use factories for test data creation\n";
echo "  ✓ Focus on fast, isolated tests\n\n";

echo "Integration Testing:\n";
echo "  ✓ Create base test class with shared setup\n";
echo "  ✓ Skip tests when API credentials not available\n";
echo "  ✓ Clean up test data after each test\n";
echo "  ✓ Use separate test environment/sandbox\n";
echo "  ✓ Test real API interactions\n\n";

echo "OAuth Testing:\n";
echo "  ✓ Test token refresh callback invocation\n";
echo "  ✓ Test token expiration handling\n";
echo "  ✓ Test token storage/retrieval\n";
echo "  ✓ Mock OAuth server responses\n";
echo "  ✓ Verify error handling on refresh failure\n\n";

echo "Test Organization:\n";
echo "  ✓ Separate unit tests from integration tests\n";
echo "  ✓ Use interfaces for easy mocking\n";
echo "  ✓ Create reusable test fixtures\n";
echo "  ✓ Document test setup requirements\n";
echo "  ✓ Run fast tests frequently, slow tests on CI\n\n";

echo "Coverage Goals:\n";
echo "  → Unit tests: >80% code coverage\n";
echo "  → Integration tests: Critical paths and edge cases\n";
echo "  → OAuth tests: All token refresh scenarios\n";
echo "  → Error handling: All exception types\n";

echo "\n✓ Testing patterns guide complete!\n";
