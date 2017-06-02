<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\Events\Dispatcher;
    use Illuminate\Container\Container;
    use Illuminate\Http\Request;
    use Illuminate\Support\Collection;
    use Closure;
    use Illuminate\Routing\RouteCollection;
    use Illuminate\Routing\Router;

    /**
     * @see Illuminate\Support\Facades\Route
     * @see Illuminate\Routing\Router
     */
    class Route
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
         * The event dispatcher instance.
         *
         * @var \Illuminate\Contracts\Events\Dispatcher
         */
        protected $events;

        /**
         * The IoC container instance.
         *
         * @var \Illuminate\Container\Container
         */
        protected $container;

        /**
         * The route collection instance.
         *
         * @var \Illuminate\Routing\RouteCollection
         */
        protected $routes;

        /**
         * The currently dispatched route instance.
         *
         * @var \Illuminate\Routing\Route
         */
        protected $current;

        /**
         * The request currently being dispatched.
         *
         * @var \Illuminate\Http\Request
         */
        protected $currentRequest;

        /**
         * All of the short-hand keys for middlewares.
         *
         * @var array
         */
        protected $middleware;

        /**
         * All of the middleware groups.
         *
         * @var array
         */
        protected $middlewareGroups;

        /**
         * The priority-sorted list of middleware.
         *
         * Forces the listed middleware to always be in the given order.
         *
         * @var array
         */
        public $middlewarePriority;

        /**
         * The registered route value binders.
         *
         * @var array
         */
        protected $binders;

        /**
         * The globally available parameter patterns.
         *
         * @var array
         */
        protected $patterns;

        /**
         * The route group attribute stack.
         *
         * @var array
         */
        protected $groupStack;

        /**
         * All of the verbs supported by the router.
         *
         * @var array
         */
        public static $verbs;

        /**
         * The registered string macros.
         *
         * @var array
         */
        protected static $macros;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Route::getFacadeAccessor()
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
         * Create a new Router instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @param \Illuminate\Container\Container $container
         * 
         * @see \Illuminate\Routing\Router::__construct()
         */
        public function __construct(Dispatcher $events, Container $container = null)
        {
        }

        /**
         * Register a new GET route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::get()
         */
        public static function get($uri, $action = null)
        {
        }

        /**
         * Register a new POST route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::post()
         */
        public static function post($uri, $action = null)
        {
        }

        /**
         * Register a new PUT route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::put()
         */
        public static function put($uri, $action = null)
        {
        }

        /**
         * Register a new PATCH route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::patch()
         */
        public static function patch($uri, $action = null)
        {
        }

        /**
         * Register a new DELETE route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::delete()
         */
        public static function delete($uri, $action = null)
        {
        }

        /**
         * Register a new OPTIONS route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::options()
         */
        public static function options($uri, $action = null)
        {
        }

        /**
         * Register a new route responding to all verbs.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::any()
         */
        public static function any($uri, $action = null)
        {
        }

        /**
         * Register a new route with the given verbs.
         *
         * @param array|string $methods
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::match()
         */
        public static function match($methods, $uri, $action = null)
        {
        }

        /**
         * Register an array of resource controllers.
         *
         * @param array $resources
         * @return null
         * @see \Illuminate\Routing\Router::resources()
         */
        public static function resources(array $resources)
        {
        }

        /**
         * Route a resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return null
         * @see \Illuminate\Routing\Router::resource()
         */
        public static function resource($name, $controller, array $options = [])
        {
        }

        /**
         * Create a route group with shared attributes.
         *
         * @param array $attributes
         * @param \Closure|string $routes
         * @return null
         * @see \Illuminate\Routing\Router::group()
         */
        public static function group(array $attributes, $routes)
        {
        }

        /**
         * Update the group stack with the given attributes.
         *
         * @param array $attributes
         * @return null
         * @see \Illuminate\Routing\Router::updateGroupStack()
         */
        protected static function updateGroupStack(array $attributes)
        {
        }

        /**
         * Merge the given array with the last group stack.
         *
         * @param array $new
         * @return array
         * @see \Illuminate\Routing\Router::mergeWithLastGroup()
         */
        public static function mergeWithLastGroup($new)
        {
        }

        /**
         * Load the provided routes.
         *
         * @param \Closure|string $routes
         * @return null
         * @see \Illuminate\Routing\Router::loadRoutes()
         */
        protected static function loadRoutes($routes)
        {
        }

        /**
         * Get the prefix from the last group on the stack.
         *
         * @return string
         * @see \Illuminate\Routing\Router::getLastGroupPrefix()
         */
        public static function getLastGroupPrefix()
        {
        }

        /**
         * Add a route to the underlying route collection.
         *
         * @param array|string $methods
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::addRoute()
         */
        protected static function addRoute($methods, $uri, $action)
        {
        }

        /**
         * Create a new route instance.
         *
         * @param array|string $methods
         * @param string $uri
         * @param mixed $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::createRoute()
         */
        protected static function createRoute($methods, $uri, $action)
        {
        }

        /**
         * Determine if the action is routing to a controller.
         *
         * @param array $action
         * @return bool
         * @see \Illuminate\Routing\Router::actionReferencesController()
         */
        protected static function actionReferencesController($action)
        {
        }

        /**
         * Add a controller based route action to the action array.
         *
         * @param array|string $action
         * @return array
         * @see \Illuminate\Routing\Router::convertToControllerAction()
         */
        protected static function convertToControllerAction($action)
        {
        }

        /**
         * Prepend the last group namespace onto the use clause.
         *
         * @param string $class
         * @return string
         * @see \Illuminate\Routing\Router::prependGroupNamespace()
         */
        protected static function prependGroupNamespace($class)
        {
        }

        /**
         * Create a new Route object.
         *
         * @param array|string $methods
         * @param string $uri
         * @param mixed $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::newRoute()
         */
        protected static function newRoute($methods, $uri, $action)
        {
        }

        /**
         * Prefix the given URI with the last prefix.
         *
         * @param string $uri
         * @return string
         * @see \Illuminate\Routing\Router::prefix()
         */
        protected static function prefix($uri)
        {
        }

        /**
         * Add the necessary where clauses to the route based on its initial registration.
         *
         * @param \Illuminate\Routing\Route $route
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::addWhereClausesToRoute()
         */
        protected static function addWhereClausesToRoute($route)
        {
        }

        /**
         * Merge the group stack with the controller action.
         *
         * @param \Illuminate\Routing\Route $route
         * @return null
         * @see \Illuminate\Routing\Router::mergeGroupAttributesIntoRoute()
         */
        protected static function mergeGroupAttributesIntoRoute($route)
        {
        }

        /**
         * Dispatch the request to the application.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         * @see \Illuminate\Routing\Router::dispatch()
         */
        public static function dispatch(Request $request)
        {
        }

        /**
         * Dispatch the request to a route and return the response.
         *
         * @param \Illuminate\Http\Request $request
         * @return mixed
         * @see \Illuminate\Routing\Router::dispatchToRoute()
         */
        public static function dispatchToRoute(Request $request)
        {
        }

        /**
         * Find the route matching a given request.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::findRoute()
         */
        protected static function findRoute($request)
        {
        }

        /**
         * Run the given route within a Stack "onion" instance.
         *
         * @param \Illuminate\Routing\Route $route
         * @param \Illuminate\Http\Request $request
         * @return mixed
         * @see \Illuminate\Routing\Router::runRouteWithinStack()
         */
        protected static function runRouteWithinStack(\Illuminate\Routing\Route $route, Request $request)
        {
        }

        /**
         * Gather the middleware for the given route with resolved class names.
         *
         * @param \Illuminate\Routing\Route $route
         * @return array
         * @see \Illuminate\Routing\Router::gatherRouteMiddleware()
         */
        public static function gatherRouteMiddleware(\Illuminate\Routing\Route $route)
        {
        }

        /**
         * Sort the given middleware by priority.
         *
         * @param \Illuminate\Support\Collection $middlewares
         * @return array
         * @see \Illuminate\Routing\Router::sortMiddleware()
         */
        protected static function sortMiddleware(Collection $middlewares)
        {
        }

        /**
         * Create a response instance from the given value.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Illuminate\Http\Response
         * @see \Illuminate\Routing\Router::prepareResponse()
         */
        public static function prepareResponse($request, $response)
        {
        }

        /**
         * Substitute the route bindings onto the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::substituteBindings()
         */
        public static function substituteBindings($route)
        {
        }

        /**
         * Substitute the implicit Eloquent model bindings for the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return null
         * @see \Illuminate\Routing\Router::substituteImplicitBindings()
         */
        public static function substituteImplicitBindings($route)
        {
        }

        /**
         * Call the binding callback for the given key.
         *
         * @param string $key
         * @param string $value
         * @param \Illuminate\Routing\Route $route
         * @return mixed
         * @see \Illuminate\Routing\Router::performBinding()
         */
        protected static function performBinding($key, $value, $route)
        {
        }

        /**
         * Register a route matched event listener.
         *
         * @param string|callable $callback
         * @return null
         * @see \Illuminate\Routing\Router::matched()
         */
        public static function matched($callback)
        {
        }

        /**
         * Get all of the defined middleware short-hand names.
         *
         * @return array
         * @see \Illuminate\Routing\Router::getMiddleware()
         */
        public static function getMiddleware()
        {
        }

        /**
         * Register a short-hand name for a middleware.
         *
         * @param string $name
         * @param string $class
         * @return \Illuminate\Routing\Router
         * @see \Illuminate\Routing\Router::aliasMiddleware()
         */
        public static function aliasMiddleware($name, $class)
        {
        }

        /**
         * Check if a middlewareGroup with the given name exists.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Routing\Router::hasMiddlewareGroup()
         */
        public static function hasMiddlewareGroup($name)
        {
        }

        /**
         * Get all of the defined middleware groups.
         *
         * @return array
         * @see \Illuminate\Routing\Router::getMiddlewareGroups()
         */
        public static function getMiddlewareGroups()
        {
        }

        /**
         * Register a group of middleware.
         *
         * @param string $name
         * @param array $middleware
         * @return \Illuminate\Routing\Router
         * @see \Illuminate\Routing\Router::middlewareGroup()
         */
        public static function middlewareGroup($name, array $middleware)
        {
        }

        /**
         * Add a middleware to the beginning of a middleware group.
         *
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return \Illuminate\Routing\Router
         * @see \Illuminate\Routing\Router::prependMiddlewareToGroup()
         */
        public static function prependMiddlewareToGroup($group, $middleware)
        {
        }

        /**
         * Add a middleware to the end of a middleware group.
         *
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return \Illuminate\Routing\Router
         * @see \Illuminate\Routing\Router::pushMiddlewareToGroup()
         */
        public static function pushMiddlewareToGroup($group, $middleware)
        {
        }

        /**
         * Add a new route parameter binder.
         *
         * @param string $key
         * @param string|callable $binder
         * @return null
         * @see \Illuminate\Routing\Router::bind()
         */
        public static function bind($key, $binder)
        {
        }

        /**
         * Register a model binder for a wildcard.
         *
         * @param string $key
         * @param string $class
         * @param \Closure|null $callback
         * @return null
         *
         * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
         * @see \Illuminate\Routing\Router::model()
         */
        public static function model($key, $class, Closure $callback = null)
        {
        }

        /**
         * Get the binding callback for a given binding.
         *
         * @param string $key
         * @return \Closure|null
         * @see \Illuminate\Routing\Router::getBindingCallback()
         */
        public static function getBindingCallback($key)
        {
        }

        /**
         * Get the global "where" patterns.
         *
         * @return array
         * @see \Illuminate\Routing\Router::getPatterns()
         */
        public static function getPatterns()
        {
        }

        /**
         * Set a global where pattern on all routes.
         *
         * @param string $key
         * @param string $pattern
         * @return null
         * @see \Illuminate\Routing\Router::pattern()
         */
        public static function pattern($key, $pattern)
        {
        }

        /**
         * Set a group of global where patterns on all routes.
         *
         * @param array $patterns
         * @return null
         * @see \Illuminate\Routing\Router::patterns()
         */
        public static function patterns($patterns)
        {
        }

        /**
         * Determine if the router currently has a group stack.
         *
         * @return bool
         * @see \Illuminate\Routing\Router::hasGroupStack()
         */
        public static function hasGroupStack()
        {
        }

        /**
         * Get the current group stack for the router.
         *
         * @return array
         * @see \Illuminate\Routing\Router::getGroupStack()
         */
        public static function getGroupStack()
        {
        }

        /**
         * Get a route parameter for the current route.
         *
         * @param string $key
         * @param string $default
         * @return mixed
         * @see \Illuminate\Routing\Router::input()
         */
        public static function input($key, $default = null)
        {
        }

        /**
         * Get the request currently being dispatched.
         *
         * @return \Illuminate\Http\Request
         * @see \Illuminate\Routing\Router::getCurrentRequest()
         */
        public static function getCurrentRequest()
        {
        }

        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::getCurrentRoute()
         */
        public static function getCurrentRoute()
        {
        }

        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\Router::current()
         */
        public static function current()
        {
        }

        /**
         * Check if a route with the given name exists.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Routing\Router::has()
         */
        public static function has($name)
        {
        }

        /**
         * Get the current route name.
         *
         * @return string|null
         * @see \Illuminate\Routing\Router::currentRouteName()
         */
        public static function currentRouteName()
        {
        }

        /**
         * Alias for the "currentRouteNamed" method.
         *
         * @return bool
         * @see \Illuminate\Routing\Router::is()
         */
        public static function is()
        {
        }

        /**
         * Determine if the current route matches a given name.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Routing\Router::currentRouteNamed()
         */
        public static function currentRouteNamed($name)
        {
        }

        /**
         * Get the current route action.
         *
         * @return string|null
         * @see \Illuminate\Routing\Router::currentRouteAction()
         */
        public static function currentRouteAction()
        {
        }

        /**
         * Alias for the "currentRouteUses" method.
         *
         * @return bool
         * @see \Illuminate\Routing\Router::uses()
         */
        public static function uses()
        {
        }

        /**
         * Determine if the current route action matches a given action.
         *
         * @param string $action
         * @return bool
         * @see \Illuminate\Routing\Router::currentRouteUses()
         */
        public static function currentRouteUses($action)
        {
        }

        /**
         * Register the typical authentication routes for an application.
         *
         * @return null
         * @see \Illuminate\Routing\Router::auth()
         */
        public static function auth()
        {
        }

        /**
         * Set the unmapped global resource parameters to singular.
         *
         * @param bool $singular
         * @return null
         * @see \Illuminate\Routing\Router::singularResourceParameters()
         */
        public static function singularResourceParameters($singular = true)
        {
        }

        /**
         * Set the global resource parameter mapping.
         *
         * @param array $parameters
         * @return null
         * @see \Illuminate\Routing\Router::resourceParameters()
         */
        public static function resourceParameters(array $parameters = [])
        {
        }

        /**
         * Get or set the verbs used in the resource URIs.
         *
         * @param array $verbs
         * @return array|null
         * @see \Illuminate\Routing\Router::resourceVerbs()
         */
        public static function resourceVerbs(array $verbs = [])
        {
        }

        /**
         * Get the underlying route collection.
         *
         * @return \Illuminate\Routing\RouteCollection
         * @see \Illuminate\Routing\Router::getRoutes()
         */
        public static function getRoutes()
        {
        }

        /**
         * Set the route collection instance.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return null
         * @see \Illuminate\Routing\Router::setRoutes()
         */
        public static function setRoutes(RouteCollection $routes)
        {
        }

        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return null
         * @see \Illuminate\Routing\Router::macro()
         */
        public static function macro($name, callable $macro)
        {
        }

        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Routing\Router::hasMacro()
         */
        public static function hasMacro($name)
        {
        }

        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed
         *
         * @throws \BadMethodCallException
         * @see \Illuminate\Routing\Router::macroCall()
         */
        public static function macroCall($method, $parameters)
        {
        }

        /**
         * Set the value for a given attribute.
         *
         * @param string $key
         * @param mixed $value
         * @return \Illuminate\Routing\RouteRegistrar
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Routing\RouteRegistrar::attribute()
         */
        public static function attribute($key, $value)
        {
        }

        /**
         * Register a new route with the router.
         *
         * @param string $method
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route
         * @see \Illuminate\Routing\RouteRegistrar::registerRoute()
         */
        protected static function registerRoute($method, $uri, $action = null)
        {
        }

        /**
         * Compile the action into an array including the attributes.
         *
         * @param \Closure|array|string|null $action
         * @return array
         * @see \Illuminate\Routing\RouteRegistrar::compileAction()
         */
        protected static function compileAction($action)
        {
        }

        /**
         * @param mixed $value
         *
         * @return \Illuminate\Routing\RouteRegistrar
         */
        public static function as($value)
        {
        }

        /**
         * @param mixed $value
         *
         * @return \Illuminate\Routing\RouteRegistrar
         */
        public static function domain($value)
        {
        }

        /**
         * @param mixed $value
         *
         * @return \Illuminate\Routing\RouteRegistrar
         */
        public static function middleware($value)
        {
        }

        /**
         * @param mixed $value
         *
         * @return \Illuminate\Routing\RouteRegistrar
         */
        public static function name($value)
        {
        }

        /**
         * @param mixed $value
         *
         * @return \Illuminate\Routing\RouteRegistrar
         */
        public static function namespace($value)
        {
        }

    }
}

namespace {
    class Route extends Illuminate\Support\Facades\Route
    {
    }
}