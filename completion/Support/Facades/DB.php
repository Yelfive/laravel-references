<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Database\Connectors\ConnectionFactory;
    use Closure;
    use Illuminate\Database\Query\Grammars\Grammar;
    use Illuminate\Database\Query\Processors\Processor;
    use Illuminate\Contracts\Events\Dispatcher;

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

        /**
         * Set the query grammar to the default implementation.
         *
         * @return null
         * @see \Illuminate\Database\Connection::useDefaultQueryGrammar()
         */
        public static function useDefaultQueryGrammar()
        {
        }

        /**
         * Set the schema grammar to the default implementation.
         *
         * @return null
         * @see \Illuminate\Database\Connection::useDefaultSchemaGrammar()
         */
        public static function useDefaultSchemaGrammar()
        {
        }

        /**
         * Set the query post processor to the default implementation.
         *
         * @return null
         * @see \Illuminate\Database\Connection::useDefaultPostProcessor()
         */
        public static function useDefaultPostProcessor()
        {
        }

        /**
         * Get a schema builder instance for the connection.
         *
         * @return \Illuminate\Database\Schema\Builder
         * @see \Illuminate\Database\Connection::getSchemaBuilder()
         */
        public static function getSchemaBuilder()
        {
        }

        /**
         * Begin a fluent query against a database table.
         *
         * @param string $table
         * @return \Illuminate\Database\Query\Builder
         * @see \Illuminate\Database\Connection::table()
         */
        public static function table($table)
        {
        }

        /**
         * Get a new query builder instance.
         *
         * @return \Illuminate\Database\Query\Builder
         * @see \Illuminate\Database\Connection::query()
         */
        public static function query()
        {
        }

        /**
         * Run a select statement and return a single result.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return mixed
         * @see \Illuminate\Database\Connection::selectOne()
         */
        public static function selectOne($query, $bindings = [], $useReadPdo = true)
        {
        }

        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return array
         * @see \Illuminate\Database\Connection::selectFromWriteConnection()
         */
        public static function selectFromWriteConnection($query, $bindings = [])
        {
        }

        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return array
         * @see \Illuminate\Database\Connection::select()
         */
        public static function select($query, $bindings = [], $useReadPdo = true)
        {
        }

        /**
         * Run a select statement against the database and returns a generator.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return \Generator
         * @see \Illuminate\Database\Connection::cursor()
         */
        public static function cursor($query, $bindings = [], $useReadPdo = true)
        {
        }

        /**
         * Run an insert statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return bool
         * @see \Illuminate\Database\Connection::insert()
         */
        public static function insert($query, $bindings = [])
        {
        }

        /**
         * Run an update statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int
         * @see \Illuminate\Database\Connection::update()
         */
        public static function update($query, $bindings = [])
        {
        }

        /**
         * Run a delete statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int
         * @see \Illuminate\Database\Connection::delete()
         */
        public static function delete($query, $bindings = [])
        {
        }

        /**
         * Execute an SQL statement and return the boolean result.
         *
         * @param string $query
         * @param array $bindings
         * @return bool
         * @see \Illuminate\Database\Connection::statement()
         */
        public static function statement($query, $bindings = [])
        {
        }

        /**
         * Run an SQL statement and get the number of rows affected.
         *
         * @param string $query
         * @param array $bindings
         * @return int
         * @see \Illuminate\Database\Connection::affectingStatement()
         */
        public static function affectingStatement($query, $bindings = [])
        {
        }

        /**
         * Run a raw, unprepared query against the PDO connection.
         *
         * @param string $query
         * @return bool
         * @see \Illuminate\Database\Connection::unprepared()
         */
        public static function unprepared($query)
        {
        }

        /**
         * Execute the given callback in "dry run" mode.
         *
         * @param \Closure $callback
         * @return array
         * @see \Illuminate\Database\Connection::pretend()
         */
        public static function pretend(Closure $callback)
        {
        }

        /**
         * Bind values to their parameters in the given statement.
         *
         * @param \PDOStatement $statement
         * @param array $bindings
         * @return null
         * @see \Illuminate\Database\Connection::bindValues()
         */
        public static function bindValues($statement, $bindings)
        {
        }

        /**
         * Prepare the query bindings for execution.
         *
         * @param array $bindings
         * @return array
         * @see \Illuminate\Database\Connection::prepareBindings()
         */
        public static function prepareBindings(array $bindings)
        {
        }

        /**
         * Log a query in the connection's query log.
         *
         * @param string $query
         * @param array $bindings
         * @param float|null $time
         * @return null
         * @see \Illuminate\Database\Connection::logQuery()
         */
        public static function logQuery($query, $bindings, $time = null)
        {
        }

        /**
         * Register a database query listener with the connection.
         *
         * @param \Closure $callback
         * @return null
         * @see \Illuminate\Database\Connection::listen()
         */
        public static function listen(Closure $callback)
        {
        }

        /**
         * Get a new raw query expression.
         *
         * @param mixed $value
         * @return \Illuminate\Database\Query\Expression
         * @see \Illuminate\Database\Connection::raw()
         */
        public static function raw($value)
        {
        }

        /**
         * Is Doctrine available?
         *
         * @return bool
         * @see \Illuminate\Database\Connection::isDoctrineAvailable()
         */
        public static function isDoctrineAvailable()
        {
        }

        /**
         * Get a Doctrine Schema Column instance.
         *
         * @param string $table
         * @param string $column
         * @return \Doctrine\DBAL\Schema\Column
         * @see \Illuminate\Database\Connection::getDoctrineColumn()
         */
        public static function getDoctrineColumn($table, $column)
        {
        }

        /**
         * Get the Doctrine DBAL schema manager for the connection.
         *
         * @return \Doctrine\DBAL\Schema\AbstractSchemaManager
         * @see \Illuminate\Database\Connection::getDoctrineSchemaManager()
         */
        public static function getDoctrineSchemaManager()
        {
        }

        /**
         * Get the Doctrine DBAL database connection instance.
         *
         * @return \Doctrine\DBAL\Connection
         * @see \Illuminate\Database\Connection::getDoctrineConnection()
         */
        public static function getDoctrineConnection()
        {
        }

        /**
         * Get the current PDO connection.
         *
         * @return \PDO
         * @see \Illuminate\Database\Connection::getPdo()
         */
        public static function getPdo()
        {
        }

        /**
         * Get the current PDO connection used for reading.
         *
         * @return \PDO
         * @see \Illuminate\Database\Connection::getReadPdo()
         */
        public static function getReadPdo()
        {
        }

        /**
         * Set the PDO connection.
         *
         * @param \PDO|null $pdo
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\Connection::setPdo()
         */
        public static function setPdo($pdo)
        {
        }

        /**
         * Set the PDO connection used for reading.
         *
         * @param \PDO|null $pdo
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\Connection::setReadPdo()
         */
        public static function setReadPdo($pdo)
        {
        }

        /**
         * Set the reconnect instance on the connection.
         *
         * @param callable $reconnector
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\Connection::setReconnector()
         */
        public static function setReconnector(callable $reconnector)
        {
        }

        /**
         * Get the database connection name.
         *
         * @return string|null
         * @see \Illuminate\Database\Connection::getName()
         */
        public static function getName()
        {
        }

        /**
         * Get an option from the configuration options.
         *
         * @param string|null $option
         * @return mixed
         * @see \Illuminate\Database\Connection::getConfig()
         */
        public static function getConfig($option = null)
        {
        }

        /**
         * Get the PDO driver name.
         *
         * @return string
         * @see \Illuminate\Database\Connection::getDriverName()
         */
        public static function getDriverName()
        {
        }

        /**
         * Get the query grammar used by the connection.
         *
         * @return \Illuminate\Database\Query\Grammars\Grammar
         * @see \Illuminate\Database\Connection::getQueryGrammar()
         */
        public static function getQueryGrammar()
        {
        }

        /**
         * Set the query grammar used by the connection.
         *
         * @param \Illuminate\Database\Query\Grammars\Grammar $grammar
         * @return null
         * @see \Illuminate\Database\Connection::setQueryGrammar()
         */
        public static function setQueryGrammar(Grammar $grammar)
        {
        }

        /**
         * Get the schema grammar used by the connection.
         *
         * @return \Illuminate\Database\Schema\Grammars\Grammar
         * @see \Illuminate\Database\Connection::getSchemaGrammar()
         */
        public static function getSchemaGrammar()
        {
        }

        /**
         * Set the schema grammar used by the connection.
         *
         * @param \Illuminate\Database\Schema\Grammars\Grammar $grammar
         * @return null
         * @see \Illuminate\Database\Connection::setSchemaGrammar()
         */
        public static function setSchemaGrammar(\Illuminate\Database\Schema\Grammars\Grammar $grammar)
        {
        }

        /**
         * Get the query post processor used by the connection.
         *
         * @return \Illuminate\Database\Query\Processors\Processor
         * @see \Illuminate\Database\Connection::getPostProcessor()
         */
        public static function getPostProcessor()
        {
        }

        /**
         * Set the query post processor used by the connection.
         *
         * @param \Illuminate\Database\Query\Processors\Processor $processor
         * @return null
         * @see \Illuminate\Database\Connection::setPostProcessor()
         */
        public static function setPostProcessor(Processor $processor)
        {
        }

        /**
         * Get the event dispatcher used by the connection.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher
         * @see \Illuminate\Database\Connection::getEventDispatcher()
         */
        public static function getEventDispatcher()
        {
        }

        /**
         * Set the event dispatcher instance on the connection.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return null
         * @see \Illuminate\Database\Connection::setEventDispatcher()
         */
        public static function setEventDispatcher(Dispatcher $events)
        {
        }

        /**
         * Determine if the connection in a "dry run".
         *
         * @return bool
         * @see \Illuminate\Database\Connection::pretending()
         */
        public static function pretending()
        {
        }

        /**
         * Get the connection query log.
         *
         * @return array
         * @see \Illuminate\Database\Connection::getQueryLog()
         */
        public static function getQueryLog()
        {
        }

        /**
         * Clear the query log.
         *
         * @return null
         * @see \Illuminate\Database\Connection::flushQueryLog()
         */
        public static function flushQueryLog()
        {
        }

        /**
         * Enable the query log on the connection.
         *
         * @return null
         * @see \Illuminate\Database\Connection::enableQueryLog()
         */
        public static function enableQueryLog()
        {
        }

        /**
         * Disable the query log on the connection.
         *
         * @return null
         * @see \Illuminate\Database\Connection::disableQueryLog()
         */
        public static function disableQueryLog()
        {
        }

        /**
         * Determine whether we're logging queries.
         *
         * @return bool
         * @see \Illuminate\Database\Connection::logging()
         */
        public static function logging()
        {
        }

        /**
         * Get the name of the connected database.
         *
         * @return string
         * @see \Illuminate\Database\Connection::getDatabaseName()
         */
        public static function getDatabaseName()
        {
        }

        /**
         * Set the name of the connected database.
         *
         * @param string $database
         * @return string
         * @see \Illuminate\Database\Connection::setDatabaseName()
         */
        public static function setDatabaseName($database)
        {
        }

        /**
         * Get the table prefix for the connection.
         *
         * @return string
         * @see \Illuminate\Database\Connection::getTablePrefix()
         */
        public static function getTablePrefix()
        {
        }

        /**
         * Set the table prefix in use by the connection.
         *
         * @param string $prefix
         * @return null
         * @see \Illuminate\Database\Connection::setTablePrefix()
         */
        public static function setTablePrefix($prefix)
        {
        }

        /**
         * Set the table prefix and return the grammar.
         *
         * @param \Illuminate\Database\Grammar $grammar
         * @return \Illuminate\Database\Grammar
         * @see \Illuminate\Database\Connection::withTablePrefix()
         */
        public static function withTablePrefix(\Illuminate\Database\Grammar $grammar)
        {
        }

        /**
         * Register a connection resolver.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return null
         * @see \Illuminate\Database\Connection::resolverFor()
         */
        public static function resolverFor($driver, Closure $callback)
        {
        }

        /**
         * Get the connection resolver for the given driver.
         *
         * @param string $driver
         * @return mixed
         * @see \Illuminate\Database\Connection::getResolver()
         */
        public static function getResolver($driver)
        {
        }

        /**
         * Execute a Closure within a transaction.
         *
         * @param \Closure $callback
         * @param int $attempts
         * @return mixed
         *
         * @throws \Exception|\Throwable
         * @see \Illuminate\Database\Connection::transaction()
         */
        public static function transaction(Closure $callback, $attempts = 1)
        {
        }

        /**
         * Start a new database transaction.
         *
         * @return null
         * @throws \Exception
         * @see \Illuminate\Database\Connection::beginTransaction()
         */
        public static function beginTransaction()
        {
        }

        /**
         * Commit the active database transaction.
         *
         * @return null
         * @see \Illuminate\Database\Connection::commit()
         */
        public static function commit()
        {
        }

        /**
         * Rollback the active database transaction.
         *
         * @param int|null $toLevel
         * @return null
         * @see \Illuminate\Database\Connection::rollBack()
         */
        public static function rollBack($toLevel = null)
        {
        }

        /**
         * Get the number of active transactions.
         *
         * @return int
         * @see \Illuminate\Database\Connection::transactionLevel()
         */
        public static function transactionLevel()
        {
        }

    }
}

namespace {
    class DB extends Illuminate\Support\Facades\DB
    {
    }
}