<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-03
 */

namespace fk\reference\support;

/**
 * @method info(string $message)
 */
trait HandleFacadesTrait
{

    public function handleFacades()
    {
        $classes = include __DIR__ . '/../config/facades.php';
        $k = -1;
        foreach ($classes as $k => $classInfo) {
            $content = $this->docForClass($classInfo);
            $this->write(is_array($classInfo) ? $classInfo['alias'] : $classInfo, $content);
        }
        $k += 1;
        $this->info("$k files written.");
    }

    /**
     * @param array|string $classInfo
     * When array, it must contain elements with key of `alias` or `class`
     * @return string
     */
    protected function docForClass($classInfo)
    {
        $this->parse($classInfo);
        return $this->metaToString();
    }

    protected function parse($classInfo)
    {
        $this->initMeta();

        $classWithNamespace = $this->extractClassName($classInfo);

        $reflectionClass = new \ReflectionClass($classWithNamespace);

        if (is_array($classInfo)) $aliasReflectionClass = new \ReflectionClass($classInfo['alias']);

        if (empty($aliasReflectionClass)) $aliasReflectionClass = $reflectionClass;

        $this->parseNamespace($aliasReflectionClass);

        if ($aliasReflectionClass === $reflectionClass) {
            $this->parseClassDoc($aliasReflectionClass);
        } else {
            $this->meta['class_doc'] = <<<DOC
/**
 * @see {$aliasReflectionClass->name}
 * @see {$reflectionClass->name}
 */
DOC;
        }

        $this->parseClassName($aliasReflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->parseConstants($aliasReflectionClass);
        $this->parseConstants($reflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->parseProperties($aliasReflectionClass);
        $this->parseProperties($reflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->parseMethods($aliasReflectionClass);
        $this->parseMethods($reflectionClass, $aliasReflectionClass !== $reflectionClass);

        $__call = include __DIR__ . '/../config/facades.__call.php';
        $accessor = $reflectionClass->name;
        while (isset($__call[$accessor])) {
            $rc = new \ReflectionClass($__call[$accessor]);
            $this->parseMethods($rc, true);
            $accessor = $rc->name;
        }
    }

    protected function metaToString(): string
    {
        $namespace = $this->meta['namespace'];
        if (strpos("$namespace\\", '\Facades\\')) {
            $space = str_repeat(' ', 4);
            $namespaceDelimiter = ' {';
            $end = "\n}";
        } else {
            $space = '';
            $namespaceDelimiter = ';';
            $end = '';
        }

        $class = $this->meta['class_name'];
        $docs = $this->_prefixSpace($this->meta['class_doc'], $space, false);
        $uses = $this->_usesToString($space);
        $constants = $this->_constantsToString($space);
        $properties = $this->_propertiesToString($space);
        $methods = $this->_methodsToString($space);

        $alias = $space ? <<<DOC


namespace {
    class $class extends $namespace\\$class
    {
    }
}
DOC
            : '';

        return <<<DOC
<?php

namespace $namespace$namespaceDelimiter

$uses

$docs
{$space}class $class
$space{
$constants
$properties
$methods
$space}$end$alias
DOC;
    }

    protected function extractClassName($classInfo)
    {
        return is_string($classInfo) ? $classInfo : $classInfo['class'];
    }
}