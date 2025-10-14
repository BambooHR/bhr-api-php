# ClientException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ApiException`

## Description

Base class for all client-side (4xx) exceptions.

## Usage

```php
try {
    // API call that might fail with a 4xx status code
} catch (BhrSdk\Exceptions\ClientException $e) {
    // Handle any client error exception
    echo $e->getMessage();
    
    // Get status code
    $statusCode = $e->getCode(); // Will be a 4xx code
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

## Client Exception Types

The following specific exception types extend `ClientException`:

- [AuthenticationFailedException](AuthenticationFailedException.md)
- [BadRequestException](BadRequestException.md)
- [ConflictException](ConflictException.md)
- [MethodNotAllowedException](MethodNotAllowedException.md)
- [PayloadTooLargeException](PayloadTooLargeException.md)
- [PermissionDeniedException](PermissionDeniedException.md)
- [RateLimitExceededException](RateLimitExceededException.md)
- [RequestTimeoutException](RequestTimeoutException.md)
- [ResourceNotFoundException](ResourceNotFoundException.md)
- [UnprocessableEntityException](UnprocessableEntityException.md)
- [UnsupportedMediaTypeException](UnsupportedMediaTypeException.md)
