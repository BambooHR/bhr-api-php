# MethodNotAllowedException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 405

## Description

Method not allowed

## Usage

```php
try {
    // API call that might fail with 405 status code
} catch (BhrSdk\Exceptions\MethodNotAllowedException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Using an incorrect HTTP method for this endpoint
- The endpoint does not support the requested operation
- API version mismatch

## Debugging Tips

- Check API documentation for the correct HTTP method (GET, POST, PUT, DELETE)
- Verify the endpoint supports the operation you are attempting
- Ensure you are using the correct API version

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
