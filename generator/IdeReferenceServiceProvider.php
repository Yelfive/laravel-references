<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference;

use fk\reference\commands\Framework;
use fk\reference\commands\Mixin;
use fk\reference\commands\Model;
use Illuminate\Support\ServiceProvider;

class IdeReferenceServiceProvider extends ServiceProvider
{

    private $_prefix;

    private function _prefix($name)
    {
        if (!$this->_prefix) {
            $this->_prefix = uniqid('cli_');
        }

        return $this->_prefix . ":$name";
    }

    public function register()
    {
        $commands = [];
        $this->app->singleton($commands[] = $this->_prefix('framework'), function () {
            return new Framework();
        });

        $this->app->singleton($commands[] = $this->_prefix('model'), function () {
            $this->modelTips();
            return new Model();
        });

        $this->app->singleton($commands[] = $this->_prefix('mixin'), function () {
            return new Mixin();
        });

        $this->commands($commands);
    }

    const CONFIG_NAMESPACE = 'ide-reference';

    protected function modelTips()
    {

        $rc = new \ReflectionClass(\App\Providers\EventServiceProvider::class);
        $method = $rc->getMethod('listens');
        $listens = $method->invoke($rc->newInstanceWithoutConstructor());
        $event = \App\Events\ModelSaving::class;
        $listener = \App\Listeners\CheckRules::class;

        if (isset($listens[$event]) && in_array($listener, $listens[$event])) return;
        register_shutdown_function(function () use ($event, $listener) {
            $class = __CLASS__;
            echo <<<TIPS
**********************************************************************

1. Remember to update your `App\Providers\EventServiceProvider`

protected \$listen = [\033[032m
    $event => [
        $listener,
    ]\033[0m
];

2. Publish service provider: $class
\033[32m
artisan vendor:publish
\033[0m
**********************************************************************

TIPS;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/' . self::CONFIG_NAMESPACE . '.php' => config_path(self::CONFIG_NAMESPACE . '.php'),
            __DIR__ . '/../Events/ModelSaving.php' => base_path('app/Events/ModelSaving.php'),
            __DIR__ . '/../Listeners/CheckRules.php' => base_path('app/Listeners/CheckRules.php'),
        ]);
    }
}