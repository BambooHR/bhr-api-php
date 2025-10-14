# ConnectException

**Namespace**: `GuzzleHttp\Exception`  
**Extends**: `GuzzleHttp\Exception\TransferException`  
**Implements**: `GuzzleHttp\Exception\NetworkExceptionInterface`

## Description

Exception thrown when a connection cannot be established to the remote server. This exception is thrown by Guzzle HTTP client when there are network connectivity issues.

## Usage

```php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

try {
    $client = new Client();
    $response = $client->request('GET', 'https://api.example.com/endpoint');
} catch (ConnectException $e) {
    // Handle connection errors
    echo "Connection error: " . $e->getMessage();
    
    // Get the request that caused the exception
    $request = $e->getRequest();
    
    // Get the handlerContext for more details about the error
    $context = $e->getHandlerContext();
}
```

## Potential Causes

- DNS resolution failures
- Network connectivity issues
- Firewall blocking the connection
- Server is down or unreachable
- SSL/TLS certificate issues
- Timeout while establishing the connection
- Proxy configuration issues

## Debugging Tips

- Check your network connectivity
- Verify the hostname is correct and can be resolved
- Check if the server is running and accessible
- Verify firewall settings are not blocking the connection
- Check SSL/TLS certificate validity
- Increase connection timeout settings if needed
- Verify proxy settings if using a proxy

## Constructor

```php
public function __construct(
    string $message,
    \Psr\Http\Message\RequestInterface $request,
    \Throwable $previous = null,
    array $handlerContext = []
)
```

### Parameters

| Name | Type | Description |
|------|------|-------------|
| `$message` | string | The error message |
| `$request` | \Psr\Http\Message\RequestInterface | The request that caused the exception |
| `$previous` | \Throwable | Previous exception (if applicable) |
| `$handlerContext` | array | Handler context containing additional error details |

## Methods

### getRequest()

Returns the request that caused the exception.

```php
public function getRequest(): \Psr\Http\Message\RequestInterface
```

### getHandlerContext()

Returns the handler context array.

```php
public function getHandlerContext(): array
```

## External Resources

- [Guzzle Documentation](https://docs.guzzlephp.org/en/stable/quickstart.html#exceptions)
- [PSR-7 HTTP Message Interface](https://www.php-fig.org/psr/psr-7/)
- [Guzzle GitHub Repository](https://github.com/guzzle/guzzle)
