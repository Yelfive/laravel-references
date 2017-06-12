<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\Cache\Store;
    use Closure;

    /**
     * @see Illuminate\Support\Facades\Cache
     * @see Illuminate\Cache\CacheManager
     */
    class Cache
    {


        /**
         * The application instance being facaded.
         *
         * @var \Illuminate\Contracts\Foundation\Application
         */
        protected static $app;

        /**
         * The resolved object instances.
         *
         * @var array
         */
        protected static $resolvedInstance;

        /**
         * The array of resolved cache stores.
         *
         * @var array
         */
        protected $stores;

        /**
         * The registered custom driver creators.
         *
         * @var array
         */
        protected $customCreators;

        /**
         * Convert the facade into a Mockery spy.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Facade::spy()
         */
        public static function spy()
        {
        }

        /**
         * Initiate a mock expectation on the facade.
         *
         * @return \Mockery\Expectation
         * @see \Illuminate\Support\Facades\Facade::shouldReceive()
         */
        public static function shouldReceive()
        {
        }

        /**
         * Hotswap the underlying instance behind the facade.
         *
         * @param mixed $instance
         * @return null
         * @see \Illuminate\Support\Facades\Facade::swap()
         */
        public static function swap($instance)
        {
        }

        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         * @see \Illuminate\Support\Facades\Facade::getFacadeRoot()
         */
        public static function getFacadeRoot()
        {
        }

        /**
         * Clear a resolved facade instance.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Support\Facades\Facade::clearResolvedInstance()
         */
        public static function clearResolvedInstance($name)
        {
        }

        /**
         * Clear all of the resolved instances.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Facade::clearResolvedInstances()
         */
        public static function clearResolvedInstances()
        {
        }

        /**
         * Get the application instance behind the facade.
         *
         * @return \Illuminate\Contracts\Foundation\Application
         * @see \Illuminate\Support\Facades\Facade::getFacadeApplication()
         */
        public static function getFacadeApplication()
        {
        }

        /**
         * Set the application instance.
         *
         * @param \Illuminate\Contracts\Foundation\Application $app
         * @return null
         * @see \Illuminate\Support\Facades\Facade::setFacadeApplication()
         */
        public static function setFacadeApplication($app)
        {
        }

        /**
         * Create a new Cache manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * 
         * @see \Illuminate\Cache\CacheManager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Get a cache store instance by name.
         *
         * @param string|null $name
         * @return mixed
         * @see \Illuminate\Cache\CacheManager::store()
         */
        public static function store($name = null)
        {
        }

        /**
         * Get a cache driver instance.
         *
         * @param string $driver
         * @return mixed
         * @see \Illuminate\Cache\CacheManager::driver()
         */
        public static function driver($driver = null)
        {
        }

        /**
         * Create a new cache repository with the given implementation.
         *
         * @param \Illuminate\Contracts\Cache\Store $store
         * @return \Illuminate\Cache\Repository
         * @see \Illuminate\Cache\CacheManager::repository()
         */
        public static function repository(Store $store)
        {
        }

        /**
         * Get the default cache driver name.
         *
         * @return string
         * @see \Illuminate\Cache\CacheManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Set the default cache driver name.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Cache\CacheManager::setDefaultDriver()
         */
        public static function setDefaultDriver($name)
        {
        }

        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Cache\CacheManager
         * @see \Illuminate\Cache\CacheManager::extend()
         */
        public static function extend($driver, Closure $callback)
        {
        }

        /**
         * Determine if an item exists in the cache.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Contracts\Cache\Repository::has()
         */
        public static function has($key)
        {
        }

        /**
         * Retrieve an item from the cache by key.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\Contracts\Cache\Repository::get()
         */
        public static function get($key, $default = null)
        {
        }

        /**
         * Retrieve an item from the cache and delete it.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\Contracts\Cache\Repository::pull()
         */
        public static function pull($key, $default = null)
        {
        }

        /**
         * Store an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @param \DateTime|float|int $minutes
         * @return null
         * @see \Illuminate\Contracts\Cache\Repository::put()
         */
        public static function put($key, $value, $minutes)
        {
        }

        /**
         * Store an item in the cache if the key does not exist.
         *
         * @param string $key
         * @param mixed $value
         * @param \DateTime|float|int $minutes
         * @return bool
         * @see \Illuminate\Contracts\Cache\Repository::add()
         */
        public static function add($key, $value, $minutes)
        {
        }

        /**
         * Increment the value of an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @return int|bool
         * @see \Illuminate\Contracts\Cache\Repository::increment()
         */
        public static function increment($key, $value = 1)
        {
        }

        /**
         * Decrement the value of an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @return int|bool
         * @see \Illuminate\Contracts\Cache\Repository::decrement()
         */
        public static function decrement($key, $value = 1)
        {
        }

        /**
         * Store an item in the cache indefinitely.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Contracts\Cache\Repository::forever()
         */
        public static function forever($key, $value)
        {
        }

        /**
         * Get an item from the cache, or store the default value.
         *
         * @param string $key
         * @param \DateTime|float|int $minutes
         * @param \Closure $callback
         * @return mixed
         * @see \Illuminate\Contracts\Cache\Repository::remember()
         */
        public static function remember($key, $minutes, Closure $callback)
        {
        }

        /**
         * Get an item from the cache, or store the default value forever.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed
         * @see \Illuminate\Contracts\Cache\Repository::sear()
         */
        public static function sear($key, Closure $callback)
        {
        }

        /**
         * Get an item from the cache, or store the default value forever.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed
         * @see \Illuminate\Contracts\Cache\Repository::rememberForever()
         */
        public static function rememberForever($key, Closure $callback)
        {
        }

        /**
         * Remove an item from the cache.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Contracts\Cache\Repository::forget()
         */
        public static function forget($key)
        {
        }

    }
}

namespace {
    class Cache extends Illuminate\Support\Facades\Cache
    {
    }
}