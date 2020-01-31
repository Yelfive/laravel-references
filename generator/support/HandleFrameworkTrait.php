<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-03
 */

namespace fk\reference\support;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

/**
 * @method info(string $message)
 */
trait HandleFrameworkTrait
{

    public function handleFramework()
    {
        $classes = include __DIR__ . '/../config/framework.php';
        $count = -1;
        foreach ($classes as $k => $classInfo) {
            $content = $this->docForClass($classInfo);
            if (!$content) continue;
            $written = $this->write(is_array($classInfo) ? $classInfo['alias'] : $classInfo, $content);
            $count += $written ? 1 : 0;
        }
        $count += 1;
        $this->info("$count files written.");
    }

    /**
     * @param array|string $classInfo
     * When array, it must contain elements with key of `alias` or `class`
     * @return string
     */
    protected function docForClass($classInfo)
    {
        try {
            $this->parse($classInfo);
        } catch (ReflectionException $e) {
            return '';
        }
        return $this->metaToString();
    }

    /**
     * @param $classInfo
     * @throws ReflectionException
     */
    protected function parse($classInfo)
    {
        $this->initMeta();

        $classWithNamespace = $this->extractClassName($classInfo);

        $reflectionClass = new ReflectionClass($classWithNamespace);

        if (is_array($classInfo)) $aliasReflectionClass = new ReflectionClass($classInfo['alias']);

        if (empty($aliasReflectionClass)) $aliasReflectionClass = $reflectionClass;

        $this->targetClassName = $aliasReflectionClass->name;
        $this->setIsStaticMethod($aliasReflectionClass->name);

        $this->parseNamespace($aliasReflectionClass);

        if ($aliasReflectionClass === $reflectionClass) {
            $this->parseClassDoc($aliasReflectionClass);
        } else {
            $this->meta['class_doc'] = <<<DOC
/**
 * @see \\{$aliasReflectionClass->name}
 * @see \\{$reflectionClass->name}
 */
DOC;
        }

        $this->parseClassName($aliasReflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->parseConstants($aliasReflectionClass);
        $this->parseConstants($reflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->parseProperties($aliasReflectionClass);
        $this->parseProperties($reflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->parseMethods($aliasReflectionClass);
        $this->parseMethods($reflectionClass, $aliasReflectionClass !== $reflectionClass, function (ReflectionMethod $method) use ($aliasReflectionClass) {
            return true;
//            if ($method->class !== $aliasReflectionClass->name) return true;
//
//            foreach ($aliasReflectionClass->getTraits() as $trait) {
//                if ($trait->hasMethod($method->name)) return true;
//            }
//            return false;
        });

        $this->handleExtraCall($reflectionClass->name);
    }

    protected function handleExtraCall(string $accessor)
    {
        $__calls = include __DIR__ . '/../config/framework.__call.php';
        $accessorChecked = [];
        while (isset($__calls[$accessor]) && empty($accessorChecked[$accessor])) {
            $accessorChecked[$accessor] = true;
            $info = $__calls[$accessor];
            if (is_string($info) || $this->isIndexedArray($info)) {
                $infoArray = (array)$info;
                foreach ($infoArray as $info) {
                    $rc = new ReflectionClass($info);
                    $this->parseMethods($rc, $this->isStaticMethod);
                    $accessor = $rc->name;
                }
            } else if (is_array($info)) {
                $this->handleExtraWhenArray($info);
                break;
            }
        }
    }

    protected function isIndexedArray($array)
    {
        $i = 0;
        foreach ($array as $k => $v) {
            if ($i++ !== $k || !is_string($v)) {
                return false;
            }
        }
        return true;
    }

    protected function handleExtraWhenArray($info)
    {
        foreach ($info as $group) {
            list ($return, $methods, $parameters) = $this->extractMethodsFromGroup($group);
            $types = [];
            $names = [];
            foreach ($parameters as $parameter) {
                list($type, $name) = $parameter;
                $names[] = $name;
                $types[] = "     * @param $type $name";
            }
            $return = '\\' . ltrim($return, '\\');
            $names = implode(', ', $names);
            $types = implode("\n", $types);
            foreach ($methods as $method) {
                $this->meta['methods'][$method] = <<<METHOD
    /**
$types
     *
     * @return $return
     */
    public static function $method($names)
    {
    }

METHOD;
            }
        }
    }

    protected function extractMethodsFromGroup($group): array
    {
        $return = $this->extractFromGroup($group, 'return', 0);

        $methods = $this->extractFromGroup($group, 'methods', 1);
        if (is_string($methods)) $methods = [$methods];

        $parameters = $this->extractFromGroup($group, 'parameters', 2);
        if (is_string($parameters)) $parameters = [$parameters];

        return [$return, $methods, $parameters];
    }

    protected function extractFromGroup($group, $name, $index)
    {
        return $group[$name] ?? ($group[$index] ?? null);
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

    protected $isStaticMethod;

    protected function setIsStaticMethod($names)
    {
        if (is_string($names)) $names = [$names];
        foreach ($names as $name) {
            $name = "$name\\";
            if (
                strpos($name, '\\Model\\')
                || strpos($name, '\\Facades\\')
            ) {
                return $this->isStaticMethod = true;
            }
        }
        return $this->isStaticMethod = false;
    }

}
