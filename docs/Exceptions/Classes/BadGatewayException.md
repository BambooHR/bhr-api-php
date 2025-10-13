# BadGatewayException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ServerException`  
**HTTP Status Code**: 502

## Description

Bad gateway

## Usage

```php
try {
    // API call that might fail with 502 status code
} catch (BhrSdk\Exceptions\BadGatewayException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- The server received an invalid response from an upstream server
- Proxy or gateway configuration issues
- Temporary communication failure between servers

## Debugging Tips

- Retry the request after a delay
- Implement automatic retry logic with backoff
- Check if the service is experiencing known issues
- Verify network connectivity between your client and the API

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
