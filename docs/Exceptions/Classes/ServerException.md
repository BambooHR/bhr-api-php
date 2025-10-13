# ServerException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ApiException`

## Description

Base class for all server-side (5xx) exceptions.

## Usage

```php
try {
    // API call that might fail with a 5xx status code
} catch (BhrSdk\Exceptions\ServerException $e) {
    // Handle any server error exception
    echo $e->getMessage();
    
    // Get status code
    $statusCode = $e->getCode(); // Will be a 5xx code
}
```

## Constructor

```php
public function __construct(
    string $message = ""
)
```

### Parameters

| Name | Type | Description |
|------|------|-------------|
| `$message` | string | The error message |

## Server Exception Types

The following specific exception types extend `ServerException`:

- [BadGatewayException](BadGatewayException.md)
- [GatewayTimeoutException](GatewayTimeoutException.md)
- [InsufficientStorageException](InsufficientStorageException.md)
- [InternalServerErrorException](InternalServerErrorException.md)
- [NetworkReadTimeoutException](NetworkReadTimeoutException.md)
- [NotImplementedException](NotImplementedException.md)
- [ServiceUnavailableException](ServiceUnavailableException.md)
