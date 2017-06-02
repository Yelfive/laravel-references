<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-02
 */

namespace fk\reference\support;

use fk\reference\exceptions\InvalidVariableException;

trait ParseClassTrait
{
    /**
     * @var array
     *  - methods
     *      //
     */
    public $meta;

    protected function initMeta()
    {
        $this->meta = [
            'namespace' => '',
            'uses' => new ClassMember(),
            'class_doc' => '',
            'class_name' => '',
            'constants' => new ClassMember(),
            'properties' => new ClassMember(),
            'methods' => new ClassMember(),
        ];
    }

    protected function write($fullClassName, $content)
    {
        $basename = substr($fullClassName, strlen('Illuminate\\'));

        $basename = str_replace('\\', '/', $basename);

        $filename = dirname(dirname(__DIR__)) . "/completion/$basename.php";

        if (is_dir($filename)) throw new InvalidVariableException("Failed to write: The destination is a directory. $filename");

        $dir = dirname($filename);

        if (!$this->validateDirectory($dir)) return false;

        if (
            !is_file($filename)
            || is_file($filename) && (
                $this->option('overwrite') ||
                $this->confirm("File [$filename] exits, overwrite?")
            )
        ) {
            fwrite($handler = fopen($filename, 'w'), $content);
            fclose($handler);

            $this->info("Class `$fullClassName` written");
            return true;
        } else {
            $this->warn('Abort overwriting.');
            return false;
        }
    }

    protected function validateDirectory($dir)
    {
        if (file_exists($dir)) {
            if (!is_dir($dir)) throw new InvalidVariableException("$dir is expected to be directory, not file");
        } else {
            if ($this->confirm("Directory [$dir] does not exists. Create?")) {
                mkdir($dir, 0755, true);
            } else {
                $this->warn("Abort creating directory. $dir");
                return false;
            }
        }
        return true;
    }

    private function _prefixSpace(string $string, string $space, bool $appendLF = true): string
    {
        if ($space) $string = $space . str_replace(["\n", "\n$space\n"], ["\n$space", "\n\n"], $string);
        return rtrim($string) . ($appendLF ? "\n" : '');
    }

    private function _usesToString(string $space = ''): string
    {
        /** @var ClassMember $metaUse */
        $metaUse = $this->meta['uses'];
        $data = $metaUse->getData();
        if ($space) {
            $uses = '';
            foreach ($data as $use => $as) {
                $uses .= "{$space}use $use" . (basename(str_replace('\\', '/', $use)) === $as ? '' : " as $as;") . ";\n";
            }
            return rtrim($uses, "\n");
        } else {
            $uses = '';
            foreach ($data as $use => $as) {
                $uses .= "use $use" . (basename(str_replace('\\', '/', $use)) === $as ? '' : " as $as;") . ";\n";
            }
            return rtrim($uses, "\n");
        }
    }

    private function _constantsToString(string $space = ''): string
    {
        if (empty($this->meta['constants'])) return '';

        $string = $this->_implode("\n", $this->meta['constants']);
        return $this->_prefixSpace($string, $space);
    }

    private function _propertiesToString(string $space = ''): string
    {
        $string = $this->_implode("\n", $this->meta['properties']);
        return $this->_prefixSpace($string, $space);
    }

    private function _methodsToString(string $space = ''): string
    {
        $string = $this->_implode("\n", $this->meta['methods']);
        return $this->_prefixSpace($string, $space);
    }

    private function _implode($glue, $pieces)
    {
        if ($pieces instanceof ClassMember) $pieces = $pieces->getData();
        return implode($glue, $pieces);
    }

    protected function parseClassName(\ReflectionClass $reflectionClass)
    {
        $this->meta['class_name'] = $reflectionClass->getShortName();
    }

    protected function parseConstants(\ReflectionClass $reflectionClass)
    {
        foreach ($reflectionClass->getConstants() as $constant => $value) {
            $value = Helper::dump($value, true);
            $this->meta['constants'][$constant] = <<<DOC
    const $constant = $value;

DOC;
        }
    }

    protected function parseNamespace(\ReflectionClass $reflectionClass)
    {
        $this->meta['namespace'] = $reflectionClass->getNamespaceName();
    }

    protected function parseClassDoc(\ReflectionClass $reflectionClass)
    {
        $this->meta['class_doc'] = $reflectionClass->getDocComment();
    }

    /**
     * @param \ReflectionClass $reflectionClass
     */
    protected function parseProperties($reflectionClass)
    {
        $properties = $reflectionClass->getProperties();
        foreach ($properties as $property) {
            if (false == $privacy = $this->propertyPrivacy($property)) continue;

            $doc = $property->getDocComment();
            $static = $property->isStatic() ? 'static ' : '';

            $this->meta['properties'][$property->name] = <<<DOC
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
     * @param null|callable $condition
     */
    protected function parseMethods($reflectionClass, $forceStatic = false, $condition = null)
    {
        $methods = $reflectionClass->getMethods();

        foreach ($methods as $method) {
            if ($this->skipMethod($method)) continue;
            if (is_callable($condition) && !$condition($method)) continue;

            $doc = $this->methodDoc($method);
            $privacy = $this->methodPrivacy($method);
            $static = $this->methodStatic($method, $forceStatic);
            $parameters = $this->parameters($method);
            $this->meta['methods'][$method->name] = <<<DOC
    $doc
    $privacy {$static}function $method->name($parameters)
    {
    }

DOC;
        }
    }

    /**
     * @param \ReflectionMethod $method
     * @param bool|callable $forceStatic
     * @return string
     */
    protected function methodStatic(\ReflectionMethod $method, $forceStatic = false): string
    {
        if (is_callable($forceStatic)) $forceStatic = $forceStatic($method);

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
        $docString = str_replace('@return void', $method->isConstructor() ? '' : '@return null', $docString);
        if ($this->targetClassName !== $method->class) {
            $docString = str_replace('@return $this', "@return \\$method->class", $docString);
        }
        $pos = strrpos($docString, "\n");
        if ($pos !== false) {
            $lastLine = substr($docString, $pos + 1);
            $space = substr($lastLine, 0, -2);
            $docString = substr($docString, 0, $pos + 1) . <<<DOC
$space* @see \\{$method->getDeclaringClass()->name}::{$method->name}()
$space*/
DOC;
        }
        return $docString;
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

            $uses = &$this->meta['uses'];

            $shortType = basename(str_replace('\\', '/', $type));
            if ($shortType === $this->meta['class_name'] || !isset($uses[$type]) && in_array($shortType, $uses->getData())) {
                return "\\$type ";
            } else {
                $this->meta['uses'][$type] = $shortType;
                return "$shortType ";
            }
        } else {
            return '';
        }
    }

}