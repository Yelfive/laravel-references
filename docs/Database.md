# Eloquent

All public methods in eloquent can be called statically

Additionally, public methods in classes
`Illuminate\Database\Eloquent\Builder` and
`Illuminate\Database\Query\Builder` can be called as static methods
Clues can be found in
- `Illuminate\Database\Eloquent\Model::__callStatic`
- `Illuminate\Database\Eloquent\Model::__call`
- `Illuminate\Database\Eloquent\Builder::_call`
- `Illuminate\Database\Query\Builder::_call`

```php
<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'user';
}

```
### where

Once the model `User` is declared,
you are able to compose your where clause in many ways

```php
<?php

use \App\Models\User;
# Way 1.
User::whereName();
```
