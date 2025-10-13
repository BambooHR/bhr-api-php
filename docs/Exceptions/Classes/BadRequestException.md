# BadRequestException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 400

## Description

Bad request

## Usage

```php
try {
    // API call that might fail with 400 status code
} catch (BhrSdk\Exceptions\BadRequestException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Invalid request syntax or parameters
- Missing required fields
- Malformed JSON or XML in request body

## Debugging Tips

- Check request parameters and ensure they match API documentation
- Validate request body format before sending
- Ensure all required fields are included
- Review API documentation for correct endpoint usage

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
