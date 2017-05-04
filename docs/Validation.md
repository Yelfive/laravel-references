# Validation

You can extend a validation by calling
```php
\Illuminate\Support\Facades\Validator::extend($rule, $extension, $failedMessage);
```

and the $extension is callable

```
$extension = function (string $field, mixed $value, array $parameters ,\Illuminate\Validation\Validator $validator) {
    // return true to indicate passes
    // return false indicates otherwise
}
```