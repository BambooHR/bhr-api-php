# InsufficientStorageException

**Namespace**: `BhrSdk\Exceptions`  
**Extends**: `ServerException`  
**HTTP Status Code**: 507

## Description

Insufficient storage

## Usage

```php
try {
    // API call that might fail with 507 status code
} catch (BhrSdk\Exceptions\InsufficientStorageException $e) {
    // Handle the exception
    echo $e->getMessage();
    
    // Access additional information
    $causes = $e->getPotentialCauses();
    $tips = $e->getDebuggingTips();
}
```

## Potential Causes

- Server storage capacity has been reached
- Quota limits exceeded for your account
- Temporary resource constraints on the server

## Debugging Tips

- Remove unnecessary data if possible
- Contact support to discuss storage limitations
- Check if there are unused resources that can be deleted

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
