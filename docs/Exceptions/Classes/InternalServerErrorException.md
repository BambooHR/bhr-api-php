# InternalServerErrorException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ServerException`  
**HTTP Status Code**: 500

## Description

Internal server error

## Usage

```php
try {
    // API call that might fail with 500 status code
} catch (BhrSdk\Exceptions\InternalServerErrorException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Unexpected condition on the server
- Server-side exception or error
- Database issues or connectivity problems

## Debugging Tips

- Retry the request after a short delay
- Contact BambooHR support if the problem persists
- Include request ID or timestamp when reporting issues

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
