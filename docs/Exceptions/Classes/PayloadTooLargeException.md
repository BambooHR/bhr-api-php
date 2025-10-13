# PayloadTooLargeException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 413

## Description

Payload too large

## Usage

```php
try {
    // API call that might fail with 413 status code
} catch (BhrSdk\Exceptions\PayloadTooLargeException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Request body exceeds the server's size limit
- File upload is too large
- Batch operation contains too many items

## Debugging Tips

- Reduce the size of your request payload
- Split large requests into smaller chunks
- Compress data before sending if appropriate
- Check API documentation for size limits

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
