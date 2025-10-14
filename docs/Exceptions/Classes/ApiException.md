# ApiException

**Namespace**: `BhrSdk`  
**Extends**: `\Exception`

## Description

Base exception class for all API errors in the BambooHR SDK. This class serves as the parent class for most exceptions thrown by the SDK.

## Usage

```php
try {
    // API call that might fail
} catch (BhrSdk\ApiException $e) {
    // Handle the exception
    echo $e->getMessage();
    echo "Status code: " . $e->getCode();

    // Access response data
    $responseHeaders = $e->getResponseHeaders();
    $responseBody = $e->getResponseBody();
    $responseObject = $e->getResponseObject();
}
```

## Potential Causes

- Network connectivity issues
- Invalid API credentials
- Server-side errors
- Client-side errors
- Malformed requests
- Rate limiting
- API service unavailability

## Debugging Tips

- Check your API credentials
- Verify the request parameters
- Examine the response body for error details
- Check the HTTP status code
- Review the API documentation for the endpoint you're using
- Ensure your network connection is stable

## Constructor

```php
public function __construct(
    string $message = "",
    int $code = 0,
    array $responseHeaders = [],
    \stdClass|string|null $responseBody = null
)
```

### Parameters

| Name               | Type                    | Description                             |
| ------------------ | ----------------------- | --------------------------------------- |
| `$message`         | string                  | The error message                       |
| `$code`            | int                     | The HTTP status code                    |
| `$responseHeaders` | array                   | HTTP response headers from the API call |
| `$responseBody`    | \stdClass\|string\|null | HTTP response body from the API call    |

## Methods

### getResponseHeaders()

Returns the HTTP response headers from the API call that triggered this exception.

```php
public function getResponseHeaders(): array
```

### getResponseBody()

Returns the HTTP response body from the API call that triggered this exception.

```php
public function getResponseBody(): \stdClass|string|null
```

### setResponseObject()

Sets the deserialized response object during deserialization.

```php
public function setResponseObject(mixed $obj): void
```

### getResponseObject()

Gets the deserialized response object.

```php
public function getResponseObject(): mixed
```
