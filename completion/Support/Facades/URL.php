<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Routing\RouteCollection;
    use Illuminate\Http\Request;
    use Closure;

    /**
     * @see \Illuminate\Support\Facades\URL
     * @see \Illuminate\Routing\UrlGenerator
     */
    class URL
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
         * The route collection.
         *
         * @var \Illuminate\Routing\RouteCollection
         */
        protected $routes;

        /**
         * The request instance.
         *
         * @var \Illuminate\Http\Request
         */
        protected $request;

        /**
         * The forced URL root.
         *
         * @var string
         */
        protected $forcedRoot;

        /**
         * The forced schema for URLs.
         *
         * @var string
         */
        protected $forceScheme;

        /**
         * A cached copy of the URL root for the current request.
         *
         * @var string|null
         */
        protected $cachedRoot;

        /**
         * A cached copy of the URL schema for the current request.
         *
         * @var string|null
         */
        protected $cachedSchema;

        /**
         * The root namespace being applied to controller actions.
         *
         * @var string
         */
        protected $rootNamespace;

        /**
         * The session resolver callable.
         *
         * @var callable
         */
        protected $sessionResolver;

        /**
         * The callback to use to format hosts.
         *
         * @var \Closure
         */
        protected $formatHostUsing;

        /**
         * The callback to use to format paths.
         *
         * @var \Closure
         */
        protected $formatPathUsing;

        /**
         * The route URL generator instance.
         *
         * @var \Illuminate\Routing\RouteUrlGenerator
         */
        protected $routeGenerator;

        /**
         * The registered string macros.
         *
         * @var array
         */
        protected static $macros;

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
         * Create a new URL Generator instance.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @param \Illuminate\Http\Request $request
         * 
         * @see \Illuminate\Routing\UrlGenerator::__construct()
         */
        public function __construct(RouteCollection $routes, Request $request)
        {
        }

        /**
         * Get the full URL for the current request.
         *
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::full()
         */
        public static function full()
        {
        }

        /**
         * Get the current URL for the request.
         *
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::current()
         */
        public static function current()
        {
        }

        /**
         * Get the URL for the previous request.
         *
         * @param mixed $fallback
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::previous()
         */
        public static function previous($fallback = false)
        {
        }

        /**
         * Generate an absolute URL to the given path.
         *
         * @param string $path
         * @param mixed $extra
         * @param bool|null $secure
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::to()
         */
        public static function to($path, $extra = [], $secure = null)
        {
        }

        /**
         * Generate a secure, absolute URL to the given path.
         *
         * @param string $path
         * @param array $parameters
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::secure()
         */
        public static function secure($path, $parameters = [])
        {
        }

        /**
         * Generate the URL to an application asset.
         *
         * @param string $path
         * @param bool|null $secure
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::asset()
         */
        public static function asset($path, $secure = null)
        {
        }

        /**
         * Generate the URL to a secure asset.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::secureAsset()
         */
        public static function secureAsset($path)
        {
        }

        /**
         * Generate the URL to an asset from a custom root domain such as CDN, etc.
         *
         * @param string $root
         * @param string $path
         * @param bool|null $secure
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::assetFrom()
         */
        public static function assetFrom($root, $path, $secure = null)
        {
        }

        /**
         * Get the default scheme for a raw URL.
         *
         * @param bool|null $secure
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::formatScheme()
         */
        public static function formatScheme($secure)
        {
        }

        /**
         * Get the URL to a named route.
         *
         * @param string $name
         * @param mixed $parameters
         * @param bool $absolute
         * @return string
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Routing\UrlGenerator::route()
         */
        public static function route($name, $parameters = [], $absolute = true)
        {
        }

        /**
         * Get the URL to a controller action.
         *
         * @param string $action
         * @param mixed $parameters
         * @param bool $absolute
         * @return string
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Routing\UrlGenerator::action()
         */
        public static function action($action, $parameters = [], $absolute = true)
        {
        }

        /**
         * Format the array of URL parameters.
         *
         * @param mixed|array $parameters
         * @return array
         * @see \Illuminate\Routing\UrlGenerator::formatParameters()
         */
        public static function formatParameters($parameters)
        {
        }

        /**
         * Get the base URL for the request.
         *
         * @param string $scheme
         * @param string $root
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::formatRoot()
         */
        public static function formatRoot($scheme, $root = null)
        {
        }

        /**
         * Format the given URL segments into a single URL.
         *
         * @param string $root
         * @param string $path
         * @return string
         * @see \Illuminate\Routing\UrlGenerator::format()
         */
        public static function format($root, $path)
        {
        }

        /**
         * Determine if the given path is a valid URL.
         *
         * @param string $path
         * @return bool
         * @see \Illuminate\Routing\UrlGenerator::isValidUrl()
         */
        public static function isValidUrl($path)
        {
        }

        /**
         * Set the default named parameters used by the URL generator.
         *
         * @param array $defaults
         * @return null
         * @see \Illuminate\Routing\UrlGenerator::defaults()
         */
        public static function defaults(array $defaults)
        {
        }

        /**
         * Force the scheme for URLs.
         *
         * @param string $schema
         * @return null
         * @see \Illuminate\Routing\UrlGenerator::forceScheme()
         */
        public static function forceScheme($schema)
        {
        }

        /**
         * Set the forced root URL.
         *
         * @param string $root
         * @return null
         * @see \Illuminate\Routing\UrlGenerator::forceRootUrl()
         */
        public static function forceRootUrl($root)
        {
        }

        /**
         * Set a callback to be used to format the host of generated URLs.
         *
         * @param \Closure $callback
         * @return \Illuminate\Routing\UrlGenerator
         * @see \Illuminate\Routing\UrlGenerator::formatHostUsing()
         */
        public static function formatHostUsing(Closure $callback)
        {
        }

        /**
         * Set a callback to be used to format the path of generated URLs.
         *
         * @param \Closure $callback
         * @return \Illuminate\Routing\UrlGenerator
         * @see \Illuminate\Routing\UrlGenerator::formatPathUsing()
         */
        public static function formatPathUsing(Closure $callback)
        {
        }

        /**
         * Get the path formatter being used by the URL generator.
         *
         * @return \Closure
         * @see \Illuminate\Routing\UrlGenerator::pathFormatter()
         */
        public static function pathFormatter()
        {
        }

        /**
         * Get the request instance.
         *
         * @return \Illuminate\Http\Request
         * @see \Illuminate\Routing\UrlGenerator::getRequest()
         */
        public static function getRequest()
        {
        }

        /**
         * Set the current request instance.
         *
         * @param \Illuminate\Http\Request $request
         * @return null
         * @see \Illuminate\Routing\UrlGenerator::setRequest()
         */
        public static function setRequest(Request $request)
        {
        }

        /**
         * Set the route collection.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return \Illuminate\Routing\UrlGenerator
         * @see \Illuminate\Routing\UrlGenerator::setRoutes()
         */
        public static function setRoutes(RouteCollection $routes)
        {
        }

        /**
         * Set the session resolver for the generator.
         *
         * @param callable $sessionResolver
         * @return \Illuminate\Routing\UrlGenerator
         * @see \Illuminate\Routing\UrlGenerator::setSessionResolver()
         */
        public static function setSessionResolver(callable $sessionResolver)
        {
        }

        /**
         * Set the root controller namespace.
         *
         * @param string $rootNamespace
         * @return \Illuminate\Routing\UrlGenerator
         * @see \Illuminate\Routing\UrlGenerator::setRootControllerNamespace()
         */
        public static function setRootControllerNamespace($rootNamespace)
        {
        }

        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return null
         * @see \Illuminate\Routing\UrlGenerator::macro()
         */
        public static function macro($name, callable $macro)
        {
        }

        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Routing\UrlGenerator::hasMacro()
         */
        public static function hasMacro($name)
        {
        }

    }
}

namespace {
    class URL extends Illuminate\Support\Facades\URL
    {
    }
}