# ServiceUnavailableException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ServerException`  
**HTTP Status Code**: 503

## Description

Service unavailable

## Usage

```php
try {
    // API call that might fail with 503 status code
} catch (BhrSdk\Exceptions\ServiceUnavailableException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Server is temporarily overloaded
- Server is under maintenance
- Service is temporarily down

## Debugging Tips

- Check the Retry-After header if provided
- Consider adding this status code to the list of retryable status codes, and increase the number of retries
- Consider implementing a circuit breaker pattern

## Constructor

```php
public function __construct(
    string $message,
    ?\Throwable $previous = null,
    array $errorData = []
)
```

### Parameters

| Name | Type | Description |
|------|------|-------------|
| `$message` | string | The error message |
| `$previous` | ?\Throwable | Previous exception |
| `$errorData` | array | Additional error data |

## Methods

### getPotentialCauses()

Returns an array of potential causes for this exception.

```php
public function getPotentialCauses(): array
```

### getDebuggingTips()

Returns an array of debugging tips for this exception.

```php
public function getDebuggingTips(): array
```

### getErrorData()

Returns additional error data provided when the exception was thrown.

```php
public function getErrorData(): array
```
