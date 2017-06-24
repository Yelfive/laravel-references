<?php

namespace Illuminate\Support\Facades {

    use Closure;

    /**
     * @see \Illuminate\Support\Facades\Notification
     * @see \Illuminate\Notifications\ChannelManager
     */
    class Notification
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
         * The default channel used to deliver messages.
         *
         * @var string
         */
        protected $defaultChannel;

        /**
         * The registered custom driver creators.
         *
         * @var array
         */
        protected $customCreators;

        /**
         * The array of created "drivers".
         *
         * @var array
         */
        protected $drivers;

        /**
         * Replace the bound instance with a fake.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Notification::fake()
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
         * Send the given notification to the given notifiable entities.
         *
         * @param \Illuminate\Support\Collection|array|mixed $notifiables
         * @param mixed $notification
         * @return null
         * @see \Illuminate\Notifications\ChannelManager::send()
         */
        public static function send($notifiables, $notification)
        {
        }

        /**
         * Send the given notification immediately.
         *
         * @param \Illuminate\Support\Collection|array|mixed $notifiables
         * @param mixed $notification
         * @param array|null $channels
         * @return null
         * @see \Illuminate\Notifications\ChannelManager::sendNow()
         */
        public static function sendNow($notifiables, $notification, array $channels = null)
        {
        }

        /**
         * Get a channel instance.
         *
         * @param string|null $name
         * @return mixed
         * @see \Illuminate\Notifications\ChannelManager::channel()
         */
        public static function channel($name = null)
        {
        }

        /**
         * Get the default channel driver name.
         *
         * @return string
         * @see \Illuminate\Notifications\ChannelManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Get the default channel driver name.
         *
         * @return string
         * @see \Illuminate\Notifications\ChannelManager::deliversVia()
         */
        public static function deliversVia()
        {
        }

        /**
         * Set the default channel driver name.
         *
         * @param string $channel
         * @return null
         * @see \Illuminate\Notifications\ChannelManager::deliverVia()
         */
        public static function deliverVia($channel)
        {
        }

        /**
         * Create a new manager instance.
         *
         * @param \Illuminate\Foundation\Application $app
         * 
         * @see \Illuminate\Support\Manager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed
         * @see \Illuminate\Support\Manager::driver()
         */
        public static function driver($driver = null)
        {
        }

        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Support\Manager
         * @see \Illuminate\Support\Manager::extend()
         */
        public static function extend($driver, Closure $callback)
        {
        }

        /**
         * Get all of the created "drivers".
         *
         * @return array
         * @see \Illuminate\Support\Manager::getDrivers()
         */
        public static function getDrivers()
        {
        }

    }
}

namespace {
    class Notification extends Illuminate\Support\Facades\Notification
    {
    }
}