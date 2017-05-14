`request` abstract
--
- Kernel::sendRequestThroughRouter
- Kernel::dispatchToRouter

Both the methods binds the `request` abstract with the `$request`
passed through `Kernel::handle`

So when you run your web application,
and want to use a custom request,
you should replace the request at the entry `public/index.php`
passing to `$kernel->handle`

And when you run your PHPUnit test,
you should replace the request passing to `$kernel->handle`
with your custom request at `TestCase::call`
