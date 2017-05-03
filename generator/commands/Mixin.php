<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-02
 */

namespace fk\reference\commands;

use fk\reference\support\ParseClassTrait;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class Mixin extends Command
{

    use ParseClassTrait;

    protected $name = 'reference:mixin';

    protected function getArguments()
    {
        return [
            ['class', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'Classes to mixin']
        ];
    }

    public function getDescription()
    {
        return <<<DOC
Mix the all classes into the last class
DOC;

    }

    public function handle()
    {
        $this->initMeta();
        $classes = $this->argument('class');
        $mixin = array_pop($classes);
        $this->parseMixin($mixin);
        $this->meta['class_doc'] .= '/**';
        foreach ($classes as $class) {
            $rc = new \ReflectionClass($class);
            $this->parseConstants($rc);
            $this->parseProperties($rc);
            $this->parseMethods($rc);
            $this->meta['class_doc'] .= " * @see \\{$rc->name}";
        }
        $this->meta['class_doc'] .= ' */';
        $content = $this->parse();
        $this->write($mixin, $content);;
    }

    protected function parse(): string
    {
        return <<<DOC
<?php

namespace {$this->meta['namespace']};

{$this->_usesToString()}
class {$this->meta['class_name']}
{
{$this->_constantsToString()}
{$this->_propertiesToString()}
{$this->_methodsToString()}
}
DOC;

    }

    public function parseMixin($mixin)
    {
        $mixin = 'Illuminate\Database\Eloquent\Model';

        $array = explode('\\', $mixin);

        $this->meta['class_name'] = array_pop($array);
        $this->meta['namespace'] = implode('\\', $array);
    }

}