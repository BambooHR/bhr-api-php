# AuthenticationFailedException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 401

## Description

Authentication failed

## Usage

```php
try {
    // API call that might fail with 401 status code
} catch (BhrSdk\Exceptions\AuthenticationFailedException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Invalid API key or password
- Expired credentials
- Insufficient permissions for this operation

## Debugging Tips

- Verify your API key and subdomain are correct
- Check that your API key has the necessary permissions
- Ensure your company subdomain is correct
- Try regenerating your API key in the BambooHR system

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
