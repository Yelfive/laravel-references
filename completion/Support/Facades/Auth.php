<?php

namespace Illuminate\Support\Facades {

    use Closure;
    use Illuminate\Contracts\Auth\Authenticatable;

    /**
     * @see \Illuminate\Support\Facades\Auth
     * @see \Illuminate\Auth\AuthManager
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
         * Determine if the current user is authenticated.
         *
         * @return bool
         * @see \Illuminate\Contracts\Auth\Guard::check()
         */
        public static function check()
        {
        }

        /**
         * Determine if the current user is a guest.
         *
         * @return bool
         * @see \Illuminate\Contracts\Auth\Guard::guest()
         */
        public static function guest()
        {
        }

        /**
         * Get the currently authenticated user.
         *
         * @return \Illuminate\Contracts\Auth\Authenticatable|null
         * @see \Illuminate\Contracts\Auth\Guard::user()
         */
        public static function user()
        {
        }

        /**
         * Get the ID for the currently authenticated user.
         *
         * @return int|null
         * @see \Illuminate\Contracts\Auth\Guard::id()
         */
        public static function id()
        {
        }

        /**
         * Validate a user's credentials.
         *
         * @param array $credentials
         * @return bool
         * @see \Illuminate\Contracts\Auth\Guard::validate()
         */
        public static function validate(array $credentials = [])
        {
        }

        /**
         * Set the current user.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @return null
         * @see \Illuminate\Contracts\Auth\Guard::setUser()
         */
        public static function setUser(Authenticatable $user)
        {
        }

        /**
         * Attempt to authenticate a user using the given credentials.
         *
         * @param array $credentials
         * @param bool $remember
         * @return bool
         * @see \Illuminate\Contracts\Auth\StatefulGuard::attempt()
         */
        public static function attempt(array $credentials = [], $remember = false)
        {
        }

        /**
         * Log a user into the application without sessions or cookies.
         *
         * @param array $credentials
         * @return bool
         * @see \Illuminate\Contracts\Auth\StatefulGuard::once()
         */
        public static function once(array $credentials = [])
        {
        }

        /**
         * Log a user into the application.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param bool $remember
         * @return null
         * @see \Illuminate\Contracts\Auth\StatefulGuard::login()
         */
        public static function login(Authenticatable $user, $remember = false)
        {
        }

        /**
         * Log the given user ID into the application.
         *
         * @param mixed $id
         * @param bool $remember
         * @return \Illuminate\Contracts\Auth\Authenticatable
         * @see \Illuminate\Contracts\Auth\StatefulGuard::loginUsingId()
         */
        public static function loginUsingId($id, $remember = false)
        {
        }

        /**
         * Log the given user ID into the application without sessions or cookies.
         *
         * @param mixed $id
         * @return bool
         * @see \Illuminate\Contracts\Auth\StatefulGuard::onceUsingId()
         */
        public static function onceUsingId($id)
        {
        }

        /**
         * Determine if the user was authenticated via "remember me" cookie.
         *
         * @return bool
         * @see \Illuminate\Contracts\Auth\StatefulGuard::viaRemember()
         */
        public static function viaRemember()
        {
        }

        /**
         * Log the user out of the application.
         *
         * @return null
         * @see \Illuminate\Contracts\Auth\StatefulGuard::logout()
         */
        public static function logout()
        {
        }

    }
}

namespace {
    class Auth extends Illuminate\Support\Facades\Auth
    {
    }
}