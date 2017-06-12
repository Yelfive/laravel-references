<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\Container\Container;

    /**
     * @see Illuminate\Support\Facades\Event
     * @see Illuminate\Events\Dispatcher
     */
    class Event
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
         * The IoC container instance.
         *
         * @var \Illuminate\Contracts\Container\Container
         */
        protected $container;

        /**
         * The registered event listeners.
         *
         * @var array
         */
        protected $listeners;

        /**
         * The wildcard listeners.
         *
         * @var array
         */
        protected $wildcards;

        /**
         * The queue resolver instance.
         *
         * @var callable
         */
        protected $queueResolver;

        /**
         * Replace the bound instance with a fake.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Event::fake()
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
         * Create a new event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Container\Container|null $container
         * 
         * @see \Illuminate\Events\Dispatcher::__construct()
         */
        public function __construct(Container $container = null)
        {
        }

        /**
         * Register an event listener with the dispatcher.
         *
         * @param string|array $events
         * @param mixed $listener
         * @return null
         * @see \Illuminate\Events\Dispatcher::listen()
         */
        public static function listen($events, $listener)
        {
        }

        /**
         * Determine if a given event has listeners.
         *
         * @param string $eventName
         * @return bool
         * @see \Illuminate\Events\Dispatcher::hasListeners()
         */
        public static function hasListeners($eventName)
        {
        }

        /**
         * Register an event and payload to be fired later.
         *
         * @param string $event
         * @param array $payload
         * @return null
         * @see \Illuminate\Events\Dispatcher::push()
         */
        public static function push($event, $payload = [])
        {
        }

        /**
         * Flush a set of pushed events.
         *
         * @param string $event
         * @return null
         * @see \Illuminate\Events\Dispatcher::flush()
         */
        public static function flush($event)
        {
        }

        /**
         * Register an event subscriber with the dispatcher.
         *
         * @param object|string $subscriber
         * @return null
         * @see \Illuminate\Events\Dispatcher::subscribe()
         */
        public static function subscribe($subscriber)
        {
        }

        /**
         * Fire an event until the first non-null response is returned.
         *
         * @param string|object $event
         * @param mixed $payload
         * @return array|null
         * @see \Illuminate\Events\Dispatcher::until()
         */
        public static function until($event, $payload = [])
        {
        }

        /**
         * Fire an event and call the listeners.
         *
         * @param string|object $event
         * @param mixed $payload
         * @param bool $halt
         * @return array|null
         * @see \Illuminate\Events\Dispatcher::fire()
         */
        public static function fire($event, $payload = [], $halt = false)
        {
        }

        /**
         * Fire an event and call the listeners.
         *
         * @param string|object $event
         * @param mixed $payload
         * @param bool $halt
         * @return array|null
         * @see \Illuminate\Events\Dispatcher::dispatch()
         */
        public static function dispatch($event, $payload = [], $halt = false)
        {
        }

        /**
         * Get all of the listeners for a given event name.
         *
         * @param string $eventName
         * @return array
         * @see \Illuminate\Events\Dispatcher::getListeners()
         */
        public static function getListeners($eventName)
        {
        }

        /**
         * Register an event listener with the dispatcher.
         *
         * @param string|\Closure $listener
         * @param bool $wildcard
         * @return mixed
         * @see \Illuminate\Events\Dispatcher::makeListener()
         */
        public static function makeListener($listener, $wildcard = false)
        {
        }

        /**
         * Create a class based listener using the IoC container.
         *
         * @param string $listener
         * @param bool $wildcard
         * @return \Closure
         * @see \Illuminate\Events\Dispatcher::createClassListener()
         */
        public static function createClassListener($listener, $wildcard = false)
        {
        }

        /**
         * Remove a set of listeners from the dispatcher.
         *
         * @param string $event
         * @return null
         * @see \Illuminate\Events\Dispatcher::forget()
         */
        public static function forget($event)
        {
        }

        /**
         * Forget all of the pushed listeners.
         *
         * @return null
         * @see \Illuminate\Events\Dispatcher::forgetPushed()
         */
        public static function forgetPushed()
        {
        }

        /**
         * Set the queue resolver implementation.
         *
         * @param callable $resolver
         * @return \Illuminate\Events\Dispatcher
         * @see \Illuminate\Events\Dispatcher::setQueueResolver()
         */
        public static function setQueueResolver(callable $resolver)
        {
        }

    }
}

namespace {
    class Event extends Illuminate\Support\Facades\Event
    {
    }
}