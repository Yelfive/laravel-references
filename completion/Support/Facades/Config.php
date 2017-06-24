<?php

namespace Illuminate\Support\Facades {



    /**
     * @see \Illuminate\Support\Facades\Config
     * @see \Illuminate\Config\Repository
     */
    class Config
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
         * All of the configuration items.
         *
         * @var array
         */
        protected $items;

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
         * Create a new configuration repository.
         *
         * @param array $items
         * 
         * @see \Illuminate\Config\Repository::__construct()
         */
        public function __construct(array $items = [])
        {
        }

        /**
         * Determine if the given configuration value exists.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Config\Repository::has()
         */
        public static function has($key)
        {
        }

        /**
         * Get the specified configuration value.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\Config\Repository::get()
         */
        public static function get($key, $default = null)
        {
        }

        /**
         * Set a given configuration value.
         *
         * @param array|string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Config\Repository::set()
         */
        public static function set($key, $value = null)
        {
        }

        /**
         * Prepend a value onto an array configuration value.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Config\Repository::prepend()
         */
        public static function prepend($key, $value)
        {
        }

        /**
         * Push a value onto an array configuration value.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Config\Repository::push()
         */
        public static function push($key, $value)
        {
        }

        /**
         * Get all of the configuration items for the application.
         *
         * @return array
         * @see \Illuminate\Config\Repository::all()
         */
        public static function all()
        {
        }

        /**
         * Determine if the given configuration option exists.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Config\Repository::offsetExists()
         */
        public static function offsetExists($key)
        {
        }

        /**
         * Get a configuration option.
         *
         * @param string $key
         * @return mixed
         * @see \Illuminate\Config\Repository::offsetGet()
         */
        public static function offsetGet($key)
        {
        }

        /**
         * Set a configuration option.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Config\Repository::offsetSet()
         */
        public static function offsetSet($key, $value)
        {
        }

        /**
         * Unset a configuration option.
         *
         * @param string $key
         * @return null
         * @see \Illuminate\Config\Repository::offsetUnset()
         */
        public static function offsetUnset($key)
        {
        }

    }
}

namespace {
    class Config extends Illuminate\Support\Facades\Config
    {
    }
}