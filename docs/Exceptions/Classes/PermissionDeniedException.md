# PermissionDeniedException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 403

## Description

Permission denied

## Usage

```php
try {
    // API call that might fail with 403 status code
} catch (BhrSdk\Exceptions\PermissionDeniedException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- API key lacks required permissions
- Account restrictions in place
- IP address restrictions

## Debugging Tips

- Verify your API key has the necessary permissions
- Contact your BambooHR administrator to review API access permissions
- Check if IP restrictions are in place for API access

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
