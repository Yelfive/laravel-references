<?php

namespace Illuminate\Support\Facades {

    use Closure;

    /**
     * @see Illuminate\Support\Facades\Queue
     * @see Illuminate\Queue\QueueManager
     */
    class Queue
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
         * The array of resolved queue connections.
         *
         * @var array
         */
        protected $connections;

        /**
         * The array of resolved queue connectors.
         *
         * @var array
         */
        protected $connectors;

        /**
         * Replace the bound instance with a fake.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Queue::fake()
         */
        public static function fake()
        {
        }

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Queue::getFacadeAccessor()
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
         * Create a new queue manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * 
         * @see \Illuminate\Queue\QueueManager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Register an event listener for the before job event.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Queue\QueueManager::before()
         */
        public static function before($callback)
        {
        }

        /**
         * Register an event listener for the after job event.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Queue\QueueManager::after()
         */
        public static function after($callback)
        {
        }

        /**
         * Register an event listener for the exception occurred job event.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Queue\QueueManager::exceptionOccurred()
         */
        public static function exceptionOccurred($callback)
        {
        }

        /**
         * Register an event listener for the daemon queue loop.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Queue\QueueManager::looping()
         */
        public static function looping($callback)
        {
        }

        /**
         * Register an event listener for the failed job event.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Queue\QueueManager::failing()
         */
        public static function failing($callback)
        {
        }

        /**
         * Register an event listener for the daemon queue stopping.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Queue\QueueManager::stopping()
         */
        public static function stopping($callback)
        {
        }

        /**
         * Determine if the driver is connected.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Queue\QueueManager::connected()
         */
        public static function connected($name = null)
        {
        }

        /**
         * Resolve a queue connection instance.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Queue\Queue
         * @see \Illuminate\Queue\QueueManager::connection()
         */
        public static function connection($name = null)
        {
        }

        /**
         * Resolve a queue connection.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Queue\Queue
         * @see \Illuminate\Queue\QueueManager::resolve()
         */
        protected static function resolve($name)
        {
        }

        /**
         * Get the connector for a given driver.
         *
         * @param string $driver
         * @return \Illuminate\Queue\Connectors\ConnectorInterface
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Queue\QueueManager::getConnector()
         */
        protected static function getConnector($driver)
        {
        }

        /**
         * Add a queue connection resolver.
         *
         * @param string $driver
         * @param \Closure $resolver
         * @return null
         * @see \Illuminate\Queue\QueueManager::extend()
         */
        public static function extend($driver, Closure $resolver)
        {
        }

        /**
         * Add a queue connection resolver.
         *
         * @param string $driver
         * @param \Closure $resolver
         * @return null
         * @see \Illuminate\Queue\QueueManager::addConnector()
         */
        public static function addConnector($driver, Closure $resolver)
        {
        }

        /**
         * Get the queue connection configuration.
         *
         * @param string $name
         * @return array
         * @see \Illuminate\Queue\QueueManager::getConfig()
         */
        protected static function getConfig($name)
        {
        }

        /**
         * Get the name of the default queue connection.
         *
         * @return string
         * @see \Illuminate\Queue\QueueManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Set the name of the default queue connection.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Queue\QueueManager::setDefaultDriver()
         */
        public static function setDefaultDriver($name)
        {
        }

        /**
         * Get the full name for the given connection.
         *
         * @param string $connection
         * @return string
         * @see \Illuminate\Queue\QueueManager::getName()
         */
        public static function getName($connection = null)
        {
        }

        /**
         * Determine if the application is in maintenance mode.
         *
         * @return bool
         * @see \Illuminate\Queue\QueueManager::isDownForMaintenance()
         */
        public static function isDownForMaintenance()
        {
        }

    }
}

namespace {
    class Queue extends Illuminate\Support\Facades\Queue
    {
    }
}