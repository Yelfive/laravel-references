<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-03
 */

namespace fk\reference\support;


trait HandleModelTrait
{

//    use ParseClassTrait;

    /**
     * @see  \Illuminate\Database\Eloquent\Model
     *      - all methods static
     *      - `increment`, `decrement` to be public
     * @see  \Illuminate\Database\Eloquent\Builder
     *      - __call -> $this->query->$method
     * @see  \Illuminate\Database\Query\Builder
     *      - call public methods
     *      - __call -> `whereOrField` `whereAndField`
     *      - try if `whereField` works
     */
    public function handleModel()
    {
        $this->initMeta();
        $classes = [
            \Illuminate\Database\Eloquent\Model::class,
            \Illuminate\Database\Eloquent\Builder::class,
            \Illuminate\Database\Query\Builder::class,
        ];
        $this->meta['namespace'] = 'Illuminate\Database\Eloquent';
        $this->meta['class_name'] = 'Model';
        foreach ($classes as $k => $class) {
            $rc = new \ReflectionClass($class);
            $this->parseConstants($rc);
            $this->parseProperties($rc);
            $this->parseMethods($rc, $k > 0);
        }

        $content = $this->modelContent();
        $this->write("{$this->meta['namespace']}\\{$this->meta['class_name']}", $content);
    }

    protected function modelContent(): string
    {
        $uses = $this->_usesToString();
        $constants = $this->_constantsToString();
        $properties = $this->_propertiesToString();
        $methods = $this->_methodsToString();
        return <<<DOC
<?php

namespace {$this->meta['namespace']};

{$uses}
class {$this->meta['class_name']}
{
$constants
$properties
$methods
}

DOC;

    }

}