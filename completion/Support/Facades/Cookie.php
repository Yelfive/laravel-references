<?php

namespace Illuminate\Support\Facades {



    /**
     * @see \Illuminate\Support\Facades\Cookie
     * @see \Illuminate\Cookie\CookieJar
     */
    class Cookie
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
         * The default path (if specified).
         *
         * @var string
         */
        protected $path;

        /**
         * The default domain (if specified).
         *
         * @var string
         */
        protected $domain;

        /**
         * The default secure setting (defaults to false).
         *
         * @var bool
         */
        protected $secure;

        /**
         * All of the cookies queued for sending.
         *
         * @var array
         */
        protected $queued;

        /**
         * Determine if a cookie exists on the request.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Support\Facades\Cookie::has()
         */
        public static function has($key)
        {
        }

        /**
         * Retrieve a cookie from the request.
         *
         * @param string $key
         * @param mixed $default
         * @return string
         * @see \Illuminate\Support\Facades\Cookie::get()
         */
        public static function get($key = null, $default = null)
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
         * Create a new cookie instance.
         *
         * @param string $name
         * @param string $value
         * @param int $minutes
         * @param string $path
         * @param string $domain
         * @param bool $secure
         * @param bool $httpOnly
         * @return \Symfony\Component\HttpFoundation\Cookie
         * @see \Illuminate\Cookie\CookieJar::make()
         */
        public static function make($name, $value, $minutes = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
        {
        }

        /**
         * Create a cookie that lasts "forever" (five years).
         *
         * @param string $name
         * @param string $value
         * @param string $path
         * @param string $domain
         * @param bool $secure
         * @param bool $httpOnly
         * @return \Symfony\Component\HttpFoundation\Cookie
         * @see \Illuminate\Cookie\CookieJar::forever()
         */
        public static function forever($name, $value, $path = null, $domain = null, $secure = false, $httpOnly = true)
        {
        }

        /**
         * Expire the given cookie.
         *
         * @param string $name
         * @param string $path
         * @param string $domain
         * @return \Symfony\Component\HttpFoundation\Cookie
         * @see \Illuminate\Cookie\CookieJar::forget()
         */
        public static function forget($name, $path = null, $domain = null)
        {
        }

        /**
         * Determine if a cookie has been queued.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Cookie\CookieJar::hasQueued()
         */
        public static function hasQueued($key)
        {
        }

        /**
         * Get a queued cookie instance.
         *
         * @param string $key
         * @param mixed $default
         * @return \Symfony\Component\HttpFoundation\Cookie
         * @see \Illuminate\Cookie\CookieJar::queued()
         */
        public static function queued($key, $default = null)
        {
        }

        /**
         * Queue a cookie to send with the next response.
         *
         * @param array $parameters
         * @return null
         * @see \Illuminate\Cookie\CookieJar::queue()
         */
        public static function queue($parameters)
        {
        }

        /**
         * Remove a cookie from the queue.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Cookie\CookieJar::unqueue()
         */
        public static function unqueue($name)
        {
        }

        /**
         * Set the default path and domain for the jar.
         *
         * @param string $path
         * @param string $domain
         * @param bool $secure
         * @return \Illuminate\Cookie\CookieJar
         * @see \Illuminate\Cookie\CookieJar::setDefaultPathAndDomain()
         */
        public static function setDefaultPathAndDomain($path, $domain, $secure = false)
        {
        }

        /**
         * Get the cookies which have been queued for the next request.
         *
         * @return array
         * @see \Illuminate\Cookie\CookieJar::getQueuedCookies()
         */
        public static function getQueuedCookies()
        {
        }

    }
}

namespace {
    class Cookie extends Illuminate\Support\Facades\Cookie
    {
    }
}