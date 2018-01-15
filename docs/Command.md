# Learn by example

```php

<?php

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MyCommand extends \Illuminate\Console\Command
{
    protected $name = 'me:do-sth';

    /**
     * @see Symfony\Component\Console\Command\Command::addOption()
     */
    protected function getOptions()
    {
        return [
            ['OptionName', 'OptionAlias', 'OptionRule', 'Discription', 'DefaultValue'],
            ['path', 'p', InputOption::VALUE_OPTIONAL, 'Path for the command', '/var/www/html/']
        ];
    }

    /**
     * @see Symfony\Component\Console\Command\Command::addArgument()
     */
    protected function getArguments()
    {
        return [
            ['ArgumentName', 'ArgumentRule', 'Description', 'DefaultValue'],
        ];
    }
}
```

### Options
- `OptionName`
    When we call `php artisan me:do-sth --path path/to/sth`, and the `--path` is the option
- `OptionAlias`
    It would be convenient if we don't have to remember the full name of a option
    so in the example above, we can also call it like
    `php artisan me:do-sth -p path/to/sth`.
    If you don't want an alias, just fill with `null`
- `OptionRule`
    Properties indicate what the option can be. The value is pre-defined in `namespace Symfony\Component\Console\Input\InputOptions`
    ```php
    <?php
    class InputOption
    {
        // Indicates the option is a switch, which does not take a default value
        // And VALUE_NONE and VALUE_OPTIONAL does not work together
        const VALUE_NONE = 1;
        const VALUE_REQUIRED = 2;
        const VALUE_OPTIONAL = 4;
        const VALUE_IS_ARRAY = 8;
    }
    ```
    There are chances you want to specify more than one rules,
    this is approachable by setting `OptionRule`
    ```
    InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY
    ```
- `Description`
    The text display when call `php artisan help me:do-sth`.
    `null` means no description
- `DefaultValue`
    Default value for the option
    
### Arguments

- `ArgumentName`
    Name of the argument. This is display when call `php artisan help me:sth`, and do not need to be specified when called
- `ArgumentRule`
    As with options, rules is pre-defined to describe the arguments in `namespace Symfony\Component\Console\Input\InputArgument`
    ```php
    <?php
    class InputArgument
    {
        const REQUIRED = 1;
        const OPTIONAL = 2;
        const IS_ARRAY = 4;
    }
    ```
- `Description`
    As with options
- `DefaultValue`
    As with options