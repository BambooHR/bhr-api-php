# NetworkReadTimeoutException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ServerException`  
**HTTP Status Code**: 598

## Description

Network read timeout

## Usage

```php
try {
    // API call that might fail with 598 status code
} catch (BhrSdk\Exceptions\NetworkReadTimeoutException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Network connection was dropped while waiting for response
- Proxy or firewall issues
- Incomplete data transmission

## Debugging Tips

- Check network stability and firewall settings
- Increase read timeout values in your HTTP client
- Implement automatic retry logic for idempotent operations
- Consider using a more reliable network connection

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
