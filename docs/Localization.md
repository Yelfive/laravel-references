# Directory
```
/resources
    /lang
        /en
            messages.php
        /zh-CN
            messages.php
```

In `zh-CN/messages.php` reads

```php
<?php

return [
    'Welcome to China.' => '欢迎来到中国',
];
```

## Choose your locale

`locale` is defined in the `config/app.php` by default

```php
return [
    'locale' => 'zh-CN'
];
```

## Message file - Group with `.`

```
echo __('group.translate key');
```

Notice the dot(`.`) there, the first dot will divide the translation into
group and the real translation sentence

If we have a translation file `zh-CN/welcome.php`, and we want to translate `Welcome to China`

It should be called like this

```php
echo __('welcome.Welcome to China.');
```

## Alias - Namespace with `::`

Namespace here is a path alias for Localization files

### Defining a namespace
```php
<?php

use Illuminate\Support\Facades\Lang;

$namespace = 'external';

$pathToLang = app_path() . '/storage/lang';

Lang::addNamespace($namespace, $pathToLang);
```

### Using a namespace
```php
<?php

echo __('external::welcome.Welcome to China.');
```