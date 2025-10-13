# UnprocessableEntityException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ClientException`  
**HTTP Status Code**: 422

## Description

Unprocessable entity

## Usage

```php
try {
    // API call that might fail with 422 status code
} catch (BhrSdk\Exceptions\UnprocessableEntityException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Request syntax is correct but contains semantic errors
- Validation failures in the request data
- Business rule violations
- Data integrity constraints

## Debugging Tips

- Check the response body for specific validation error details
- Ensure request data meets all business rules and constraints
- Validate data before submitting to the API
- Review API documentation for field requirements and limitations

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
