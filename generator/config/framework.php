<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-01
 */

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

    $data[] = [
        'alias' => $class,
        'class' => get_class($class::getFacadeRoot()),
        'facade' => $class,
        'accessor' => is_scalar($accessor) ? $accessor : get_class($accessor),
    ];
}

return $data;