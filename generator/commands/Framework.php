<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference\commands;

use fk\reference\support\FrameworkForFacadesTrait;
use fk\reference\support\FrameworkForModelTrait;
use fk\reference\support\FrameworkHelper;
use fk\reference\support\ParseClassTrait;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Framework extends Command
{

//    use ParseClassTrait;

//    protected $signature = 'reference:framework {name}';
    protected $name = 'reference:framework';
    protected $description = 'Generate reference docs for Laravel facades etc.';

    public function handle()
    {
//        $method = $this->argument('name');
//        $method = 'handle' . ucfirst($method);
//        $this->$method();
        (new FrameworkHelper($this))->handle($this->argument('name'));
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of the option to perform'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['yes', 'y', InputOption::VALUE_NONE, 'No interaction, answers yes to all confirms'],
        ];
    }

    public function confirm($question, $default = false)
    {
        if ($this->option('yes')) return true;
        return parent::confirm($question, $default);
    }

}