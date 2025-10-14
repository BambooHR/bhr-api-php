# RequestException

**Namespace**: `GuzzleHttp\Exception`  
**Extends**: `GuzzleHttp\Exception\TransferException`

## Description

Exception thrown when a request fails. This is a base exception class for HTTP errors that occur during the request/response process in Guzzle. Several more specific exceptions extend from this class, including `ClientException` (4xx errors) and `ServerException` (5xx errors).

## Usage

```php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

try {
    $client = new Client();
    $response = $client->request('GET', 'https://api.example.com/endpoint');
} catch (RequestException $e) {
    // Handle request errors
    echo "Request error: " . $e->getMessage();
    
    // Get the request that caused the exception
    $request = $e->getRequest();
    
    // Check if a response was received
    if ($e->hasResponse()) {
        $response = $e->getResponse();
        echo "Status code: " . $response->getStatusCode();
    }
}
```

## Potential Causes

- Invalid request parameters
- Authentication failures
- Resource not found
- Server errors
- Network issues during request transmission
- Timeouts during request processing
- Malformed responses

## Debugging Tips

- Examine the request parameters and headers
- Check authentication credentials
- Verify the request URL is correct
- Review the response status code and body for error details
- Check server logs if accessible
- Use the `hasResponse()` method to determine if a response was received
- Inspect the response body for detailed error messages

## Constructor

```php
public function __construct(
    string $message,
    \Psr\Http\Message\RequestInterface $request,
    \Psr\Http\Message\ResponseInterface $response = null,
    \Throwable $previous = null,
    array $handlerContext = []
)
```

### Parameters

| Name | Type | Description |
|------|------|-------------|
| `$message` | string | The error message |
| `$request` | \Psr\Http\Message\RequestInterface | The request that caused the exception |
| `$response` | \Psr\Http\Message\ResponseInterface | The response (if available) |
| `$previous` | \Throwable | Previous exception (if applicable) |
| `$handlerContext` | array | Handler context containing additional error details |

## Methods

### getRequest()

Returns the request that caused the exception.

```php
public function getRequest(): \Psr\Http\Message\RequestInterface
```

### getResponse()

Returns the response (if available).

```php
public function getResponse(): ?\Psr\Http\Message\ResponseInterface
```

### hasResponse()

Checks if a response was received.

```php
public function hasResponse(): bool
```

### getHandlerContext()

Returns the handler context array.

```php
public function getHandlerContext(): array
```

## Related Exception Classes

The following exception classes extend `RequestException`:

- `BadResponseException` - Base class for 4xx and 5xx level errors
  - `ClientException` - 4xx level errors
  - `ServerException` - 5xx level errors
- `ConnectException` - Connection errors
- `TooManyRedirectsException` - Too many redirects

## External Resources

- [Guzzle Documentation](https://docs.guzzlephp.org/en/stable/quickstart.html#exceptions)
- [PSR-7 HTTP Message Interface](https://www.php-fig.org/psr/psr-7/)
- [Guzzle GitHub Repository](https://github.com/guzzle/guzzle)
