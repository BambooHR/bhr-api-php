# RateLimitExceededException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 429

## Description

Rate limit exceeded

## Usage

```php
try {
    // API call that might fail with 429 status code
} catch (BhrSdk\Exceptions\RateLimitExceededException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Too many requests in a short time period
- Exceeding API quota limits

## Debugging Tips

- Implement exponential backoff retry strategy
- Reduce frequency of API calls
- Consider caching responses where appropriate
- Check the Retry-After header for guidance on when to retry

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
