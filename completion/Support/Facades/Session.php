<?php

namespace Illuminate\Support\Facades {

    use Closure;
    use SessionHandlerInterface;

    /**
     * @see Illuminate\Support\Facades\Session
     * @see Illuminate\Session\SessionManager
     */
    class Session
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
         * The registered custom driver creators.
         *
         * @var array
         */
        protected $customCreators;

        /**
         * The array of created "drivers".
         *
         * @var array
         */
        protected $drivers;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Session::getFacadeAccessor()
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
         * Call a custom driver creator.
         *
         * @param string $driver
         * @return mixed
         * @see \Illuminate\Session\SessionManager::callCustomCreator()
         */
        protected static function callCustomCreator($driver)
        {
        }

        /**
         * Create an instance of the "array" session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createArrayDriver()
         */
        protected static function createArrayDriver()
        {
        }

        /**
         * Create an instance of the "cookie" session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createCookieDriver()
         */
        protected static function createCookieDriver()
        {
        }

        /**
         * Create an instance of the file session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createFileDriver()
         */
        protected static function createFileDriver()
        {
        }

        /**
         * Create an instance of the file session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createNativeDriver()
         */
        protected static function createNativeDriver()
        {
        }

        /**
         * Create an instance of the database session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createDatabaseDriver()
         */
        protected static function createDatabaseDriver()
        {
        }

        /**
         * Get the database connection for the database driver.
         *
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Session\SessionManager::getDatabaseConnection()
         */
        protected static function getDatabaseConnection()
        {
        }

        /**
         * Create an instance of the APC session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createApcDriver()
         */
        protected static function createApcDriver()
        {
        }

        /**
         * Create an instance of the Memcached session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createMemcachedDriver()
         */
        protected static function createMemcachedDriver()
        {
        }

        /**
         * Create an instance of the Redis session driver.
         *
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createRedisDriver()
         */
        protected static function createRedisDriver()
        {
        }

        /**
         * Create an instance of a cache driven driver.
         *
         * @param string $driver
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::createCacheBased()
         */
        protected static function createCacheBased($driver)
        {
        }

        /**
         * Create the cache based session handler instance.
         *
         * @param string $driver
         * @return \Illuminate\Session\CacheBasedSessionHandler
         * @see \Illuminate\Session\SessionManager::createCacheHandler()
         */
        protected static function createCacheHandler($driver)
        {
        }

        /**
         * Build the session instance.
         *
         * @param \SessionHandlerInterface $handler
         * @return \Illuminate\Session\Store
         * @see \Illuminate\Session\SessionManager::buildSession()
         */
        protected static function buildSession($handler)
        {
        }

        /**
         * Build the encrypted session instance.
         *
         * @param \SessionHandlerInterface $handler
         * @return \Illuminate\Session\EncryptedStore
         * @see \Illuminate\Session\SessionManager::buildEncryptedSession()
         */
        protected static function buildEncryptedSession($handler)
        {
        }

        /**
         * Get the session configuration.
         *
         * @return array
         * @see \Illuminate\Session\SessionManager::getSessionConfig()
         */
        public static function getSessionConfig()
        {
        }

        /**
         * Get the default session driver name.
         *
         * @return string
         * @see \Illuminate\Session\SessionManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Set the default session driver name.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Session\SessionManager::setDefaultDriver()
         */
        public static function setDefaultDriver($name)
        {
        }

        /**
         * Create a new manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * 
         * @see \Illuminate\Support\Manager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed
         * @see \Illuminate\Support\Manager::driver()
         */
        public static function driver($driver = null)
        {
        }

        /**
         * Create a new driver instance.
         *
         * @param string $driver
         * @return mixed
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Support\Manager::createDriver()
         */
        protected static function createDriver($driver)
        {
        }

        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Support\Manager
         * @see \Illuminate\Support\Manager::extend()
         */
        public static function extend($driver, Closure $callback)
        {
        }

        /**
         * Get all of the created "drivers".
         *
         * @return array
         * @see \Illuminate\Support\Manager::getDrivers()
         */
        public static function getDrivers()
        {
        }

        /**
         * Start the session, reading the data from a handler.
         *
         * @return bool
         * @see \Illuminate\Session\Store::start()
         */
        public static function start()
        {
        }

        /**
         * Load the session data from the handler.
         *
         * @return null
         * @see \Illuminate\Session\Store::loadSession()
         */
        protected static function loadSession()
        {
        }

        /**
         * Read the session data from the handler.
         *
         * @return array
         * @see \Illuminate\Session\Store::readFromHandler()
         */
        protected static function readFromHandler()
        {
        }

        /**
         * Prepare the raw string data from the session for unserialization.
         *
         * @param string $data
         * @return string
         * @see \Illuminate\Session\Store::prepareForUnserialize()
         */
        protected static function prepareForUnserialize($data)
        {
        }

        /**
         * Save the session data to storage.
         *
         * @return bool
         * @see \Illuminate\Session\Store::save()
         */
        public static function save()
        {
        }

        /**
         * Prepare the serialized session data for storage.
         *
         * @param string $data
         * @return string
         * @see \Illuminate\Session\Store::prepareForStorage()
         */
        protected static function prepareForStorage($data)
        {
        }

        /**
         * Age the flash data for the session.
         *
         * @return null
         * @see \Illuminate\Session\Store::ageFlashData()
         */
        public static function ageFlashData()
        {
        }

        /**
         * Get all of the session data.
         *
         * @return array
         * @see \Illuminate\Session\Store::all()
         */
        public static function all()
        {
        }

        /**
         * Checks if a key exists.
         *
         * @param string|array $key
         * @return bool
         * @see \Illuminate\Session\Store::exists()
         */
        public static function exists($key)
        {
        }

        /**
         * Checks if a key is present and not null.
         *
         * @param string|array $key
         * @return bool
         * @see \Illuminate\Session\Store::has()
         */
        public static function has($key)
        {
        }

        /**
         * Get an item from the session.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\Session\Store::get()
         */
        public static function get($key, $default = null)
        {
        }

        /**
         * Get the value of a given key and then forget it.
         *
         * @param string $key
         * @param string $default
         * @return mixed
         * @see \Illuminate\Session\Store::pull()
         */
        public static function pull($key, $default = null)
        {
        }

        /**
         * Determine if the session contains old input.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Session\Store::hasOldInput()
         */
        public static function hasOldInput($key = null)
        {
        }

        /**
         * Get the requested item from the flashed input array.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\Session\Store::getOldInput()
         */
        public static function getOldInput($key = null, $default = null)
        {
        }

        /**
         * Replace the given session attributes entirely.
         *
         * @param array $attributes
         * @return null
         * @see \Illuminate\Session\Store::replace()
         */
        public static function replace(array $attributes)
        {
        }

        /**
         * Put a key / value pair or array of key / value pairs in the session.
         *
         * @param string|array $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Session\Store::put()
         */
        public static function put($key, $value = null)
        {
        }

        /**
         * Get an item from the session, or store the default value.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed
         * @see \Illuminate\Session\Store::remember()
         */
        public static function remember($key, Closure $callback)
        {
        }

        /**
         * Push a value onto a session array.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Session\Store::push()
         */
        public static function push($key, $value)
        {
        }

        /**
         * Increment the value of an item in the session.
         *
         * @param string $key
         * @param int $amount
         * @return mixed
         * @see \Illuminate\Session\Store::increment()
         */
        public static function increment($key, $amount = 1)
        {
        }

        /**
         * Decrement the value of an item in the session.
         *
         * @param string $key
         * @param int $amount
         * @return int
         * @see \Illuminate\Session\Store::decrement()
         */
        public static function decrement($key, $amount = 1)
        {
        }

        /**
         * Flash a key / value pair to the session.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Session\Store::flash()
         */
        public static function flash($key, $value)
        {
        }

        /**
         * Flash a key / value pair to the session for immediate use.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Session\Store::now()
         */
        public static function now($key, $value)
        {
        }

        /**
         * Reflash all of the session flash data.
         *
         * @return null
         * @see \Illuminate\Session\Store::reflash()
         */
        public static function reflash()
        {
        }

        /**
         * Reflash a subset of the current flash data.
         *
         * @param array|mixed $keys
         * @return null
         * @see \Illuminate\Session\Store::keep()
         */
        public static function keep($keys = null)
        {
        }

        /**
         * Merge new flash keys into the new flash array.
         *
         * @param array $keys
         * @return null
         * @see \Illuminate\Session\Store::mergeNewFlashes()
         */
        protected static function mergeNewFlashes(array $keys)
        {
        }

        /**
         * Remove the given keys from the old flash data.
         *
         * @param array $keys
         * @return null
         * @see \Illuminate\Session\Store::removeFromOldFlashData()
         */
        protected static function removeFromOldFlashData(array $keys)
        {
        }

        /**
         * Flash an input array to the session.
         *
         * @param array $value
         * @return null
         * @see \Illuminate\Session\Store::flashInput()
         */
        public static function flashInput(array $value)
        {
        }

        /**
         * Remove an item from the session, returning its value.
         *
         * @param string $key
         * @return mixed
         * @see \Illuminate\Session\Store::remove()
         */
        public static function remove($key)
        {
        }

        /**
         * Remove one or many items from the session.
         *
         * @param string|array $keys
         * @return null
         * @see \Illuminate\Session\Store::forget()
         */
        public static function forget($keys)
        {
        }

        /**
         * Remove all of the items from the session.
         *
         * @return null
         * @see \Illuminate\Session\Store::flush()
         */
        public static function flush()
        {
        }

        /**
         * Flush the session data and regenerate the ID.
         *
         * @return bool
         * @see \Illuminate\Session\Store::invalidate()
         */
        public static function invalidate()
        {
        }

        /**
         * Generate a new session identifier.
         *
         * @param bool $destroy
         * @return bool
         * @see \Illuminate\Session\Store::regenerate()
         */
        public static function regenerate($destroy = false)
        {
        }

        /**
         * Generate a new session ID for the session.
         *
         * @param bool $destroy
         * @return bool
         * @see \Illuminate\Session\Store::migrate()
         */
        public static function migrate($destroy = false)
        {
        }

        /**
         * Determine if the session has been started.
         *
         * @return bool
         * @see \Illuminate\Session\Store::isStarted()
         */
        public static function isStarted()
        {
        }

        /**
         * Get the name of the session.
         *
         * @return string
         * @see \Illuminate\Session\Store::getName()
         */
        public static function getName()
        {
        }

        /**
         * Set the name of the session.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Session\Store::setName()
         */
        public static function setName($name)
        {
        }

        /**
         * Get the current session ID.
         *
         * @return string
         * @see \Illuminate\Session\Store::getId()
         */
        public static function getId()
        {
        }

        /**
         * Set the session ID.
         *
         * @param string $id
         * @return null
         * @see \Illuminate\Session\Store::setId()
         */
        public static function setId($id)
        {
        }

        /**
         * Determine if this is a valid session ID.
         *
         * @param string $id
         * @return bool
         * @see \Illuminate\Session\Store::isValidId()
         */
        public static function isValidId($id)
        {
        }

        /**
         * Get a new, random session ID.
         *
         * @return string
         * @see \Illuminate\Session\Store::generateSessionId()
         */
        protected static function generateSessionId()
        {
        }

        /**
         * Set the existence of the session on the handler if applicable.
         *
         * @param bool $value
         * @return null
         * @see \Illuminate\Session\Store::setExists()
         */
        public static function setExists($value)
        {
        }

        /**
         * Get the CSRF token value.
         *
         * @return string
         * @see \Illuminate\Session\Store::token()
         */
        public static function token()
        {
        }

        /**
         * Regenerate the CSRF token value.
         *
         * @return null
         * @see \Illuminate\Session\Store::regenerateToken()
         */
        public static function regenerateToken()
        {
        }

        /**
         * Get the previous URL from the session.
         *
         * @return string|null
         * @see \Illuminate\Session\Store::previousUrl()
         */
        public static function previousUrl()
        {
        }

        /**
         * Set the "previous" URL in the session.
         *
         * @param string $url
         * @return null
         * @see \Illuminate\Session\Store::setPreviousUrl()
         */
        public static function setPreviousUrl($url)
        {
        }

        /**
         * Get the underlying session handler implementation.
         *
         * @return \SessionHandlerInterface
         * @see \Illuminate\Session\Store::getHandler()
         */
        public static function getHandler()
        {
        }

        /**
         * Determine if the session handler needs a request.
         *
         * @return bool
         * @see \Illuminate\Session\Store::handlerNeedsRequest()
         */
        public static function handlerNeedsRequest()
        {
        }

        /**
         * Set the request on the handler instance.
         *
         * @param \Illuminate\Http\Request $request
         * @return null
         * @see \Illuminate\Session\Store::setRequestOnHandler()
         */
        public static function setRequestOnHandler($request)
        {
        }

    }
}

namespace {
    class Session extends Illuminate\Support\Facades\Session
    {
    }
}