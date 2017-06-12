<?php

namespace Illuminate\Support\Facades {



    /**
     * @see Illuminate\Support\Facades\Redis
     * @see Illuminate\Redis\RedisManager
     */
    class Redis
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
         * The name of the default driver.
         *
         * @var string
         */
        protected $driver;

        /**
         * The Redis server configurations.
         *
         * @var array
         */
        protected $config;

        /**
         * The Redis connections.
         *
         * @var mixed
         */
        protected $connections;

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
         * Create a new Redis manager instance.
         *
         * @param string $driver
         * @param array $config
         * @see \Illuminate\Redis\RedisManager::__construct()
         */
        public function __construct($driver, array $config)
        {
        }

        /**
         * Get a Redis connection by name.
         *
         * @param string|null $name
         * @return \Illuminate\Redis\Connections\Connection
         * @see \Illuminate\Redis\RedisManager::connection()
         */
        public static function connection($name = null)
        {
        }

    }
}

namespace {
    class Redis extends Illuminate\Support\Facades\Redis
    {
    }
}