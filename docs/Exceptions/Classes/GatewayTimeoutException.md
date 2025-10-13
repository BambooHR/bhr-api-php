# GatewayTimeoutException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ServerException`  
**HTTP Status Code**: 504

## Description

Gateway timeout

## Usage

```php
try {
    // API call that might fail with 504 status code
} catch (BhrSdk\Exceptions\GatewayTimeoutException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- The server acting as a gateway or proxy did not receive a timely response
- BambooHR servers experiencing high load
- Complex query taking too long to process

## Debugging Tips

- Retry the request after a delay
- Simplify complex queries if possible
- Implement circuit breaker pattern to prevent cascading failures

## Constructor

```php
public function __construct(
    string $message
)
```

### Parameters

| Name | Type | Description |
|------|------|-------------|
| `$message` | string | The error message |

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
