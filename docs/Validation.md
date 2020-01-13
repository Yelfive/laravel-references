# Validation

You can extend a validation by calling
```php
\Illuminate\Support\Facades\Validator::extend($rule, $extension, $failedMessage);
```

and the $extension is callable

```php
<?php

$extension = function (string $field, $value, array $parameters ,\Illuminate\Validation\Validator $validator) {
    // return true to indicate passes
    // return false indicates otherwise
};

```

## Localization

Add a replacer to replace error message


When you have a message like `something is invalid: :invalid_list`, and the `:invalid_list` is calculated after validation,
that's where the replacer comes in.

```php
// $validator is the one makes the `passes` or `fails` call
$validator->addReplacer(string $rule, function (string $message, $attribute, string $rule, array $parameters,\Illuminate\Validation\Validator $validator) use ($invalid) {
    return str_replace(':invalid', implode(', ', $invalid), $message);
});
```

**Reference** \Illuminate\Validation\Concerns\FormatsMessages::makeReplacements

## Built-in Validators

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