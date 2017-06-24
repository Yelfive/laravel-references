<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\Container\Container;
    use Closure;

    /**
     * @see \Illuminate\Support\Facades\Bus
     * @see \Illuminate\Bus\Dispatcher
     */
    class Bus
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
         * The container implementation.
         *
         * @var \Illuminate\Contracts\Container\Container
         */
        protected $container;

        /**
         * The pipeline instance for the bus.
         *
         * @var \Illuminate\Pipeline\Pipeline
         */
        protected $pipeline;

        /**
         * The pipes to send commands through before dispatching.
         *
         * @var array
         */
        protected $pipes;

        /**
         * The command to handler mapping for non-self-handling events.
         *
         * @var array
         */
        protected $handlers;

        /**
         * The queue resolver callback.
         *
         * @var \Closure|null
         */
        protected $queueResolver;

        /**
         * Replace the bound instance with a fake.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Bus::fake()
         */
        public static function fake()
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
         * Create a new command dispatcher instance.
         *
         * @param \Illuminate\Contracts\Container\Container $container
         * @param \Closure|null $queueResolver
         * 
         * @see \Illuminate\Bus\Dispatcher::__construct()
         */
        public function __construct(Container $container, Closure $queueResolver = null)
        {
        }

        /**
         * Dispatch a command to its appropriate handler.
         *
         * @param mixed $command
         * @return mixed
         * @see \Illuminate\Bus\Dispatcher::dispatch()
         */
        public static function dispatch($command)
        {
        }

        /**
         * Dispatch a command to its appropriate handler in the current process.
         *
         * @param mixed $command
         * @param mixed $handler
         * @return mixed
         * @see \Illuminate\Bus\Dispatcher::dispatchNow()
         */
        public static function dispatchNow($command, $handler = null)
        {
        }

        /**
         * Determine if the given command has a handler.
         *
         * @param mixed $command
         * @return bool
         * @see \Illuminate\Bus\Dispatcher::hasCommandHandler()
         */
        public static function hasCommandHandler($command)
        {
        }

        /**
         * Retrieve the handler for a command.
         *
         * @param mixed $command
         * @return bool|mixed
         * @see \Illuminate\Bus\Dispatcher::getCommandHandler()
         */
        public static function getCommandHandler($command)
        {
        }

        /**
         * Dispatch a command to its appropriate handler behind a queue.
         *
         * @param mixed $command
         * @return mixed
         *
         * @throws \RuntimeException
         * @see \Illuminate\Bus\Dispatcher::dispatchToQueue()
         */
        public static function dispatchToQueue($command)
        {
        }

        /**
         * Set the pipes through which commands should be piped before dispatching.
         *
         * @param array $pipes
         * @return \Illuminate\Bus\Dispatcher
         * @see \Illuminate\Bus\Dispatcher::pipeThrough()
         */
        public static function pipeThrough(array $pipes)
        {
        }

        /**
         * Map a command to a handler.
         *
         * @param array $map
         * @return \Illuminate\Bus\Dispatcher
         * @see \Illuminate\Bus\Dispatcher::map()
         */
        public static function map(array $map)
        {
        }

    }
}

namespace {
    class Bus extends Illuminate\Support\Facades\Bus
    {
    }
}