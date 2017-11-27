# Event

Listeners should be careful when return values, value other than `null` will cause the rest listeners will be passed

**Source Code**

See `Illuminate\Events\Dispatcher::dispatch`

```text

foreach ($this->getListeners($event) as $listener) {
    // Here is where listeners got passed
    // Due to `Response to be value other than null`
    $response = $listener($event, $payload);
    if ($halt && ! is_null($response)) {
        return $response;
    }
}
```