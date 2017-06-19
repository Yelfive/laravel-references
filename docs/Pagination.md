Pagination
---

When calling

```php
<?php

$paginator = \fk\utility\Database\Eloquent\Model::select()->paginate();
```

a `paginator`(instance of `\fk\utility\Pagination\LengthAwarePaginator`)
will be returned

And then you can call
```php

$paginator->toArray($fields); // $fields canbe found inside the method

$paginator->toFKStyle();
```
## API

- toArray(array $fields): array
    > Returns array of given fields

- toFKStyle(): array
    > Returns array contains `list`, `pagination`
