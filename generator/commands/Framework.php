<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference\commands;

use Illuminate\Console\Command;

class Framework extends Command
{
    protected $signature = 'reference:framework';

    protected $description = 'Generate reference docs for Laravel facades etc.';
}