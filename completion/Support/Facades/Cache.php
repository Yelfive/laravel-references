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
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Cache::getFacadeAccessor()
         */
        protected static function getFacadeAccessor()
        {
        }

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
         * Create a fresh mock instance for the given class.
         *
         * @return \Mockery\Expectation
         * @see \Illuminate\Support\Facades\Facade::createFreshMockInstance()
         */
        protected static function createFreshMockInstance()
        {
        }

        /**
         * Create a fresh mock instance for the given class.
         *
         * @return \Mockery\MockInterface
         * @see \Illuminate\Support\Facades\Facade::createMock()
         */
        protected static function createMock()
        {
        }

        /**
         * Determines whether a mock is set as the instance of the facade.
         *
         * @return bool
         * @see \Illuminate\Support\Facades\Facade::isMock()
         */
        protected static function isMock()
        {
        }

        /**
         * Get the mockable class for the bound instance.
         *
         * @return string|null
         * @see \Illuminate\Support\Facades\Facade::getMockableClass()
         */
        protected static function getMockableClass()
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
         * Resolve the facade root instance from the container.
         *
         * @param string|object $name
         * @return mixed
         * @see \Illuminate\Support\Facades\Facade::resolveFacadeInstance()
         */
        protected static function resolveFacadeInstance($name)
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
         * Attempt to get the store from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Cache\Repository
         * @see \Illuminate\Cache\CacheManager::get()
         */
        protected static function get($name)
        {
        }

        /**
         * Resolve the given store.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Cache\Repository
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Cache\CacheManager::resolve()
         */
        protected static function resolve($name)
        {
        }

        /**
         * Call a custom driver creator.
         *
         * @param array $config
         * @return mixed
         * @see \Illuminate\Cache\CacheManager::callCustomCreator()
         */
        protected static function callCustomCreator(array $config)
        {
        }

        /**
         * Create an instance of the APC cache driver.
         *
         * @param array $config
         * @return \Illuminate\Cache\ApcStore
         * @see \Illuminate\Cache\CacheManager::createApcDriver()
         */
        protected static function createApcDriver(array $config)
        {
        }

        /**
         * Create an instance of the array cache driver.
         *
         * @return \Illuminate\Cache\ArrayStore
         * @see \Illuminate\Cache\CacheManager::createArrayDriver()
         */
        protected static function createArrayDriver()
        {
        }

        /**
         * Create an instance of the file cache driver.
         *
         * @param array $config
         * @return \Illuminate\Cache\FileStore
         * @see \Illuminate\Cache\CacheManager::createFileDriver()
         */
        protected static function createFileDriver(array $config)
        {
        }

        /**
         * Create an instance of the Memcached cache driver.
         *
         * @param array $config
         * @return \Illuminate\Cache\MemcachedStore
         * @see \Illuminate\Cache\CacheManager::createMemcachedDriver()
         */
        protected static function createMemcachedDriver(array $config)
        {
        }

        /**
         * Create an instance of the Null cache driver.
         *
         * @return \Illuminate\Cache\NullStore
         * @see \Illuminate\Cache\CacheManager::createNullDriver()
         */
        protected static function createNullDriver()
        {
        }

        /**
         * Create an instance of the Redis cache driver.
         *
         * @param array $config
         * @return \Illuminate\Cache\RedisStore
         * @see \Illuminate\Cache\CacheManager::createRedisDriver()
         */
        protected static function createRedisDriver(array $config)
        {
        }

        /**
         * Create an instance of the database cache driver.
         *
         * @param array $config
         * @return \Illuminate\Cache\DatabaseStore
         * @see \Illuminate\Cache\CacheManager::createDatabaseDriver()
         */
        protected static function createDatabaseDriver(array $config)
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
         * Get the cache prefix.
         *
         * @param array $config
         * @return string
         * @see \Illuminate\Cache\CacheManager::getPrefix()
         */
        protected static function getPrefix(array $config)
        {
        }

        /**
         * Get the cache connection configuration.
         *
         * @param string $name
         * @return array
         * @see \Illuminate\Cache\CacheManager::getConfig()
         */
        protected static function getConfig($name)
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

    }
}

namespace {
    class Cache extends Illuminate\Support\Facades\Cache
    {
    }
}