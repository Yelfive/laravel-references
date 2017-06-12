<?php

namespace Illuminate\Support\Facades {

    use Closure;

    /**
     * @see Illuminate\Support\Facades\Broadcast
     * @see Illuminate\Broadcasting\BroadcastManager
     */
    class Broadcast
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
         * The array of resolved broadcast drivers.
         *
         * @var array
         */
        protected $drivers;

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
         * Create a new manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * 
         * @see \Illuminate\Broadcasting\BroadcastManager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Register the routes for handling broadcast authentication and sockets.
         *
         * @param array|null $attributes
         * @return null
         * @see \Illuminate\Broadcasting\BroadcastManager::routes()
         */
        public static function routes(array $attributes = null)
        {
        }

        /**
         * Get the socket ID for the given request.
         *
         * @param \Illuminate\Http\Request|null $request
         * @return string|null
         * @see \Illuminate\Broadcasting\BroadcastManager::socket()
         */
        public static function socket($request = null)
        {
        }

        /**
         * Begin broadcasting an event.
         *
         * @param mixed|null $event
         * @return \Illuminate\Broadcasting\PendingBroadcast|void
         * @see \Illuminate\Broadcasting\BroadcastManager::event()
         */
        public static function event($event = null)
        {
        }

        /**
         * Queue the given event for broadcast.
         *
         * @param mixed $event
         * @return null
         * @see \Illuminate\Broadcasting\BroadcastManager::queue()
         */
        public static function queue($event)
        {
        }

        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed
         * @see \Illuminate\Broadcasting\BroadcastManager::connection()
         */
        public static function connection($driver = null)
        {
        }

        /**
         * Get a driver instance.
         *
         * @param string $name
         * @return mixed
         * @see \Illuminate\Broadcasting\BroadcastManager::driver()
         */
        public static function driver($name = null)
        {
        }

        /**
         * Get the default driver name.
         *
         * @return string
         * @see \Illuminate\Broadcasting\BroadcastManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Set the default driver name.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Broadcasting\BroadcastManager::setDefaultDriver()
         */
        public static function setDefaultDriver($name)
        {
        }

        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Broadcasting\BroadcastManager
         * @see \Illuminate\Broadcasting\BroadcastManager::extend()
         */
        public static function extend($driver, Closure $callback)
        {
        }

    }
}

namespace {
    class Broadcast extends Illuminate\Support\Facades\Broadcast
    {
    }
}