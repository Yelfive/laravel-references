- Route generator

Something like
```php
<?php

namespace App\Components\Controllers\World;

class Say
{
    /**
     * @@method POST
     * @@route hello
     * @@prefix api
     * @@namespace World
     *
     */
     public function hello()
     {

     }
}
```

- Fluent

    see migrations/init, reference staff

    see fk/laravel-references/completion/Support/Fluent.php

- Model
    - relation methods
    - rules(exists in database)