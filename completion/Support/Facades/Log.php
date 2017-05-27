<?php

namespace Illuminate\Support\Facades {

    use Monolog\Logger;
    use Illuminate\Contracts\Events\Dispatcher;
    use Closure;

    /**
     * @see Illuminate\Support\Facades\Log
     * @see Illuminate\Log\Writer
     */
    class Log
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
         * The Monolog logger instance.
         *
         * @var \Monolog\Logger
         */
        protected $monolog;

        /**
         * The event dispatcher instance.
         *
         * @var \Illuminate\Contracts\Events\Dispatcher
         */
        protected $dispatcher;

        /**
         * The Log levels.
         *
         * @var array
         */
        protected $levels;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Log::getFacadeAccessor()
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
         * Create a new log writer instance.
         *
         * @param \Monolog\Logger $monolog
         * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
         * 
         * @see \Illuminate\Log\Writer::__construct()
         */
        public function __construct(Logger $monolog, Dispatcher $dispatcher = null)
        {
        }

        /**
         * Log an emergency message to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::emergency()
         */
        public static function emergency($message, array $context = [])
        {
        }

        /**
         * Log an alert message to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::alert()
         */
        public static function alert($message, array $context = [])
        {
        }

        /**
         * Log a critical message to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::critical()
         */
        public static function critical($message, array $context = [])
        {
        }

        /**
         * Log an error message to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::error()
         */
        public static function error($message, array $context = [])
        {
        }

        /**
         * Log a warning message to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::warning()
         */
        public static function warning($message, array $context = [])
        {
        }

        /**
         * Log a notice to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::notice()
         */
        public static function notice($message, array $context = [])
        {
        }

        /**
         * Log an informational message to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::info()
         */
        public static function info($message, array $context = [])
        {
        }

        /**
         * Log a debug message to the logs.
         *
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::debug()
         */
        public static function debug($message, array $context = [])
        {
        }

        /**
         * Log a message to the logs.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::log()
         */
        public static function log($level, $message, array $context = [])
        {
        }

        /**
         * Dynamically pass log calls into the writer.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::write()
         */
        public static function write($level, $message, array $context = [])
        {
        }

        /**
         * Write a message to Monolog.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::writeLog()
         */
        protected static function writeLog($level, $message, $context)
        {
        }

        /**
         * Register a file log handler.
         *
         * @param string $path
         * @param string $level
         * @return null
         * @see \Illuminate\Log\Writer::useFiles()
         */
        public static function useFiles($path, $level = 'debug')
        {
        }

        /**
         * Register a daily file log handler.
         *
         * @param string $path
         * @param int $days
         * @param string $level
         * @return null
         * @see \Illuminate\Log\Writer::useDailyFiles()
         */
        public static function useDailyFiles($path, $days = 0, $level = 'debug')
        {
        }

        /**
         * Register a Syslog handler.
         *
         * @param string $name
         * @param string $level
         * @param mixed $facility
         * @return \Psr\Log\LoggerInterface
         * @see \Illuminate\Log\Writer::useSyslog()
         */
        public static function useSyslog($name = 'laravel', $level = 'debug', $facility = 8)
        {
        }

        /**
         * Register an error_log handler.
         *
         * @param string $level
         * @param int $messageType
         * @return null
         * @see \Illuminate\Log\Writer::useErrorLog()
         */
        public static function useErrorLog($level = 'debug', $messageType = 0)
        {
        }

        /**
         * Register a new callback handler for when a log event is triggered.
         *
         * @param \Closure $callback
         * @return null
         *
         * @throws \RuntimeException
         * @see \Illuminate\Log\Writer::listen()
         */
        public static function listen(Closure $callback)
        {
        }

        /**
         * Fires a log event.
         *
         * @param string $level
         * @param string $message
         * @param array $context
         * @return null
         * @see \Illuminate\Log\Writer::fireLogEvent()
         */
        protected static function fireLogEvent($level, $message, array $context = [])
        {
        }

        /**
         * Format the parameters for the logger.
         *
         * @param mixed $message
         * @return mixed
         * @see \Illuminate\Log\Writer::formatMessage()
         */
        protected static function formatMessage($message)
        {
        }

        /**
         * Parse the string level into a Monolog constant.
         *
         * @param string $level
         * @return int
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Log\Writer::parseLevel()
         */
        protected static function parseLevel($level)
        {
        }

        /**
         * Get the underlying Monolog instance.
         *
         * @return \Monolog\Logger
         * @see \Illuminate\Log\Writer::getMonolog()
         */
        public static function getMonolog()
        {
        }

        /**
         * Get a default Monolog formatter instance.
         *
         * @return \Monolog\Formatter\LineFormatter
         * @see \Illuminate\Log\Writer::getDefaultFormatter()
         */
        protected static function getDefaultFormatter()
        {
        }

        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher
         * @see \Illuminate\Log\Writer::getEventDispatcher()
         */
        public static function getEventDispatcher()
        {
        }

        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
         * @return null
         * @see \Illuminate\Log\Writer::setEventDispatcher()
         */
        public static function setEventDispatcher(Dispatcher $dispatcher)
        {
        }

    }
}

namespace {
    class Log extends Illuminate\Support\Facades\Log
    {
    }
}