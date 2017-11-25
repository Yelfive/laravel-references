<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\Cache\Store;
    use Closure;

    /**
     * @see \Illuminate\Support\Facades\Cache
     * @see \Illuminate\Cache\CacheManager
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
         * @return \Illuminate\Contracts\Cache\Repository
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
         * @param \DateTimeInterface|\DateInterval|float|int $minutes
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
         * @param \DateTimeInterface|\DateInterval|float|int $minutes
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
         * @param \DateTimeInterface|\DateInterval|float|int $minutes
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

        /**
         * Get the cache store implementation.
         *
         * @return \Illuminate\Contracts\Cache\Store
         * @see \Illuminate\Contracts\Cache\Repository::getStore()
         */
        public static function getStore()
        {
        }

        /**
         * Persists data in the cache, uniquely referenced by a key with an optional expiration TTL time.
         *
         * @param string $key The key of the item to store.
         * @param mixed $value The value of the item to store, must be serializable.
         * @param null|int|DateInterval $ttl Optional. The TTL value of this item. If no value is sent and
         * the driver supports TTL then the library may set a default value
         * for it or let the driver take care of that.
         *
         * @return bool True on success and false on failure.
         *
         * @throws \Psr\SimpleCache\InvalidArgumentException
         * MUST be thrown if the $key string is not a legal value.
         * @see \Psr\SimpleCache\CacheInterface::set()
         */
        public static function set($key, $value, $ttl = null)
        {
        }

        /**
         * Delete an item from the cache by its unique key.
         *
         * @param string $key The unique cache key of the item to delete.
         *
         * @return bool True if the item was successfully removed. False if there was an error.
         *
         * @throws \Psr\SimpleCache\InvalidArgumentException
         * MUST be thrown if the $key string is not a legal value.
         * @see \Psr\SimpleCache\CacheInterface::delete()
         */
        public static function delete($key)
        {
        }

        /**
         * Wipes clean the entire cache's keys.
         *
         * @return bool True on success and false on failure.
         * @see \Psr\SimpleCache\CacheInterface::clear()
         */
        public static function clear()
        {
        }

        /**
         * Obtains multiple cache items by their unique keys.
         *
         * @param iterable $keys A list of keys that can obtained in a single operation.
         * @param mixed $default Default value to return for keys that do not exist.
         *
         * @return iterable A list of key => value pairs. Cache keys that do not exist or are stale will have $default as value.
         *
         * @throws \Psr\SimpleCache\InvalidArgumentException
         * MUST be thrown if $keys is neither an array nor a Traversable,
         * or if any of the $keys are not a legal value.
         * @see \Psr\SimpleCache\CacheInterface::getMultiple()
         */
        public static function getMultiple($keys, $default = null)
        {
        }

        /**
         * Persists a set of key => value pairs in the cache, with an optional TTL.
         *
         * @param iterable $values A list of key => value pairs for a multiple-set operation.
         * @param null|int|DateInterval $ttl Optional. The TTL value of this item. If no value is sent and
         * the driver supports TTL then the library may set a default value
         * for it or let the driver take care of that.
         *
         * @return bool True on success and false on failure.
         *
         * @throws \Psr\SimpleCache\InvalidArgumentException
         * MUST be thrown if $values is neither an array nor a Traversable,
         * or if any of the $values are not a legal value.
         * @see \Psr\SimpleCache\CacheInterface::setMultiple()
         */
        public static function setMultiple($values, $ttl = null)
        {
        }

        /**
         * Deletes multiple cache items in a single operation.
         *
         * @param iterable $keys A list of string-based keys to be deleted.
         *
         * @return bool True if the items were successfully removed. False if there was an error.
         *
         * @throws \Psr\SimpleCache\InvalidArgumentException
         * MUST be thrown if $keys is neither an array nor a Traversable,
         * or if any of the $keys are not a legal value.
         * @see \Psr\SimpleCache\CacheInterface::deleteMultiple()
         */
        public static function deleteMultiple($keys)
        {
        }

    }
}

namespace {
    class Cache extends Illuminate\Support\Facades\Cache
    {
    }
}