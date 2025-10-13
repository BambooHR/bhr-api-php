# UnsupportedMediaTypeException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 415

## Description

Unsupported media type

## Usage

```php
try {
    // API call that might fail with 415 status code
} catch (BhrSdk\Exceptions\UnsupportedMediaTypeException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Content-Type header is missing or incorrect
- Request body format is not supported by the API
- Using XML when only JSON is supported (or vice versa)

## Debugging Tips

- Check that your Content-Type header is set correctly
- Verify the API endpoint supports the format you're sending
- Convert your payload to a supported format (usually JSON)
- Review API documentation for supported media types

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
