# NotImplementedException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ServerException`  
**HTTP Status Code**: 501

## Description

Not implemented

## Usage

```php
try {
    // API call that might fail with 501 status code
} catch (BhrSdk\Exceptions\NotImplementedException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- The API endpoint does not support the requested functionality
- The feature is planned but not yet available
- Using a method that is not supported by this resource

## Debugging Tips

- Check API documentation to verify the feature is supported
- Confirm you are using the correct API version
- Consider alternative approaches to achieve your goal
- Contact support to inquire about feature availability

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
