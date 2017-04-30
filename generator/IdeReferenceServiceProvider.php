<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference;

use Illuminate\Support\ServiceProvider;

class IdeReferenceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands(['command.reference:framework']);
    }

    public function boot()
    {

    }
}