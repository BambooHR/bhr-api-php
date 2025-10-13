# ResourceNotFoundException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 404

## Description

Resource not found

## Usage

```php
try {
    // API call that might fail with 404 status code
} catch (BhrSdk\Exceptions\ResourceNotFoundException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- The requested resource does not exist
- Resource may have been deleted
- Incorrect resource identifier or path

## Debugging Tips

- Verify the resource ID or path is correct
- Check if the resource exists before attempting to access it
- Ensure you are using the correct API version
- Confirm the resource has not been deleted or archived

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
