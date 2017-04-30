<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference;

use fk\reference\commands\Framework;
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
            return new Model();
        });

        $this->commands($commands);
    }

    public function boot()
    {

    }
}