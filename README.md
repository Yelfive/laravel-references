# laravel-references

Class references for the Laravel default facades
and methods that invoke `__call` of a class

This is convenient for IDE code completion
Inspired by `barryvdh`

## Directory

- config
    - framework.php

        Contains all `caller => callee` classes
    - framework.__call.php

        Contains all refers in __call,
        this will be called recursively
        
## Register

```php
<?php

namespace App\Providers;

use fk\reference\IdeReferenceServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(IdeReferenceServiceProvider::class);
    }
}

```       

## Call

```bash
artisan reference:model table_name
```