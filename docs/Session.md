# Session

Session in Laravel doesn't use `session_set_save_handler`,
it calls the a corresponding method on-demand.
For example, it calls `write` when `Kernel::terminate`,
inside which a `SessionStart::terminate` is called

- `write` `Kernel::terminate`