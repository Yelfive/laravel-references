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

    protected $name = 'reference:framework';

    protected $description = 'Generate reference docs for Laravel facades etc.';

    public function handle()
    {
        (new FrameworkHelper($this))->handle();
    }

    protected function getOptions()
    {
        return [
            ['yes', 'y', InputOption::VALUE_NONE, 'No interaction, answers yes to all confirms'],
            ['overwrite', null, InputOption::VALUE_NONE, 'Overwrites files if exists'],
        ];
    }

    public function confirm($question, $default = false)
    {
        if ($this->option('yes')) return true;
        return parent::confirm($question, $default);
    }

}