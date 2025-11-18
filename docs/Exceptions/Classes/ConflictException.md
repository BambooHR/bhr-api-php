# ConflictException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 409

## Description

Conflict

## Usage

```php
try {
    // API call that might fail with 409 status code
} catch (BhrSdk\Exceptions\ConflictException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
    
    // Access response data
    $responseHeaders = $e->getResponseHeaders();
    $responseBody = $e->getResponseBody();
}
```

## Potential Causes

- Resource state conflict with the current request
- Concurrent modification of the same resource
- Attempting to create a resource that already exists
- Violating unique constraints

## Debugging Tips

- Fetch the latest state of the resource before attempting modifications
- Implement optimistic concurrency control using ETags or version numbers
- Check for existing resources before creation attempts
- Handle conflict resolution in your application logic

## Constructor

```php
public function __construct(
    string $message,
    array $responseHeaders = [],
    $responseBody = null
)
```

### Parameters

| Name | Type | Description |
|------|------|-------------|
| `$message` | string | The error message |
| `$responseHeaders` | array | HTTP response headers from the API call |
| `$responseBody` | mixed | HTTP response body from the API call |

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

### getResponseHeaders()

Returns the HTTP response headers from the API call that triggered this exception.

```php
public function getResponseHeaders(): array
```

### getResponseBody()

Returns the HTTP response body from the API call that triggered this exception.

```php
public function getResponseBody()
```
