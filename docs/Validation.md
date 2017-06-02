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

# Built-ins
- Accepted
- Active URL
- After (Date)
- After Or Equal (Date)
- Alpha
- Alpha Dash
- Alpha Numeric
- Array
- Before (Date)
- Before Or Equal (Date)
- Between
- Boolean
- Confirmed
- Date
- Date Format
- Different
- Digits
- Digits Between
- Dimensions (Image Files)
- Distinct
- E-Mail
- Exists (Database)
- File
- Filled
- Image (File)
- In
- In Array
- Integer
- IP Address
- JSON
- Max
- MIME Types
- MIME Type By File Extension
- Min
- Nullable
- Not In
- Numeric
- Present
- Regular Expression
- Required
- Required If
- Required Unless
- Required With
- Required With All
- Required Without
- Required Without All
- Same
- Size
- String
- Timezone
- Unique (Database)
- URL