<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-01
 */

/**
 *  [
 *      [
 *          'alias' => facade::class,
 *          'class' => facade::accessor,
 *          'facade' => facade::class,
 *          'accessor' => facade::accessor_name
 *      ]
 *  ]
 *
 * Staticize the facades, in case the accessor overwritten by custom Service Provider
 */
return [
    [
        'alias' => '\Illuminate\Support\Facades\App',
        'class' => 'Illuminate\Foundation\Application',
        'facade' => '\Illuminate\Support\Facades\App',
        'accessor' => 'app',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Artisan',
        'class' => 'App\Console\Kernel',
        'facade' => '\Illuminate\Support\Facades\Artisan',
        'accessor' => 'Illuminate\Contracts\Console\Kernel',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Auth',
        'class' => 'Illuminate\Auth\AuthManager',
        'facade' => '\Illuminate\Support\Facades\Auth',
        'accessor' => 'auth',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Blade',
        'class' => 'Illuminate\View\Compilers\BladeCompiler',
        'facade' => '\Illuminate\Support\Facades\Blade',
        'accessor' => 'Illuminate\View\Compilers\BladeCompiler',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Broadcast',
        'class' => 'Illuminate\Broadcasting\BroadcastManager',
        'facade' => '\Illuminate\Support\Facades\Broadcast',
        'accessor' => 'Illuminate\Contracts\Broadcasting\Factory',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Bus',
        'class' => 'Illuminate\Bus\Dispatcher',
        'facade' => '\Illuminate\Support\Facades\Bus',
        'accessor' => 'Illuminate\Contracts\Bus\Dispatcher',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Cache',
        'class' => 'Illuminate\Cache\CacheManager',
        'facade' => '\Illuminate\Support\Facades\Cache',
        'accessor' => 'cache',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Config',
        'class' => 'Illuminate\Config\Repository',
        'facade' => '\Illuminate\Support\Facades\Config',
        'accessor' => 'config',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Cookie',
        'class' => 'Illuminate\Cookie\CookieJar',
        'facade' => '\Illuminate\Support\Facades\Cookie',
        'accessor' => 'cookie',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Crypt',
        'class' => 'Illuminate\Encryption\Encrypter',
        'facade' => '\Illuminate\Support\Facades\Crypt',
        'accessor' => 'encrypter',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\DB',
        'class' => 'Illuminate\Database\DatabaseManager',
        'facade' => '\Illuminate\Support\Facades\DB',
        'accessor' => 'db',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Event',
        'class' => 'Illuminate\Events\Dispatcher',
        'facade' => '\Illuminate\Support\Facades\Event',
        'accessor' => 'events',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\File',
        'class' => 'Illuminate\Filesystem\Filesystem',
        'facade' => '\Illuminate\Support\Facades\File',
        'accessor' => 'files',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Gate',
        'class' => 'Illuminate\Auth\Access\Gate',
        'facade' => '\Illuminate\Support\Facades\Gate',
        'accessor' => 'Illuminate\Contracts\Auth\Access\Gate',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Hash',
        'class' => 'Illuminate\Hashing\BcryptHasher',
        'facade' => '\Illuminate\Support\Facades\Hash',
        'accessor' => 'hash',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Input',
        'class' => 'Illuminate\Http\Request',
        'facade' => '\Illuminate\Support\Facades\Input',
        'accessor' => 'request',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Lang',
        'class' => 'Illuminate\Translation\Translator',
        'facade' => '\Illuminate\Support\Facades\Lang',
        'accessor' => 'translator',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Log',
        'class' => 'Illuminate\Log\Writer',
        'facade' => '\Illuminate\Support\Facades\Log',
        'accessor' => 'Psr\Log\LoggerInterface',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Mail',
        'class' => 'Illuminate\Mail\Mailer',
        'facade' => '\Illuminate\Support\Facades\Mail',
        'accessor' => 'mailer',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Notification',
        'class' => 'Illuminate\Notifications\ChannelManager',
        'facade' => '\Illuminate\Support\Facades\Notification',
        'accessor' => 'Illuminate\Notifications\ChannelManager',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Password',
        'class' => 'Illuminate\Auth\Passwords\PasswordBrokerManager',
        'facade' => '\Illuminate\Support\Facades\Password',
        'accessor' => 'auth.password',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Queue',
        'class' => 'Illuminate\Queue\QueueManager',
        'facade' => '\Illuminate\Support\Facades\Queue',
        'accessor' => 'queue',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Redirect',
        'class' => 'Illuminate\Routing\Redirector',
        'facade' => '\Illuminate\Support\Facades\Redirect',
        'accessor' => 'redirect',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Redis',
        'class' => 'Illuminate\Redis\RedisManager',
        'facade' => '\Illuminate\Support\Facades\Redis',
        'accessor' => 'redis',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Request',
        'class' => 'Illuminate\Http\Request',
        'facade' => '\Illuminate\Support\Facades\Request',
        'accessor' => 'request',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Response',
        'class' => 'Illuminate\Routing\ResponseFactory',
        'facade' => '\Illuminate\Support\Facades\Response',
        'accessor' => 'Illuminate\Contracts\Routing\ResponseFactory',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Route',
        'class' => 'Illuminate\Routing\Router',
        'facade' => '\Illuminate\Support\Facades\Route',
        'accessor' => 'router',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Schema',
        'class' => 'Illuminate\Database\Schema\MySqlBuilder',
        'facade' => '\Illuminate\Support\Facades\Schema',
        'accessor' => 'Illuminate\Database\Schema\MySqlBuilder',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Session',
        'class' => 'Illuminate\Session\SessionManager',
        'facade' => '\Illuminate\Support\Facades\Session',
        'accessor' => 'session',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Storage',
        'class' => 'Illuminate\Filesystem\FilesystemManager',
        'facade' => '\Illuminate\Support\Facades\Storage',
        'accessor' => 'filesystem',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\URL',
        'class' => 'Illuminate\Routing\UrlGenerator',
        'facade' => '\Illuminate\Support\Facades\URL',
        'accessor' => 'url',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\Validator',
        'class' => 'Illuminate\Validation\Factory',
        'facade' => '\Illuminate\Support\Facades\Validator',
        'accessor' => 'validator',
    ],
    [
        'alias' => '\Illuminate\Support\Facades\View',
        'class' => 'Illuminate\View\Factory',
        'facade' => '\Illuminate\Support\Facades\View',
        'accessor' => 'view',
    ],

    // Normal classes
    \Illuminate\Routing\RouteRegistrar::class,
    \Illuminate\Database\Eloquent\Model::class,
    \Illuminate\Http\Request::class,
];