<?php

namespace Illuminate\Support\Facades {



    /**
     * @see \Illuminate\Support\Facades\Password
     * @see \Illuminate\Auth\Passwords\PasswordBrokerManager
     */
    class Password
    {
        const RESET_LINK_SENT = 'passwords.sent';

        const PASSWORD_RESET = 'passwords.reset';

        const INVALID_USER = 'passwords.user';

        const INVALID_PASSWORD = 'passwords.password';

        const INVALID_TOKEN = 'passwords.token';

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
         * The array of created "drivers".
         *
         * @var array
         */
        protected $brokers;

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
         * Create a new PasswordBroker manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * 
         * @see \Illuminate\Auth\Passwords\PasswordBrokerManager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Attempt to get the broker from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Auth\PasswordBroker
         * @see \Illuminate\Auth\Passwords\PasswordBrokerManager::broker()
         */
        public static function broker($name = null)
        {
        }

        /**
         * Get the default password broker name.
         *
         * @return string
         * @see \Illuminate\Auth\Passwords\PasswordBrokerManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Set the default password broker name.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Auth\Passwords\PasswordBrokerManager::setDefaultDriver()
         */
        public static function setDefaultDriver($name)
        {
        }

    }
}

namespace {
    class Password extends Illuminate\Support\Facades\Password
    {
    }
}