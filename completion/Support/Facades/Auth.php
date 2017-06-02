<?php

namespace Illuminate\Support\Facades {

    use Closure;

    /**
     * @see Illuminate\Support\Facades\Auth
     * @see Illuminate\Auth\AuthManager
     */
    class Auth
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
        protected $guards;

        /**
         * The user resolver shared by various services.
         *
         * Determines the default user for Gate, Request, and the Authenticatable contract.
         *
         * @var \Closure
         */
        protected $userResolver;

        /**
         * The registered custom provider creators.
         *
         * @var array
         */
        protected $customProviderCreators;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Auth::getFacadeAccessor()
         */
        protected static function getFacadeAccessor()
        {
        }

        /**
         * Register the typical authentication routes for an application.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Auth::routes()
         */
        public static function routes()
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
         * Create a new Auth manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * 
         * @see \Illuminate\Auth\AuthManager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Attempt to get the guard from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
         * @see \Illuminate\Auth\AuthManager::guard()
         */
        public static function guard($name = null)
        {
        }

        /**
         * Resolve the given guard.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Auth\AuthManager::resolve()
         */
        protected static function resolve($name)
        {
        }

        /**
         * Call a custom driver creator.
         *
         * @param string $name
         * @param array $config
         * @return mixed
         * @see \Illuminate\Auth\AuthManager::callCustomCreator()
         */
        protected static function callCustomCreator($name, array $config)
        {
        }

        /**
         * Create a session based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\SessionGuard
         * @see \Illuminate\Auth\AuthManager::createSessionDriver()
         */
        public static function createSessionDriver($name, $config)
        {
        }

        /**
         * Create a token based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\TokenGuard
         * @see \Illuminate\Auth\AuthManager::createTokenDriver()
         */
        public static function createTokenDriver($name, $config)
        {
        }

        /**
         * Get the guard configuration.
         *
         * @param string $name
         * @return array
         * @see \Illuminate\Auth\AuthManager::getConfig()
         */
        protected static function getConfig($name)
        {
        }

        /**
         * Get the default authentication driver name.
         *
         * @return string
         * @see \Illuminate\Auth\AuthManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Set the default guard driver the factory should serve.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Auth\AuthManager::shouldUse()
         */
        public static function shouldUse($name)
        {
        }

        /**
         * Set the default authentication driver name.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Auth\AuthManager::setDefaultDriver()
         */
        public static function setDefaultDriver($name)
        {
        }

        /**
         * Register a new callback based request guard.
         *
         * @param string $driver
         * @param callable $callback
         * @return \Illuminate\Auth\AuthManager
         * @see \Illuminate\Auth\AuthManager::viaRequest()
         */
        public static function viaRequest($driver, callable $callback)
        {
        }

        /**
         * Get the user resolver callback.
         *
         * @return \Closure
         * @see \Illuminate\Auth\AuthManager::userResolver()
         */
        public static function userResolver()
        {
        }

        /**
         * Set the callback to be used to resolve users.
         *
         * @param \Closure $userResolver
         * @return \Illuminate\Auth\AuthManager
         * @see \Illuminate\Auth\AuthManager::resolveUsersUsing()
         */
        public static function resolveUsersUsing(Closure $userResolver)
        {
        }

        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Auth\AuthManager
         * @see \Illuminate\Auth\AuthManager::extend()
         */
        public static function extend($driver, Closure $callback)
        {
        }

        /**
         * Register a custom provider creator Closure.
         *
         * @param string $name
         * @param \Closure $callback
         * @return \Illuminate\Auth\AuthManager
         * @see \Illuminate\Auth\AuthManager::provider()
         */
        public static function provider($name, Closure $callback)
        {
        }

        /**
         * Create the user provider implementation for the driver.
         *
         * @param string $provider
         * @return \Illuminate\Contracts\Auth\UserProvider
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Auth\AuthManager::createUserProvider()
         */
        public static function createUserProvider($provider)
        {
        }

        /**
         * Create an instance of the database user provider.
         *
         * @param array $config
         * @return \Illuminate\Auth\DatabaseUserProvider
         * @see \Illuminate\Auth\AuthManager::createDatabaseProvider()
         */
        protected static function createDatabaseProvider($config)
        {
        }

        /**
         * Create an instance of the Eloquent user provider.
         *
         * @param array $config
         * @return \Illuminate\Auth\EloquentUserProvider
         * @see \Illuminate\Auth\AuthManager::createEloquentProvider()
         */
        protected static function createEloquentProvider($config)
        {
        }

    }
}

namespace {
    class Auth extends Illuminate\Support\Facades\Auth
    {
    }
}