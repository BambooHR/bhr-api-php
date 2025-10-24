<?php
/**
 * Example 2: OAuth with Automatic Token Refresh
 * 
 * This example demonstrates how to use OAuth authentication
 * with automatic token refresh capability in SDK v2.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// ============================================================================
// Token Storage (Use a database in production!)
// ============================================================================

class TokenStorage {
	private string $storageFile;
	
	public function __construct(string $storageFile = '/tmp/bamboo_tokens.json') {
		$this->storageFile = $storageFile;
	}
	
	public function getTokens(): ?array {
		if (!file_exists($this->storageFile)) {
			return null;
		}
		
		$data = json_decode(file_get_contents($this->storageFile), true);
		return $data;
	}
	
	public function saveTokens(string $accessToken, string $refreshToken, int $expiresIn = 3600): void {
		$data = [
			'access_token' => $accessToken,
			'refresh_token' => $refreshToken,
			'expires_at' => time() + $expiresIn,
			'expires_in' => $expiresIn,
			'updated_at' => date('Y-m-d H:i:s')
		];
		
		file_put_contents($this->storageFile, json_encode($data, JSON_PRETTY_PRINT));
		echo "[TokenStorage] Tokens saved at " . date('H:i:s') . "\n";
	}
	
	public function getExpiresIn(): ?int {
		$tokens = $this->getTokens();
		if (!$tokens || !isset($tokens['expires_at'])) {
			return null;
		}
		
		return max(0, $tokens['expires_at'] - time());
	}
}

// ============================================================================
// OAuth Client with Auto-Refresh
// ============================================================================

function createOAuthClient(TokenStorage $storage): ApiClient {
	$tokens = $storage->getTokens();
	
	if (!$tokens) {
		throw new Exception("No tokens found. Please run OAuth authorization flow first.");
	}
	
	$client = (new ApiClient())
		->withOAuthRefresh(
			accessToken: $tokens['access_token'],
			refreshToken: $tokens['refresh_token'],
			clientId: getenv('OAUTH_CLIENT_ID') ?: 'your_client_id',
			clientSecret: getenv('OAUTH_CLIENT_SECRET') ?: 'your_client_secret',
			expiresIn: $storage->getExpiresIn()
		)
		->onTokenRefresh(function ($newAccess, $newRefresh, $oldAccess, $oldRefresh) use ($storage) {
			// This callback is automatically triggered when tokens are refreshed
			echo "\n[OAuth] Token refresh triggered!\n";
			echo "  Old Access Token: " . substr($oldAccess, 0, 20) . "...\n";
			echo "  New Access Token: " . substr($newAccess, 0, 20) . "...\n";
			
			// Save new tokens to persistent storage
			$storage->saveTokens($newAccess, $newRefresh ?? $oldRefresh, 3600);
			
			// In production, you might also want to:
			// - Update session data
			// - Log the refresh event
			// - Notify monitoring systems
		})
		->forCompany(getenv('BAMBOO_COMPANY') ?: 'mycompany')
		->build();
	
	return $client;
}

// ============================================================================
// USAGE EXAMPLES
// ============================================================================

echo "=== OAuth with Auto-Refresh Example ===\n\n";

$storage = new TokenStorage();

// For this example, let's simulate having tokens
// In production, these would come from your OAuth authorization flow
$exampleTokens = [
	'access_token' => 'mock_access_token_' . bin2hex(random_bytes(16)),
	'refresh_token' => 'mock_refresh_token_' . bin2hex(random_bytes(16)),
	'expires_at' => time() + 3600,
	'expires_in' => 3600
];
$storage->saveTokens(
	$exampleTokens['access_token'],
	$exampleTokens['refresh_token'],
	3600
);

try {
	// Create client with OAuth and auto-refresh
	$client = createOAuthClient($storage);
	
	echo "Client created successfully with OAuth authentication\n";
	echo "Token expires in: " . $storage->getExpiresIn() . " seconds\n\n";
	
	// Now use the client for API calls
	// If the token is expired or about to expire, it will be automatically refreshed
	$employeesApi = $client->employees();
	
	echo "Making API request...\n";
	// $directory = $employeesApi->getEmployeesDirectory();
	// The SDK will automatically:
	// 1. Check if token needs refresh (within 5 min of expiry)
	// 2. Refresh the token if needed
	// 3. Retry the request with new token
	// 4. Call your onTokenRefresh callback with new tokens
	
	echo "\n✓ Token refresh is configured and will happen automatically!\n";
	
} catch (ApiException $e) {
	echo "API Error [{$e->getCode()}]: {$e->getMessage()}\n";
	
	if ($e->getCode() === 401) {
		echo "\nAuthentication failed. Token may be invalid.\n";
		echo "You may need to re-authorize the OAuth application.\n";
	}
	
} catch (Exception $e) {
	echo "Error: {$e->getMessage()}\n";
}

// ============================================================================
// PRODUCTION EXAMPLE: Database-Backed Token Storage
// ============================================================================

echo "\n\n=== Production Token Storage Example ===\n\n";
echo "In production, use a database instead of files:\n\n";

echo <<<'PHP'
class DatabaseTokenStorage {
    private PDO $pdo;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    public function getTokens(string $userId): ?array {
        $stmt = $this->pdo->prepare('
            SELECT access_token, refresh_token, 
                   UNIX_TIMESTAMP(expires_at) - UNIX_TIMESTAMP() as expires_in
            FROM oauth_tokens
            WHERE user_id = ? AND expires_at > NOW()
        ');
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    
    public function saveTokens(string $userId, string $access, string $refresh, int $expiresIn): void {
        $stmt = $this->pdo->prepare('
            INSERT INTO oauth_tokens (user_id, access_token, refresh_token, expires_at)
            VALUES (?, ?, ?, DATE_ADD(NOW(), INTERVAL ? SECOND))
            ON DUPLICATE KEY UPDATE
                access_token = VALUES(access_token),
                refresh_token = VALUES(refresh_token),
                expires_at = VALUES(expires_at),
                updated_at = NOW()
        ');
        $stmt->execute([$userId, $access, $refresh, $expiresIn]);
    }
}

// Usage with database storage
$storage = new DatabaseTokenStorage($pdo);
$tokens = $storage->getTokens($userId);

$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: $tokens['access_token'],
        refreshToken: $tokens['refresh_token'],
        clientId: $_ENV['OAUTH_CLIENT_ID'],
        clientSecret: $_ENV['OAUTH_CLIENT_SECRET'],
        expiresIn: $tokens['expires_in']
    )
    ->onTokenRefresh(function ($newAccess, $newRefresh) use ($storage, $userId) {
        $storage->saveTokens($userId, $newAccess, $newRefresh, 3600);
    })
    ->forCompany($_ENV['BAMBOO_COMPANY'])
    ->build();
PHP;

echo "\n\n=== Key Benefits ===\n";
echo "✓ Automatic token refresh before expiration\n";
echo "✓ Retry failed requests with new tokens\n";
echo "✓ Callback for persisting refreshed tokens\n";
echo "✓ No manual token management needed\n";
echo "✓ Seamless user experience\n";
