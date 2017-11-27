<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-04
 */

/**
 * This is used when facades accessor has a __call to redirect the methods call into another class
 *```
 *  // Used when __call invokes callee methods at caller::__call
 *  caller::class => callee::class,
 *  // Used when __call sets attributes instead of calling another method in another class
 *  caller::class => [
 *      'return' => someType
 *      'methods' => [],    // the methods called via __call
 *      'parameters' => [] // the parameters passed via __call
 *  ]
 *
 *```
 */
return [
    \Illuminate\Session\SessionManager::class => \Illuminate\Session\Store::class,
    \Illuminate\Routing\Router::class => \Illuminate\Routing\RouteRegistrar::class,
    \Illuminate\Routing\RouteRegistrar::class => [
        [
            'return' => \Illuminate\Routing\Route::class,
            'methods' => ['get', 'post', 'put', 'patch', 'delete', 'options', 'any'],
            'parameters' => [['string', '$uri'], ['\Closure|array|string|null', '$action']],
        ],
        [
            'return' => \Illuminate\Routing\RouteRegistrar::class,
            'methods' => ['as', 'domain', 'middleware', 'name', 'namespace', 'prefix'],
            'parameters' => [['mixed', '$value']],
        ],
    ],
    \Illuminate\Http\Request::class => [
        [
            'methods' => 'validate',
            'parameters' => [['array', '$rules']]
        ]
    ],
    \Illuminate\Database\Eloquent\Model::class => \Illuminate\Database\Eloquent\Builder::class,
    \Illuminate\Database\Eloquent\Builder::class => \Illuminate\Database\Query\Builder::class,
    \Illuminate\Database\DatabaseManager::class => \Illuminate\Database\Connection::class,
    \Illuminate\Cache\CacheManager::class => \Illuminate\Contracts\Cache\Repository::class,
    \Illuminate\Auth\AuthManager::class => [\Illuminate\Contracts\Auth\Guard::class, \Illuminate\Contracts\Auth\StatefulGuard::class],
];