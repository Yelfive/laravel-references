<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-01
 */

/**
 * This file is used to generate relationships of the facades.
 * Not Called Anywhere Now
 */
$__call = include __DIR__ . '/framework.__call.php';

$laravelPath = base_path('vendor/laravel/framework/src/Illuminate');
global $basePath;
$basePath = dirname($laravelPath);
function findClasses($path)
{
    global $basePath;
    $handler = opendir($path);
    while ($name = readdir($handler)) {
        if ($name === '.' || $name === '..') continue;
        $filename = "$path/$name";
        if (is_dir($filename)) {
            foreach (findClasses("$path/$name") as $fromDir) {
                yield $fromDir;
            }
        } else {
            $class = substr($filename, strlen($basePath), -4);
            $class = str_replace('/', '\\', $class);
            if (class_exists($class)) {
                yield $class;
            }
        }
    }
    closedir($handler);
}

$laravelPath = "$laravelPath/Support/Facades";

$data = [];
foreach (findClasses($laravelPath) as $k => $class) {
    $rc = new ReflectionClass($class);
    if ($rc->isAbstract()) {
        continue;
    }
    $method = $rc->getMethod('getFacadeAccessor');
    $method->setAccessible(true);
    $accessor = $method->invoke(new $class);

    $root = get_class($class::getFacadeRoot());
    $data[] = [
        'alias' => $class,
        'class' => $root,
        'facade' => $class,
        'accessor' => is_scalar($accessor) ? $accessor : get_class($accessor),
    ];
}

return $data;