# laravel-references
Class references for the Laravel default facades
and methods that invoke `__call` of a class

This is convenient for IDE code completion
Inspired by `barryvdh`

- config
    - framework.php

        Contains all `caller => callee` classes
    - framework.__call.php

        Contains all refers in __call,
        this will be called recursively