<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Routing\UrlGenerator;
    use Illuminate\Session\Store;

    /**
     * @see \Illuminate\Support\Facades\Redirect
     * @see \Illuminate\Routing\Redirector
     */
    class Redirect
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
         * The URL generator instance.
         *
         * @var \Illuminate\Routing\UrlGenerator
         */
        protected $generator;

        /**
         * The session store instance.
         *
         * @var \Illuminate\Session\Store
         */
        protected $session;

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
         * Create a new Redirector instance.
         *
         * @param \Illuminate\Routing\UrlGenerator $generator
         * 
         * @see \Illuminate\Routing\Redirector::__construct()
         */
        public function __construct(UrlGenerator $generator)
        {
        }

        /**
         * Create a new redirect response to the "home" route.
         *
         * @param int $status
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::home()
         */
        public static function home($status = 302)
        {
        }

        /**
         * Create a new redirect response to the previous location.
         *
         * @param int $status
         * @param array $headers
         * @param mixed $fallback
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::back()
         */
        public static function back($status = 302, $headers = [], $fallback = false)
        {
        }

        /**
         * Create a new redirect response to the current URI.
         *
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::refresh()
         */
        public static function refresh($status = 302, $headers = [])
        {
        }

        /**
         * Create a new redirect response, while putting the current URL in the session.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::guest()
         */
        public static function guest($path, $status = 302, $headers = [], $secure = null)
        {
        }

        /**
         * Create a new redirect response to the previously intended location.
         *
         * @param string $default
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::intended()
         */
        public static function intended($default = '/', $status = 302, $headers = [], $secure = null)
        {
        }

        /**
         * Create a new redirect response to the given path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::to()
         */
        public static function to($path, $status = 302, $headers = [], $secure = null)
        {
        }

        /**
         * Create a new redirect response to an external URL (no validation).
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::away()
         */
        public static function away($path, $status = 302, $headers = [])
        {
        }

        /**
         * Create a new redirect response to the given HTTPS path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::secure()
         */
        public static function secure($path, $status = 302, $headers = [])
        {
        }

        /**
         * Create a new redirect response to a named route.
         *
         * @param string $route
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::route()
         */
        public static function route($route, $parameters = [], $status = 302, $headers = [])
        {
        }

        /**
         * Create a new redirect response to a controller action.
         *
         * @param string $action
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\Redirector::action()
         */
        public static function action($action, $parameters = [], $status = 302, $headers = [])
        {
        }

        /**
         * Get the URL generator instance.
         *
         * @return \Illuminate\Routing\UrlGenerator
         * @see \Illuminate\Routing\Redirector::getUrlGenerator()
         */
        public static function getUrlGenerator()
        {
        }

        /**
         * Set the active session store.
         *
         * @param \Illuminate\Session\Store $session
         * @return null
         * @see \Illuminate\Routing\Redirector::setSession()
         */
        public static function setSession(Store $session)
        {
        }

    }
}

namespace {
    class Redirect extends Illuminate\Support\Facades\Redirect
    {
    }
}