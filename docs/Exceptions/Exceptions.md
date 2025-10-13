# HTTP Status Codes and Error Handling

This document provides information about HTTP status codes that may be returned by the BambooHR API, along with potential causes and debugging tips for each code.

## Exception Classes

The SDK provides exception classes for each HTTP status code. For detailed documentation on each exception class, see the links below:

### Base Exceptions
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

## Error Handling in the SDK

When an error occurs, the SDK will throw an `ApiException` with details about the error. The exception will include:

- The HTTP status code
- The error code
- A detailed message with potential causes and debugging tips

### Example Error Handling

```php
try {
    $result = $apiInstance->someOperation();
} catch (ApiException $e) {
    echo $e->getMessage();
    
    // Get status code
    $statusCode = $e->getCode();
    
    // Handle specific status codes
    if ($statusCode === 500) {
        // Log server error
    }
}
```

## Automatic Retry Recommendations

- **Retry recommended**: 408, 429, 504, 598

The SDK will automatically retry requests with these status codes based on the `retries` configuration option.
