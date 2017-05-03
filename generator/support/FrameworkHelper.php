<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-03
 */

namespace fk\reference\support;

use Illuminate\Console\Command;

class FrameworkHelper
{
    use ParseClassTrait,
        HandleFacadesTrait, HandleModelTrait;

    /**
     * @var Command
     */
    public $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function handle($name)
    {
        $method = 'handle' . ucfirst($name);
        $this->$method();
    }

    public function __call($name, $arguments)
    {
        return $this->command->$name(...$arguments);
    }
}