<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference\commands;

use fk\reference\exceptions\InvalidVariableException;
use fk\reference\support\Helper;
use Illuminate\Console\Command;

class Framework extends Command
{
    protected $signature = 'reference:framework';

    protected $description = 'Generate reference docs for Laravel facades etc.';

    protected $data;

    public function handle()
    {
        $classes = include __DIR__ . '/../config/framework.php';
        $k = -1;
        foreach ($classes as $k => $classInfo) {
            $content = $this->docForClass($classInfo);
            $this->write($classInfo, $content);
        }
        $k += 1;
        $this->info("$k files written.");
    }

    protected function validate($classInfo)
    {
        $class = is_string($classInfo) ? $classInfo : $classInfo['alias'];
        $pos = strpos($class, 'Illuminate\\');
        if ($pos !== 0 && $pos !== 1) {
            throw new InvalidVariableException("Class `$class` is not prefixed with Illuminate, thus not supported yet.\n" . Helper::dump($classInfo));
        }
    }

    protected function write($classInfo, $content)
    {
        $class = is_string($classInfo) ? $classInfo : $classInfo['alias'];
        $basename = substr($class, strlen('Illuminate\\'));

        $basename = str_replace('\\', '/', $basename);

        $filename = __DIR__ . "/../../completion/$basename.php";

        $dir = dirname($filename);
        if (!is_file($filename) && !is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $handler = fopen($filename, 'w');
        fwrite($handler, $content);
        fclose($handler);

        $this->info("Class `$class` written");
    }

    protected function extractClassName($classInfo)
    {
        return is_string($classInfo) ? $classInfo : $classInfo['class'];
    }

    protected function initData()
    {
        $this->data = [
            'namespace' => '',
            'uses' => [],
            'class_doc' => '',
            'class_name' => '',
            'constants' => [],
            'properties' => [],
            'methods' => [],
            'end' => '',
        ];
    }

    /**
     * @param array|string $classInfo
     * When array, it must contain elements with key of `alias` or `class`
     * @return string
     */
    protected function docForClass($classInfo)
    {
        $this->initData();

        $classWithNamespace = $this->extractClassName($classInfo);

        $reflectionClass = new \ReflectionClass($classWithNamespace);

        if (is_array($classInfo)) $aliasReflectionClass = new \ReflectionClass($classInfo['alias']);

        if (empty($aliasReflectionClass)) $aliasReflectionClass = $reflectionClass;

        $this->classNamespace($aliasReflectionClass);

        if ($aliasReflectionClass === $reflectionClass) {
            $this->data['class_doc'] = $this->classDocBegin($aliasReflectionClass);
        } else {
            $this->data['class_doc'] = <<<DOC
/**
 * @see {$aliasReflectionClass->name}
 * @see {$reflectionClass->name}
 */
DOC;
        }
        $this->classBegin($aliasReflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->docForConstants($aliasReflectionClass);
        $this->docForConstants($reflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->docForProperties($aliasReflectionClass);
        $this->docForProperties($reflectionClass);

        if ($aliasReflectionClass !== $reflectionClass) $this->docForMethods($aliasReflectionClass);
        $this->docForMethods($reflectionClass, $aliasReflectionClass !== $reflectionClass);

        $this->classDocEnd();

        return $this->dataToString();
    }

    private function _prefixSpace(string $string, string $space): string
    {
        if ($space) $string = $space . str_replace(["\n", "\n$space\n"], ["\n$space", "\n\n"], $string);
        return rtrim($string);
    }

    private function _usesToString(string $moreSpace): string
    {
        if ($moreSpace) {
            $uses = '';
            foreach ($this->data['uses'] as $use => $as) {
                $uses .= "{$moreSpace}use $use" . (basename(str_replace('\\', '/', $use)) === $as ? '' : " as $as;") . ";\n";
            }
            return rtrim($uses, "\n");
        } else {
            $uses = '';
            foreach ($this->data['uses'] as $use => $as) {
                $uses .= "use $use" . (basename(str_replace('\\', '/', $use)) === $as ? '' : " as $as;") . ";\n";
            }
            return rtrim($uses, "\n");
        }
    }

    private function _constantsToString(string $space): string
    {
        $string = implode("\n", $this->data['constants']);
        return $this->_prefixSpace($string, $space);
    }

    private function _propertiesToString(string $space): string
    {
        $string = implode("\n", $this->data['properties']);
        return $this->_prefixSpace($string, $space);
    }

    private function _methodsToString(string $space): string
    {
        $string = implode("\n", $this->data['methods']);
        return $this->_prefixSpace($string, $space);
    }

    protected function dataToString(): string
    {
        $namespace = $this->data['namespace'];
        if (strpos("$namespace\\", '\Facades\\')) {
            $space = str_repeat(' ', 4);
            $namespaceDelimiter = ' {';
            $end = "\n}";
        } else {
            $space = '';
            $namespaceDelimiter = ';';
            $end = '';
        }

        $class = $this->data['class_name'];
        $docs = $this->_prefixSpace($this->data['class_doc'], $space);
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

    protected function classBegin(\ReflectionClass $reflectionClass)
    {
        $this->data['class_name'] = $reflectionClass->getShortName();
    }

    protected function docForConstants(\ReflectionClass $reflectionClass)
    {
        foreach ($reflectionClass->getConstants() as $constant => $value) {
            $value = Helper::dump($value, true);
            $this->data['constants'][$constant] = <<<DOC
    const $constant = $value;

DOC;
        }
    }

    protected function classDocEnd()
    {
        $this->data['end'] = '}';
    }

    protected function classNamespace(\ReflectionClass $reflectionClass)
    {
        $this->data['namespace'] = $reflectionClass->getNamespaceName();
    }

    protected function classDocBegin(\ReflectionClass $reflectionClass)
    {
        return $reflectionClass->getDocComment();
    }

    /**
     * @param \ReflectionClass $reflectionClass
     */
    protected function docForProperties($reflectionClass)
    {
        $properties = $reflectionClass->getProperties();
        foreach ($properties as $property) {
            $privacy = $this->propertyPrivacy($property);
            if (!$privacy) continue;
            $doc = $property->getDocComment();
            $static = $property->isStatic() ? 'static ' : '';

            $this->data['properties'][$property->name] = <<<DOC
    $doc
    $privacy $static\${$property->name};

DOC;
        }
    }

    protected function propertyPrivacy(\ReflectionProperty $property)
    {
        if ($property->isProtected()) {
            return 'protected';
        } else if ($property->isPublic()) {
            return 'public';
        } else if ($property->isPrivate()) {
            return 'private';
        }
        return '';
    }

    /**
     * @param \ReflectionClass $reflectionClass
     * @param bool $forceStatic
     */
    protected function docForMethods($reflectionClass, $forceStatic = false)
    {
        $methods = $reflectionClass->getMethods();

        foreach ($methods as $method) {
            if ($this->skipMethod($method)) continue;

            $doc = $this->methodDoc($method);
            $privacy = $this->methodPrivacy($method);
            $static = $this->methodStatic($method, $forceStatic);
            $parameters = $this->parameters($method);
            $this->data['methods'][$method->name] = <<<DOC
    $doc
    $privacy {$static}function $method->name($parameters)
    {
    }

DOC;
        }
    }

    protected function methodStatic(\ReflectionMethod $method, $forceStatic = false): string
    {
        if (in_array($method->name, ['__construct'])) {
            return '';
        }
        return $forceStatic || $method->isStatic() ? 'static ' : '';
    }

    protected function methodDoc(\ReflectionMethod $method): string
    {
        $rawDoc = $method->getDocComment();
        $doc = [];
        foreach (explode("\n", $rawDoc) as $line) {
            $doc[] = preg_replace_callback('/\S(\s+)\S/', function ($match) {
                return preg_replace('/\s+/', ' ', $match[0]);
            }, $line);
        }
        $docString = implode("\n", $doc);
        return str_replace('@return void', $method->isConstructor() ? '' : '@return null', $docString);
    }

    protected function skipMethod(\ReflectionMethod $method): bool
    {
        return $method->isPrivate() || in_array($method->name, [
            '__call', '__callStatic', '__toString',
            '__get', '__set', '__invoke', '__sleep', '__clone'
        ]);
    }

    protected function methodPrivacy(\ReflectionMethod $method)
    {
        if ($method->isProtected()) {
            return 'protected';
        } else if ($method->isPublic()) {
            return 'public';
        }
        return '';
    }

    protected function parameters(\ReflectionMethod $method): string
    {
        $parameters = [];
        foreach ($method->getParameters() as $parameter) {
            $type = $this->parameterType($parameter->getType());
            $parameters[] = "$type\$$parameter->name" . ($parameter->isDefaultValueAvailable() ? ' = ' . Helper::dump($parameter->getDefaultValue(), true) : '');
        }
        return implode(', ', $parameters);
    }

    protected function parameterType($reflectionType): string
    {
        if ($reflectionType instanceof \ReflectionType) {
            $type = $reflectionType->__toString();

            if ($reflectionType->isBuiltin()) return $type . ' ';

            $uses = &$this->data['uses'];

            $shortType = basename(str_replace('\\', '/', $type));
            if ($shortType === $this->data['class_name'] || !isset($uses[$type]) && in_array($shortType, $uses)) {
                return "\\$type ";
            } else {
                $this->data['uses'][$type] = $shortType;
                return "$shortType ";
            }
        } else {
            return '';
        }
    }

}