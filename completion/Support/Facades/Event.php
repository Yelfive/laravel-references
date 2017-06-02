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
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Event::getFacadeAccessor()
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
         * Setup a wildcard listener callback.
         *
         * @param string $event
         * @param mixed $listener
         * @return null
         * @see \Illuminate\Events\Dispatcher::setupWildcardListen()
         */
        protected static function setupWildcardListen($event, $listener)
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
         * Resolve the subscriber instance.
         *
         * @param object|string $subscriber
         * @return mixed
         * @see \Illuminate\Events\Dispatcher::resolveSubscriber()
         */
        protected static function resolveSubscriber($subscriber)
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
         * Parse the given event and payload and prepare them for dispatching.
         *
         * @param mixed $event
         * @param mixed $payload
         * @return array
         * @see \Illuminate\Events\Dispatcher::parseEventAndPayload()
         */
        protected static function parseEventAndPayload($event, $payload)
        {
        }

        /**
         * Determine if the payload has a broadcastable event.
         *
         * @param array $payload
         * @return bool
         * @see \Illuminate\Events\Dispatcher::shouldBroadcast()
         */
        protected static function shouldBroadcast(array $payload)
        {
        }

        /**
         * Broadcast the given event class.
         *
         * @param \Illuminate\Contracts\Broadcasting\ShouldBroadcast $event
         * @return null
         * @see \Illuminate\Events\Dispatcher::broadcastEvent()
         */
        protected static function broadcastEvent($event)
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
         * Get the wildcard listeners for the event.
         *
         * @param string $eventName
         * @return array
         * @see \Illuminate\Events\Dispatcher::getWildcardListeners()
         */
        protected static function getWildcardListeners($eventName)
        {
        }

        /**
         * Add the listeners for the event's interfaces to the given array.
         *
         * @param string $eventName
         * @param array $listeners
         * @return array
         * @see \Illuminate\Events\Dispatcher::addInterfaceListeners()
         */
        protected static function addInterfaceListeners($eventName, array $listeners = [])
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
         * Create the class based event callable.
         *
         * @param string $listener
         * @return callable
         * @see \Illuminate\Events\Dispatcher::createClassCallable()
         */
        protected static function createClassCallable($listener)
        {
        }

        /**
         * Parse the class listener into class and method.
         *
         * @param string $listener
         * @return array
         * @see \Illuminate\Events\Dispatcher::parseClassCallable()
         */
        protected static function parseClassCallable($listener)
        {
        }

        /**
         * Determine if the event handler class should be queued.
         *
         * @param string $class
         * @return bool
         * @see \Illuminate\Events\Dispatcher::handlerShouldBeQueued()
         */
        protected static function handlerShouldBeQueued($class)
        {
        }

        /**
         * Create a callable for putting an event handler on the queue.
         *
         * @param string $class
         * @param string $method
         * @return \Closure
         * @see \Illuminate\Events\Dispatcher::createQueuedHandlerCallable()
         */
        protected static function createQueuedHandlerCallable($class, $method)
        {
        }

        /**
         * Call the queue method on the handler class.
         *
         * @param string $class
         * @param string $method
         * @param array $arguments
         * @return null
         * @see \Illuminate\Events\Dispatcher::callQueueMethodOnHandler()
         */
        protected static function callQueueMethodOnHandler($class, $method, $arguments)
        {
        }

        /**
         * Queue the handler class.
         *
         * @param string $class
         * @param string $method
         * @param array $arguments
         * @return null
         * @see \Illuminate\Events\Dispatcher::queueHandler()
         */
        protected static function queueHandler($class, $method, $arguments)
        {
        }

        /**
         * Create the listener and job for a queued listener.
         *
         * @param string $class
         * @param string $method
         * @param array $arguments
         * @return array
         * @see \Illuminate\Events\Dispatcher::createListenerAndJob()
         */
        protected static function createListenerAndJob($class, $method, $arguments)
        {
        }

        /**
         * Propogate listener options to the job.
         *
         * @param mixed $listener
         * @param mixed $job
         * @return mixed
         * @see \Illuminate\Events\Dispatcher::propogateListenerOptions()
         */
        protected static function propogateListenerOptions($listener, $job)
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
         * Get the queue implementation from the resolver.
         *
         * @return \Illuminate\Contracts\Queue\Queue
         * @see \Illuminate\Events\Dispatcher::resolveQueue()
         */
        protected static function resolveQueue()
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