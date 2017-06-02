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

**Simple SQL**
```php
<?php

use \App\Models\User;
# Way 1.
User::whereName();
```

**Parenthesised SQL**

To accomplish the query like
```SQL
SELECT * FROM some_table WHERE a AND (b1 OR b2)
```
In laravel:
```php
<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

User::where(function (Builder $query) {
    // Parenthesis query
    // All `where` defined here will be put
    // into a parenthesis
});



```
### pluck(string $column)
```
$id = $query->pluck('id');
```
Get the first `$column` from the first element of `Collection`.
Also works for `Collection::pluck`

When using the pluck, remember to call `\Illuminate\Database\Query\Builder::take(1)`
to make sure only one record is retreived from the database