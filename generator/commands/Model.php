<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference\commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Model extends Command
{

    protected $name = 'reference:model';
//    protected $signature = 'reference:model {names?* : name of the table} {--d|dir=App\Models}';

    protected $description = 'Generate model references or create model instead of `php artisan make:model`';

    public function handle()
    {
        echo "Arguments";
        print_r($this->argument());
        echo "Options";
        print_r($this->options());
    }

    protected function getArguments()
    {
        return [
            ['names', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, 'Name(s) of the table', [1,2,3]]
        ];
    }

    protected function getOptions()
    {
        return [
            ['dir', 'd', InputOption::VALUE_OPTIONAL, 'Directory for the models to be placed', 'App\Models'],
        ];
    }

}