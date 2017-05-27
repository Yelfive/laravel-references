<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Database\Connectors\ConnectionFactory;
    use Illuminate\Database\Connection;

    /**
     * @see Illuminate\Support\Facades\DB
     * @see Illuminate\Database\DatabaseManager
     */
    class DB
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
         * The database connection factory instance.
         *
         * @var \Illuminate\Database\Connectors\ConnectionFactory
         */
        protected $factory;

        /**
         * The active connection instances.
         *
         * @var array
         */
        protected $connections;

        /**
         * The custom connection resolvers.
         *
         * @var array
         */
        protected $extensions;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\DB::getFacadeAccessor()
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
         * Create a new database manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * @param \Illuminate\Database\Connectors\ConnectionFactory $factory
         * 
         * @see \Illuminate\Database\DatabaseManager::__construct()
         */
        public function __construct($app, ConnectionFactory $factory)
        {
        }

        /**
         * Get a database connection instance.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\DatabaseManager::connection()
         */
        public static function connection($name = null)
        {
        }

        /**
         * Parse the connection into an array of the name and read / write type.
         *
         * @param string $name
         * @return array
         * @see \Illuminate\Database\DatabaseManager::parseConnectionName()
         */
        protected static function parseConnectionName($name)
        {
        }

        /**
         * Make the database connection instance.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\DatabaseManager::makeConnection()
         */
        protected static function makeConnection($name)
        {
        }

        /**
         * Get the configuration for a connection.
         *
         * @param string $name
         * @return array
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Database\DatabaseManager::configuration()
         */
        protected static function configuration($name)
        {
        }

        /**
         * Prepare the database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @param string $type
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\DatabaseManager::configure()
         */
        protected static function configure(Connection $connection, $type)
        {
        }

        /**
         * Prepare the read / write mode for database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @param string $type
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\DatabaseManager::setPdoForType()
         */
        protected static function setPdoForType(Connection $connection, $type = null)
        {
        }

        /**
         * Disconnect from the given database and remove from local cache.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Database\DatabaseManager::purge()
         */
        public static function purge($name = null)
        {
        }

        /**
         * Disconnect from the given database.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Database\DatabaseManager::disconnect()
         */
        public static function disconnect($name = null)
        {
        }

        /**
         * Reconnect to the given database.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\DatabaseManager::reconnect()
         */
        public static function reconnect($name = null)
        {
        }

        /**
         * Refresh the PDO connections on a given connection.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\DatabaseManager::refreshPdoConnections()
         */
        protected static function refreshPdoConnections($name)
        {
        }

        /**
         * Get the default connection name.
         *
         * @return string
         * @see \Illuminate\Database\DatabaseManager::getDefaultConnection()
         */
        public static function getDefaultConnection()
        {
        }

        /**
         * Set the default connection name.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Database\DatabaseManager::setDefaultConnection()
         */
        public static function setDefaultConnection($name)
        {
        }

        /**
         * Get all of the support drivers.
         *
         * @return array
         * @see \Illuminate\Database\DatabaseManager::supportedDrivers()
         */
        public static function supportedDrivers()
        {
        }

        /**
         * Get all of the drivers that are actually available.
         *
         * @return array
         * @see \Illuminate\Database\DatabaseManager::availableDrivers()
         */
        public static function availableDrivers()
        {
        }

        /**
         * Register an extension connection resolver.
         *
         * @param string $name
         * @param callable $resolver
         * @return null
         * @see \Illuminate\Database\DatabaseManager::extend()
         */
        public static function extend($name, callable $resolver)
        {
        }

        /**
         * Return all of the created connections.
         *
         * @return array
         * @see \Illuminate\Database\DatabaseManager::getConnections()
         */
        public static function getConnections()
        {
        }

    }
}

namespace {
    class DB extends Illuminate\Support\Facades\DB
    {
    }
}