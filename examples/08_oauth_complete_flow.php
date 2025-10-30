<?php
/**
 * Example 8: Complete OAuth 2.0 Flow
 *
 * This example demonstrates a complete OAuth 2.0 implementation with:
 * - Authorization URL generation
 * - Token exchange
 * - Automatic token refresh
 * - Secure token storage
 * - Production-ready patterns
 *
 * This is a more advanced example. For simpler OAuth, see example 02.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// ============================================================================
// CONFIGURATION
// ============================================================================

// OAuth credentials (get these from BambooHR)
$oauthClientId = getenv('OAUTH_CLIENT_ID') ?: 'your_client_id';
$oauthClientSecret = getenv('OAUTH_CLIENT_SECRET') ?: 'your_client_secret';
$redirectUri = getenv('OAUTH_REDIRECT_URI') ?: 'http://localhost:8000/callback';

echo "=== Complete OAuth 2.0 Flow Example ===\n\n";

// ============================================================================
// TOKEN STORAGE (Production-Ready)
// ============================================================================

/**
 * Secure token storage with encryption
 * In production, use a database instead of files
 */
class SecureTokenStorage {
	private string $storageFile;
	private string $encryptionKey;

	public function __construct(string $storageFile, string $encryptionKey) {
		$this->storageFile = $storageFile;
		$this->encryptionKey = $encryptionKey;
	}

	public function saveTokens(string $userId, array $tokens): void {
		$data = [
			'user_id' => $userId,
			'access_token' => $this->encrypt($tokens['access_token']),
			'refresh_token' => $this->encrypt($tokens['refresh_token']),
			'expires_at' => time() + ($tokens['expires_in'] ?? 3600),
			'company_subdomain' => $tokens['company'] ?? '',
			'updated_at' => date('Y-m-d H:i:s'),
		];

		// Load existing tokens
		$allTokens = $this->loadAllTokens();
		$allTokens[$userId] = $data;

		// Save back
		file_put_contents(
			$this->storageFile,
			json_encode($allTokens, JSON_PRETTY_PRINT)
		);

		echo "[TokenStorage] Tokens saved for user {$userId}\n";
	}

	public function getTokens(string $userId): ?array {
		$allTokens = $this->loadAllTokens();

		if (!isset($allTokens[$userId])) {
			return null;
		}

		$data = $allTokens[$userId];

		// Check if expired
		if ($data['expires_at'] < time()) {
			echo "[TokenStorage] Tokens expired for user {$userId}\n";
			return null;
		}

		return [
			'access_token' => $this->decrypt($data['access_token']),
			'refresh_token' => $this->decrypt($data['refresh_token']),
			'expires_in' => max(0, $data['expires_at'] - time()),
			'company' => $data['company_subdomain'] ?? '',
		];
	}

	private function loadAllTokens(): array {
		if (!file_exists($this->storageFile)) {
			return [];
		}

		$content = file_get_contents($this->storageFile);
		return json_decode($content, true) ?: [];
	}

	private function encrypt(string $data): string {
		// Simple XOR encryption for demo purposes
		// In production, use openssl_encrypt() or libsodium:
		// $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
		// $encrypted = openssl_encrypt($data, 'aes-256-cbc', $this->encryptionKey, 0, $iv);
		// return base64_encode($iv . $encrypted);

		$key = $this->encryptionKey;
		$encrypted = '';
		$keyLength = strlen($key);

		for ($i = 0; $i < strlen($data); $i++) {
			$encrypted .= chr(ord($data[$i]) ^ ord($key[$i % $keyLength]));
		}

		return base64_encode($encrypted);
	}

	private function decrypt(string $data): string {
		$encrypted = base64_decode($data);
		$key = $this->encryptionKey;
		$decrypted = '';
		$keyLength = strlen($key);

		for ($i = 0; $i < strlen($encrypted); $i++) {
			$decrypted .= chr(ord($encrypted[$i]) ^ ord($key[$i % $keyLength]));
		}

		return $decrypted;
	}
}

// Initialize storage
$storage = new SecureTokenStorage(
	'/tmp/bamboo_oauth_tokens.json',
	getenv('ENCRYPTION_KEY') ?: 'change_this_in_production'
);

// ============================================================================
// STEP 1: AUTHORIZATION URL GENERATION
// ============================================================================

/**
 * Generate the authorization URL to redirect users to
 */
function generateAuthorizationUrl(string $clientId, string $redirectUri, string $company): array {
	// Generate random state for CSRF protection
	$state = bin2hex(random_bytes(16));

	// Store state in session (in production)
	// $_SESSION['oauth_state'] = $state;

	// Build authorization URL parameters
	$params = http_build_query([
		'client_id' => $clientId,
		'redirect_uri' => $redirectUri,
		'response_type' => 'code',
		'request' => 'authorize',
		'state' => $state,
	]);

	// Note: Authorization URL requires the company subdomain
	$authUrl = "https://{$company}.bamboohr.com/authorize.php?{$params}";

	return [
		'url' => $authUrl,
		'state' => $state,
	];
}

echo "Step 1: Generate Authorization URL\n";
echo str_repeat('-', 70) . "\n\n";

$company = 'demo';  // User's BambooHR company subdomain
$authData = generateAuthorizationUrl($oauthClientId, $redirectUri, $company);

echo "Authorization URL:\n{$authData['url']}\n\n";
echo "State (for CSRF protection): {$authData['state']}\n\n";
echo "In production:\n";
echo "  1. Save state to session\n";
echo "  2. Redirect user to authorization URL\n";
echo "  3. User logs in and grants permission\n";
echo "  4. BambooHR redirects back to your callback\n\n";

// ============================================================================
// STEP 2: TOKEN EXCHANGE
// ============================================================================

/**
 * Exchange authorization code for access token
 */
function exchangeCodeForTokens(
	string $code,
	string $clientId,
	string $clientSecret,
	string $redirectUri,
	string $company
): array {
	// Note: Token URL requires the company subdomain
	$tokenUrl = "https://{$company}.bamboohr.com/token.php";

	$ch = curl_init($tokenUrl);

	curl_setopt_array($ch, [
		CURLOPT_POST => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
		CURLOPT_POSTFIELDS => http_build_query([
			'grant_type' => 'authorization_code',
			'code' => $code,
			'redirect_uri' => $redirectUri,
			'client_id' => $clientId,
			'client_secret' => $clientSecret,
			'request' => 'token',
		]),
	]);

	$response = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	if ($httpCode !== 200) {
		throw new Exception("Token exchange failed: {$response}");
	}

	return json_decode($response, true);
}

echo "Step 2: Token Exchange (Callback Handler)\n";
echo str_repeat('-', 70) . "\n\n";

echo "When BambooHR redirects back to your callback URL:\n\n";
echo "<?php\n";
echo "// In your callback handler (e.g., /oauth/callback)\n";
echo "\$code = \$_GET['code'] ?? null;\n";
echo "\$state = \$_GET['state'] ?? null;\n\n";
echo "// Verify state matches (CSRF protection)\n";
echo "if (\$state !== \$_SESSION['oauth_state']) {\n";
echo "    die('Invalid state parameter');\n";
echo "}\n\n";
echo "// Exchange code for tokens\n";
echo "\$tokens = exchangeCodeForTokens(\n";
echo "    \$code,\n";
echo "    \$clientId,\n";
echo "    \$clientSecret,\n";
echo "    \$redirectUri,\n";
echo "    \$company  // User's company subdomain\n";
echo ");\n\n";
echo "// Save tokens for the user\n";
echo "\$storage->saveTokens(\$userId, \$tokens);\n";
echo "?>\n\n";

// For demonstration, simulate having tokens
$mockTokens = [
	'access_token' => 'mock_access_token_' . bin2hex(random_bytes(16)),
	'refresh_token' => 'mock_refresh_token_' . bin2hex(random_bytes(16)),
	'expires_in' => 3600,
	'company' => 'demo',
];

$userId = 'demo_user';
$storage->saveTokens($userId, $mockTokens);

echo "✓ Tokens exchanged and saved\n\n";

// ============================================================================
// STEP 3: USING THE SDK WITH OAUTH
// ============================================================================

echo "Step 3: Using the SDK with OAuth\n";
echo str_repeat('-', 70) . "\n\n";

try {
	// Retrieve user's tokens
	$tokens = $storage->getTokens($userId);

	if (!$tokens) {
		throw new Exception('No valid tokens found. User needs to re-authorize.');
	}

	echo "Retrieved tokens from storage\n";
	echo "  Access token: " . substr($tokens['access_token'], 0, 20) . "...\n";
	echo "  Expires in: {$tokens['expires_in']} seconds\n\n";

	// Create client with automatic token refresh
	$client = (new ApiClient())
		->withOAuthRefresh(
			accessToken: $tokens['access_token'],
			refreshToken: $tokens['refresh_token'],
			clientId: $oauthClientId,
			clientSecret: $oauthClientSecret,
			expiresIn: $tokens['expires_in']
		)
		->onTokenRefresh(function ($newAccess, $newRefresh, $oldAccess, $oldRefresh) use ($storage, $userId, $tokens) {
			echo "\n[OAuth] Token refresh triggered!\n";
			echo "  Old token: " . substr($oldAccess, 0, 20) . "...\n";
			echo "  New token: " . substr($newAccess, 0, 20) . "...\n";

			// Save new tokens
			$storage->saveTokens($userId, [
				'access_token' => $newAccess,
				'refresh_token' => $newRefresh ?? $oldRefresh,
				'expires_in' => 3600,
				'company' => $tokens['company'],
			]);

			echo "  ✓ New tokens saved\n\n";
		})
		->forCompany($tokens['company'])
		->build();

	echo "✓ API client created with automatic token refresh\n\n";

	// Make API calls - tokens will refresh automatically if needed
	echo "Making API calls...\n";

	// Note: These will fail with mock tokens, but show the pattern
	// $employeesApi = $client->employees();
	// $directory = $employeesApi->getEmployeesDirectory();

	echo "  The SDK will automatically:\n";
	echo "    1. Check if token needs refresh (within 5 min of expiry)\n";
	echo "    2. Refresh the token if needed\n";
	echo "    3. Retry failed requests with new token\n";
	echo "    4. Call your onTokenRefresh callback\n\n";

} catch (Exception $e) {
	echo "Error: {$e->getMessage()}\n";
}

// ============================================================================
// STEP 4: TOKEN REFRESH (Manual)
// ============================================================================

/**
 * Manually refresh an OAuth token
 */
function refreshOAuthToken(
	string $refreshToken,
	string $clientId,
	string $clientSecret,
	string $company
): array {
	// Note: Token URL requires the company subdomain
	$tokenUrl = "https://{$company}.bamboohr.com/token.php";

	$ch = curl_init($tokenUrl);

	curl_setopt_array($ch, [
		CURLOPT_POST => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
		CURLOPT_POSTFIELDS => http_build_query([
			'grant_type' => 'refresh_token',
			'refresh_token' => $refreshToken,
			'client_id' => $clientId,
			'client_secret' => $clientSecret,
			'request' => 'token',
		]),
	]);

	$response = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	if ($httpCode !== 200) {
		throw new Exception("Token refresh failed: {$response}");
	}

	return json_decode($response, true);
}

echo "Step 4: Manual Token Refresh (if needed)\n";
echo str_repeat('-', 70) . "\n\n";

echo "If you need to manually refresh a token:\n\n";
echo "<?php\n";
echo "try {\n";
echo "    \$newTokens = refreshOAuthToken(\n";
echo "        \$oldRefreshToken,\n";
echo "        \$clientId,\n";
echo "        \$clientSecret,\n";
echo "        \$company  // User's company subdomain\n";
echo "    );\n";
echo "    \n";
echo "    \$storage->saveTokens(\$userId, \$newTokens);\n";
echo "    echo 'Tokens refreshed successfully';\n";
echo "    \n";
echo "} catch (Exception \$e) {\n";
echo "    echo 'Refresh failed: ' . \$e->getMessage();\n";
echo "    // User needs to re-authorize\n";
echo "}\n";
echo "?>\n\n";

// ============================================================================
// STEP 5: PRODUCTION CONSIDERATIONS
// ============================================================================

echo "\nStep 5: Production Considerations\n";
echo str_repeat('-', 70) . "\n\n";

echo "Security Best Practices:\n\n";
echo "1. Token Storage:\n";
echo "   ✓ Use encrypted database, not files\n";
echo "   ✓ Never store tokens in session or cookies\n";
echo "   ✓ Use proper encryption (not base64)\n";
echo "   ✓ Set appropriate database permissions\n\n";

echo "2. CSRF Protection:\n";
echo "   ✓ Generate random state parameter\n";
echo "   ✓ Store state in session\n";
echo "   ✓ Verify state on callback\n";
echo "   ✓ Use cryptographically secure random\n\n";

echo "3. Redirect URI Security:\n";
echo "   ✓ Use HTTPS only (never HTTP)\n";
echo "   ✓ Register exact URIs with BambooHR\n";
echo "   ✓ Validate redirect URI on callback\n";
echo "   ✓ No wildcard matching\n\n";

echo "4. Error Handling:\n";
echo "   ✓ Handle authorization denial\n";
echo "   ✓ Handle token expiration\n";
echo "   ✓ Handle network failures\n";
echo "   ✓ Log errors for debugging\n\n";

echo "5. Token Management:\n";
echo "   ✓ Monitor token refresh failures\n";
echo "   ✓ Alert on suspicious activity\n";
echo "   ✓ Implement token revocation\n";
echo "   ✓ Clean up expired tokens\n\n";

// ============================================================================
// EXAMPLE: PRODUCTION-READY DATABASE STORAGE
// ============================================================================

echo "Example: Production Database Storage\n";
echo str_repeat('-', 70) . "\n\n";

echo "<?php\n";
echo "class DatabaseTokenStorage\n";
echo "{\n";
echo "    private PDO \$pdo;\n";
echo "    private string \$encryptionKey;\n";
echo "    \n";
echo "    public function saveTokens(string \$userId, array \$tokens): void\n";
echo "    {\n";
echo "        \$stmt = \$this->pdo->prepare('\n";
echo "            INSERT INTO oauth_tokens \n";
echo "            (user_id, access_token, refresh_token, expires_at, company, updated_at)\n";
echo "            VALUES (:user_id, :access_token, :refresh_token, :expires_at, :company, NOW())\n";
echo "            ON DUPLICATE KEY UPDATE\n";
echo "                access_token = VALUES(access_token),\n";
echo "                refresh_token = VALUES(refresh_token),\n";
echo "                expires_at = VALUES(expires_at),\n";
echo "                updated_at = NOW()\n";
echo "        ');\n";
echo "        \n";
echo "        \$stmt->execute([\n";
echo "            'user_id' => \$userId,\n";
echo "            'access_token' => \$this->encrypt(\$tokens['access_token']),\n";
echo "            'refresh_token' => \$this->encrypt(\$tokens['refresh_token']),\n";
echo "            'expires_at' => date('Y-m-d H:i:s', time() + \$tokens['expires_in']),\n";
echo "            'company' => \$tokens['company'],\n";
echo "        ]);\n";
echo "    }\n";
echo "    \n";
echo "    public function getTokens(string \$userId): ?array\n";
echo "    {\n";
echo "        \$stmt = \$this->pdo->prepare('\n";
echo "            SELECT access_token, refresh_token, \n";
echo "                   UNIX_TIMESTAMP(expires_at) - UNIX_TIMESTAMP() as expires_in,\n";
echo "                   company\n";
echo "            FROM oauth_tokens\n";
echo "            WHERE user_id = :user_id AND expires_at > NOW()\n";
echo "        ');\n";
echo "        \n";
echo "        \$stmt->execute(['user_id' => \$userId]);\n";
echo "        \$row = \$stmt->fetch(PDO::FETCH_ASSOC);\n";
echo "        \n";
echo "        if (!\$row) {\n";
echo "            return null;\n";
echo "        }\n";
echo "        \n";
echo "        return [\n";
echo "            'access_token' => \$this->decrypt(\$row['access_token']),\n";
echo "            'refresh_token' => \$this->decrypt(\$row['refresh_token']),\n";
echo "            'expires_in' => max(0, (int)\$row['expires_in']),\n";
echo "            'company' => \$row['company'],\n";
echo "        ];\n";
echo "    }\n";
echo "}\n";
echo "?>\n\n";

// ============================================================================
// SUMMARY
// ============================================================================

echo "\n=== Summary ===\n\n";

echo "OAuth Flow Completed:\n";
echo "  ✓ Step 1: Generated authorization URL\n";
echo "  ✓ Step 2: Exchanged code for tokens\n";
echo "  ✓ Step 3: Created SDK client with auto-refresh\n";
echo "  ✓ Step 4: Understood manual token refresh\n";
echo "  ✓ Step 5: Reviewed production considerations\n\n";

echo "Next Steps:\n";
echo "  1. Register your OAuth app with BambooHR\n";
echo "  2. Implement the authorization flow in your app\n";
echo "  3. Set up secure database token storage\n";
echo "  4. Test the complete flow end-to-end\n";
echo "  5. Monitor token refresh events\n\n";

echo "Resources:\n";
echo "  • AUTHENTICATION.md - Detailed OAuth guide\n";
echo "  • examples/02_oauth_with_auto_refresh.php - Simpler OAuth example\n";
echo "  • BambooHR OAuth Docs: https://documentation.bamboohr.com/docs/getting-started\n\n";
