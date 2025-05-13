<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BambooHR\SDK\BambooHRBuilder;
use BambooHR\SDK\Exception\AuthenticationException;
use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Exception\RateLimitException;
use Dotenv\Dotenv;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Required environment variables
$dotenv->required(['BAMBOOHR_COMPANY_DOMAIN', 'BAMBOOHR_CLIENT_ID', 'BAMBOOHR_CLIENT_SECRET']);

/**
 * Create a BambooHR client using environment variables.
 * 
 * @param bool $handleOAuthFlow Whether to handle the OAuth flow if no access token is provided
 * @return \BambooHR\SDK\BambooHRClient
 * @throws \Exception
 */
function createBambooHRClient($handleOAuthFlow = true) {
    $companyDomain = $_ENV['BAMBOOHR_COMPANY_DOMAIN'];
    $clientId = $_ENV['BAMBOOHR_CLIENT_ID'];
    $clientSecret = $_ENV['BAMBOOHR_CLIENT_SECRET'];
    $redirectUri = $_ENV['BAMBOOHR_REDIRECT_URI'] ?? 'https://oauth.pstmn.io/v1/callback';
    $baseDomain = $_ENV['BAMBOOHR_BASE_DOMAIN'] ?? 'bamboohr.com';
    $accessToken = $_ENV['BAMBOOHR_ACCESS_TOKEN'] ?? '';
    $refreshToken = $_ENV['BAMBOOHR_REFRESH_TOKEN'] ?? null;

    // Create a client using the builder pattern
    $builder = new BambooHRBuilder();
    $builder->withCompanyDomain($companyDomain)
        ->withBaseDomain($baseDomain)
        ->withOAuth($clientId, $clientSecret, $accessToken, $refreshToken)
        ->withTimeout(30);
    
    $client = $builder->build();

    // Handle OAuth flow if needed and requested
    if (empty($accessToken) && $handleOAuthFlow) {
        // Generate an authorization URL for the user to visit
        $authUrl = $client->getAuthorizationUrl([
            'redirect_uri' => $redirectUri,
            'scope' => 'employees employee_directory offline_access openid api',
            'state' => 'random_state_string'
        ]);

        echo "Visit this URL to authorize the application:\n{$authUrl}\n\n";
        echo "After authorizing, you will be redirected to your callback URL.\n";
        echo "The URL will look something like: $redirectUri?code=abc123&state=random_state_string\n";
        echo "Please copy the 'code' parameter value from the URL and paste it here:\n";
        $code = trim(fgets(STDIN));

        // Validate the code is not empty
        if (empty($code)) {
            throw new \Exception("Authorization code cannot be empty");
        }

        echo "\nAttempting to authenticate with the provided code...\n";

        // Authenticate with the code
        $client->authenticate('authorization_code', [
            'code' => $code,
            'redirect_uri' => $redirectUri
        ]);
        
        $accessToken = $client->getAuthentication()->getAccessToken();
        $refreshToken = $client->getAuthentication()->getRefreshToken();
        
        echo "Authentication successful!\n";
        echo "Access Token: {$accessToken}\n";
        echo "Refresh Token: {$refreshToken}\n";
        echo "\nAdd these tokens to your .env file to avoid re-authenticating:\n";
        echo "BAMBOOHR_ACCESS_TOKEN={$accessToken}\n";
        echo "BAMBOOHR_REFRESH_TOKEN={$refreshToken}\n\n";
    }

    return $client;
}

/**
 * Handle common exceptions from the BambooHR API.
 * 
 * @param \Throwable $e The exception to handle
 */
function handleException(\Throwable $e) {
    if ($e instanceof AuthenticationException) {
        echo "Authentication Error: " . $e->getMessage() . "\n";
    } elseif ($e instanceof NotFoundException) {
        echo "Not Found Error: " . $e->getMessage() . "\n";
    } elseif ($e instanceof RateLimitException) {
        echo "Rate Limit Error: " . $e->getMessage() . "\n";
        echo "Please try again later.\n";
    } elseif ($e instanceof BambooHRException) {
        echo "BambooHR API Error: " . $e->getMessage() . "\n";
    } else {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
