# HTTP Status Codes and Error Handling

This document provides information about HTTP status codes that may be returned by the BambooHR API, along with potential causes and debugging tips for each code.

## Exception Classes

The SDK provides exception classes for each HTTP status code. For detailed documentation on each exception class, see the links below:

### Base Exception
- [ApiException](Classes/ApiException.md) - Base exception class for all API errors

### Server & Client Exceptions
- [ClientException](Classes/ClientException.md) - Base class for 4xx errors
- [ServerException](Classes/ServerException.md) - Base class for 5xx errors

### Client Exceptions (4xx)
- [BadRequestException](Classes/BadRequestException.md) - 400 Bad request
- [AuthenticationFailedException](Classes/AuthenticationFailedException.md) - 401 Authentication failed
- [PermissionDeniedException](Classes/PermissionDeniedException.md) - 403 Permission denied
- [ResourceNotFoundException](Classes/ResourceNotFoundException.md) - 404 Resource not found
- [MethodNotAllowedException](Classes/MethodNotAllowedException.md) - 405 Method not allowed
- [RequestTimeoutException](Classes/RequestTimeoutException.md) - 408 Request timeout
- [ConflictException](Classes/ConflictException.md) - 409 Conflict
- [PayloadTooLargeException](Classes/PayloadTooLargeException.md) - 413 Payload too large
- [UnsupportedMediaTypeException](Classes/UnsupportedMediaTypeException.md) - 415 Unsupported media type
- [UnprocessableEntityException](Classes/UnprocessableEntityException.md) - 422 Unprocessable entity
- [RateLimitExceededException](Classes/RateLimitExceededException.md) - 429 Rate limit exceeded

### Server Exceptions (5xx)
- [InternalServerErrorException](Classes/InternalServerErrorException.md) - 500 Internal server error
- [NotImplementedException](Classes/NotImplementedException.md) - 501 Not implemented
- [BadGatewayException](Classes/BadGatewayException.md) - 502 Bad gateway
- [ServiceUnavailableException](Classes/ServiceUnavailableException.md) - 503 Service unavailable
- [GatewayTimeoutException](Classes/GatewayTimeoutException.md) - 504 Gateway timeout
- [InsufficientStorageException](Classes/InsufficientStorageException.md) - 507 Insufficient storage
- [NetworkReadTimeoutException](Classes/NetworkReadTimeoutException.md) - 598 Network read timeout

The SDK also provides other types of exceptions, as outlined below:

### Input Exceptions
- [InvalidArgumentException](Classes/InvalidArgumentException.md) - Invalid input provided to the API

### Network Exceptions
- [ConnectException](Classes/ConnectException.md) - Connection error

## Error Handling in the SDK

When an error occurs, the SDK will throw an exception with details about the error. The exception will include:

- The HTTP status code
- The error code
- A detailed message with potential causes and debugging tips

The exception type will be a subclass of `ClientException` or `ServerException` based on the HTTP status code.

### Example Error Handling

```php
try {
    $result = $apiInstance->someOperation();
} catch (\BhrSdk\Exceptions\ClientException $clientException) {
    // Handle client errors (4xx status codes)
    echo "Client error: " . $clientException->getMessage();
    
    // Get status code
    $statusCode = $clientException->getCode();
    
    // Do something
} catch (\BhrSdk\Exceptions\ServerException $serverException) {
    // Handle server errors (5xx status codes)
    echo "Server error: " . $serverException->getMessage();
    
    // Get status code
    $statusCode = $serverException->getCode();
    
    // Do something
} catch (\BhrSdk\ApiException $apiException) {
    // Handle any other API exceptions not caught by the more specific catches
    echo "API error: " . $apiException->getMessage();
    echo "Status code: " . $apiException->getCode();
    
    // Access response headers and body for additional debugging
    $responseHeaders = $apiException->getResponseHeaders();
    $responseBody = $apiException->getResponseBody();
    
    // Log the complete error information
    error_log("Unexpected API error: " . json_encode([
        'message' => $apiException->getMessage(),
        'code' => $apiException->getCode(),
        'responseBody' => $responseBody
    ]));
}
```

## Automatic Retry Recommendations

- **Retry recommended**: 408, 429, 504, 598

The SDK will automatically retry requests with these status codes based on the `retries` configuration option.
Additional status codes may be added to the list of retryable status codes using the `setRetryableStatusCodes` method on the `Configuration` class.
