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

## Status Codes

### 400 - Bad request

**Type**: `BadRequestException`

#### Potential Causes:
- Invalid request syntax or parameters
- Missing required fields
- Malformed JSON or XML in request body

#### Debugging Tips:
- Check request parameters and ensure they match API documentation
- Validate request body format before sending
- Ensure all required fields are included
- Review API documentation for correct endpoint usage

### 401 - Authentication failed

**Type**: `AuthenticationFailedException`

#### Potential Causes:
- Invalid API key or password
- Expired credentials
- Insufficient permissions for this operation

#### Debugging Tips:
- Verify your API key and subdomain are correct
- Check that your API key has the necessary permissions
- Ensure your company subdomain is correct
- Try regenerating your API key in the BambooHR system

### 403 - Permission denied

**Type**: `PermissionDeniedException`

#### Potential Causes:
- API key lacks required permissions
- Account restrictions in place
- IP address restrictions

#### Debugging Tips:
- Verify your API key has the necessary permissions
- Contact your BambooHR administrator to review API access permissions
- Check if IP restrictions are in place for API access

### 404 - Resource not found

**Type**: `ResourceNotFoundException`

#### Potential Causes:
- The requested resource does not exist
- Resource may have been deleted
- Incorrect resource identifier or path

#### Debugging Tips:
- Verify the resource ID or path is correct
- Check if the resource exists before attempting to access it
- Ensure you are using the correct API version
- Confirm the resource has not been deleted or archived

### 405 - Method not allowed

**Type**: `MethodNotAllowedException`

#### Potential Causes:
- Using an incorrect HTTP method for this endpoint
- The endpoint does not support the requested operation
- API version mismatch

#### Debugging Tips:
- Check API documentation for the correct HTTP method (GET, POST, PUT, DELETE)
- Verify the endpoint supports the operation you are attempting
- Ensure you are using the correct API version

### 408 - Request timeout

**Type**: `RequestTimeoutException`

#### Potential Causes:
- The server did not receive a complete request within the time it was prepared to wait
- Network connectivity issues
- Server overload or high latency

#### Debugging Tips:
- Check your network connection
- Increase request timeout settings
- Consider breaking large requests into smaller chunks
- Increase the number of retries

### 409 - Conflict

**Type**: `ConflictException`

#### Potential Causes:
- Resource state conflict with the current request
- Concurrent modification of the same resource
- Attempting to create a resource that already exists
- Violating unique constraints

#### Debugging Tips:
- Fetch the latest state of the resource before attempting modifications
- Implement optimistic concurrency control using ETags or version numbers
- Check for existing resources before creation attempts
- Handle conflict resolution in your application logic

### 413 - Payload too large

**Type**: `PayloadTooLargeException`

#### Potential Causes:
- Request body exceeds the server's size limit
- File upload is too large
- Batch operation contains too many items

#### Debugging Tips:
- Reduce the size of your request payload
- Split large requests into smaller chunks
- Compress data before sending if appropriate
- Check API documentation for size limits

### 415 - Unsupported media type

**Type**: `UnsupportedMediaTypeException`

#### Potential Causes:
- Content-Type header is missing or incorrect
- Request body format is not supported by the API
- Using XML when only JSON is supported (or vice versa)

#### Debugging Tips:
- Check that your Content-Type header is set correctly
- Verify the API endpoint supports the format you're sending
- Convert your payload to a supported format (usually JSON)
- Review API documentation for supported media types

### 422 - Unprocessable entity

**Type**: `UnprocessableEntityException`

#### Potential Causes:
- Request syntax is correct but contains semantic errors
- Validation failures in the request data
- Business rule violations
- Data integrity constraints

#### Debugging Tips:
- Check the response body for specific validation error details
- Ensure request data meets all business rules and constraints
- Validate data before submitting to the API
- Review API documentation for field requirements and limitations

### 429 - Rate limit exceeded

**Type**: `RateLimitExceededException`

#### Potential Causes:
- Too many requests in a short time period
- Exceeding API quota limits

#### Debugging Tips:
- Implement exponential backoff retry strategy
- Reduce frequency of API calls
- Consider caching responses where appropriate
- Check the Retry-After header for guidance on when to retry

### 500 - Internal server error

**Type**: `InternalServerErrorException`

#### Potential Causes:
- Unexpected condition on the server
- Server-side exception or error
- Database issues or connectivity problems

#### Debugging Tips:
- Retry the request after a short delay
- Contact BambooHR support if the problem persists
- Include request ID or timestamp when reporting issues

### 501 - Not implemented

**Type**: `NotImplementedException`

#### Potential Causes:
- The API endpoint does not support the requested functionality
- The feature is planned but not yet available
- Using a method that is not supported by this resource

#### Debugging Tips:
- Check API documentation to verify the feature is supported
- Confirm you are using the correct API version
- Consider alternative approaches to achieve your goal
- Contact support to inquire about feature availability

### 502 - Bad gateway

**Type**: `BadGatewayException`

#### Potential Causes:
- The server received an invalid response from an upstream server
- Proxy or gateway configuration issues
- Temporary communication failure between servers

#### Debugging Tips:
- Retry the request after a delay
- Implement automatic retry logic with backoff
- Check if the service is experiencing known issues
- Verify network connectivity between your client and the API

### 503 - Service unavailable

**Type**: `ServiceUnavailableException`

#### Potential Causes:
- Server is temporarily overloaded
- Server is under maintenance
- Service is temporarily down

#### Debugging Tips:
- Check the Retry-After header if provided
- Consider adding this status code to the list of retryable status codes, and increase the number of retries
- Consider implementing a circuit breaker pattern

### 504 - Gateway timeout

**Type**: `GatewayTimeoutException`

#### Potential Causes:
- The server acting as a gateway or proxy did not receive a timely response
- BambooHR servers experiencing high load
- Complex query taking too long to process

#### Debugging Tips:
- Retry the request after a delay
- Simplify complex queries if possible
- Implement circuit breaker pattern to prevent cascading failures

### 507 - Insufficient storage

**Type**: `InsufficientStorageException`

#### Potential Causes:
- Server storage capacity has been reached
- Quota limits exceeded for your account
- Temporary resource constraints on the server

#### Debugging Tips:
- Remove unnecessary data if possible
- Contact support to discuss storage limitations
- Check if there are unused resources that can be deleted

### 598 - Network read timeout

**Type**: `NetworkReadTimeoutException`

#### Potential Causes:
- Network connection was dropped while waiting for response
- Proxy or firewall issues
- Incomplete data transmission

#### Debugging Tips:
- Check network stability and firewall settings
- Increase read timeout values in your HTTP client
- Implement automatic retry logic for idempotent operations
- Consider using a more reliable network connection


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
