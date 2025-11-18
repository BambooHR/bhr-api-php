# InvalidArgumentException

**Namespace**: `\`  
**Extends**: `\Exception`

## Description

Standard PHP exception thrown when an argument provided to a function or method is not valid. This is a core PHP exception, not specific to the BambooHR SDK, but may be thrown during API operations when invalid input is provided.

## Usage

```php
try {
    // API call with potentially invalid arguments
    $apiInstance->someOperation($invalidArgument);
} catch (\InvalidArgumentException $e) {
    // Handle invalid argument exception
    echo "Invalid argument: " . $e->getMessage();
}
```

## Potential Causes

- Passing a string where a number is expected
- Passing a negative number where a positive number is required
- Passing an array where a scalar value is expected
- Passing a value outside the allowed range
- Missing required parameters
- Incorrect data types for function parameters

## Debugging Tips

- Check the data types of all arguments passed to API methods
- Ensure all required parameters are provided
- Validate input data before passing it to API methods
- Review the API documentation for the correct parameter formats and constraints
- Use type hints and strict typing in your code to catch type errors early

## Constructor

```php
public function __construct(
    string $message = "",
    int $code = 0,
    \Throwable|null $previous = null
)
```

### Parameters

| Name | Type | Description |
|------|------|-------------|
| `$message` | string | The error message |
| `$code` | int | The error code |
| `$previous` | \Throwable\|null | The previous throwable used for exception chaining |

## Standard PHP Exception Methods

### getMessage()

Returns the exception message.

```php
public function getMessage(): string
```

### getCode()

Returns the exception code.

```php
public function getCode(): int
```

### getFile()

Returns the file in which the exception was created.

```php
public function getFile(): string
```

### getLine()

Returns the line on which the exception was created.

```php
public function getLine(): int
```

### getTrace()

Returns the stack trace as an array.

```php
public function getTrace(): array
```

### getTraceAsString()

Returns the stack trace as a string.

```php
public function getTraceAsString(): string
```

### getPrevious()

Returns the previous throwable (if any).

```php
public function getPrevious(): ?\Throwable
```

### __toString()

Returns the string representation of the exception.

```php
public function __toString(): string
```
