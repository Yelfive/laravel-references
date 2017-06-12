<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Database\Connection;
    use Closure;

    /**
     * @see Illuminate\Support\Facades\Schema
     * @see Illuminate\Database\Schema\MySqlBuilder
     */
    class Schema
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
         * The database connection instance.
         *
         * @var \Illuminate\Database\Connection
         */
        protected $connection;

        /**
         * The schema grammar instance.
         *
         * @var \Illuminate\Database\Schema\Grammars\Grammar
         */
        protected $grammar;

        /**
         * The Blueprint resolver callback.
         *
         * @var \Closure
         */
        protected $resolver;

        /**
         * The default string length for migrations.
         *
         * @var int
         */
        public static $defaultStringLength;

        /**
         * Get a schema builder instance for a connection.
         *
         * @param string $name
         * @return \Illuminate\Database\Schema\Builder
         * @see \Illuminate\Support\Facades\Schema::connection()
         */
        public static function connection($name)
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
         * Determine if the given table exists.
         *
         * @param string $table
         * @return bool
         * @see \Illuminate\Database\Schema\MySqlBuilder::hasTable()
         */
        public static function hasTable($table)
        {
        }

        /**
         * Get the column listing for a given table.
         *
         * @param string $table
         * @return array
         * @see \Illuminate\Database\Schema\MySqlBuilder::getColumnListing()
         */
        public static function getColumnListing($table)
        {
        }

        /**
         * Create a new database Schema manager.
         *
         * @param \Illuminate\Database\Connection $connection
         * 
         * @see \Illuminate\Database\Schema\Builder::__construct()
         */
        public function __construct(Connection $connection)
        {
        }

        /**
         * Set the default string length for migrations.
         *
         * @param int $length
         * @return null
         * @see \Illuminate\Database\Schema\Builder::defaultStringLength()
         */
        public static function defaultStringLength($length)
        {
        }

        /**
         * Determine if the given table has a given column.
         *
         * @param string $table
         * @param string $column
         * @return bool
         * @see \Illuminate\Database\Schema\Builder::hasColumn()
         */
        public static function hasColumn($table, $column)
        {
        }

        /**
         * Determine if the given table has given columns.
         *
         * @param string $table
         * @param array $columns
         * @return bool
         * @see \Illuminate\Database\Schema\Builder::hasColumns()
         */
        public static function hasColumns($table, array $columns)
        {
        }

        /**
         * Get the data type for the given column name.
         *
         * @param string $table
         * @param string $column
         * @return string
         * @see \Illuminate\Database\Schema\Builder::getColumnType()
         */
        public static function getColumnType($table, $column)
        {
        }

        /**
         * Modify a table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return null
         * @see \Illuminate\Database\Schema\Builder::table()
         */
        public static function table($table, Closure $callback)
        {
        }

        /**
         * Create a new table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return null
         * @see \Illuminate\Database\Schema\Builder::create()
         */
        public static function create($table, Closure $callback)
        {
        }

        /**
         * Drop a table from the schema.
         *
         * @param string $table
         * @return null
         * @see \Illuminate\Database\Schema\Builder::drop()
         */
        public static function drop($table)
        {
        }

        /**
         * Drop a table from the schema if it exists.
         *
         * @param string $table
         * @return null
         * @see \Illuminate\Database\Schema\Builder::dropIfExists()
         */
        public static function dropIfExists($table)
        {
        }

        /**
         * Rename a table on the schema.
         *
         * @param string $from
         * @param string $to
         * @return null
         * @see \Illuminate\Database\Schema\Builder::rename()
         */
        public static function rename($from, $to)
        {
        }

        /**
         * Enable foreign key constraints.
         *
         * @return bool
         * @see \Illuminate\Database\Schema\Builder::enableForeignKeyConstraints()
         */
        public static function enableForeignKeyConstraints()
        {
        }

        /**
         * Disable foreign key constraints.
         *
         * @return bool
         * @see \Illuminate\Database\Schema\Builder::disableForeignKeyConstraints()
         */
        public static function disableForeignKeyConstraints()
        {
        }

        /**
         * Get the database connection instance.
         *
         * @return \Illuminate\Database\Connection
         * @see \Illuminate\Database\Schema\Builder::getConnection()
         */
        public static function getConnection()
        {
        }

        /**
         * Set the database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @return \Illuminate\Database\Schema\Builder
         * @see \Illuminate\Database\Schema\Builder::setConnection()
         */
        public static function setConnection(Connection $connection)
        {
        }

        /**
         * Set the Schema Blueprint resolver callback.
         *
         * @param \Closure $resolver
         * @return null
         * @see \Illuminate\Database\Schema\Builder::blueprintResolver()
         */
        public static function blueprintResolver(Closure $resolver)
        {
        }

    }
}

namespace {
    class Schema extends Illuminate\Support\Facades\Schema
    {
    }
}