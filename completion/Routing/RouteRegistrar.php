<?php

namespace Illuminate\Routing;

use Illuminate\Routing\Router;


class RouteRegistrar
{


    /**
     * The router instance.
     *
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * The attributes to pass on to the router.
     *
     * @var array
     */
    protected $attributes;

    /**
     * The methods to dynamically pass through to the router.
     *
     * @var array
     */
    protected $passthru;

    /**
     * The attributes that can be set through this class.
     *
     * @var array
     */
    protected $allowedAttributes;

    /**
     * The attributes that are aliased.
     *
     * @var array
     */
    protected $aliases;

    /**
     * Create a new route registrar instance.
     *
     * @param \Illuminate\Routing\Router $router
     * 
     * @see \Illuminate\Routing\RouteRegistrar::__construct()
     */
    public function __construct(Router $router)
    {
    }

    /**
     * Set the value for a given attribute.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     *
     * @throws \InvalidArgumentException
     * @see \Illuminate\Routing\RouteRegistrar::attribute()
     */
    public function attribute($key, $value)
    {
    }

    /**
     * Route a resource to a controller.
     *
     * @param string $name
     * @param string $controller
     * @param array $options
     * @return null
     * @see \Illuminate\Routing\RouteRegistrar::resource()
     */
    public function resource($name, $controller, array $options = [])
    {
    }

    /**
     * Create a route group with shared attributes.
     *
     * @param \Closure $callback
     * @return null
     * @see \Illuminate\Routing\RouteRegistrar::group()
     */
    public function group($callback)
    {
    }

    /**
     * Register a new route with the given verbs.
     *
     * @param array|string $methods
     * @param string $uri
     * @param \Closure|array|string|null $action
     * @return \Illuminate\Routing\Route
     * @see \Illuminate\Routing\RouteRegistrar::match()
     */
    public function match($methods, $uri, $action = null)
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
    protected function registerRoute($method, $uri, $action = null)
    {
    }

    /**
     * Compile the action into an array including the attributes.
     *
     * @param \Closure|array|string|null $action
     * @return array
     * @see \Illuminate\Routing\RouteRegistrar::compileAction()
     */
    protected function compileAction($action)
    {
    }

    /**
     * @param string $uri
     * @param \Closure|array|string|null $action
     *
     * @return \Illuminate\Routing\Route
     */
    public static function get($uri, $action)
    {
    }

    /**
     * @param string $uri
     * @param \Closure|array|string|null $action
     *
     * @return \Illuminate\Routing\Route
     */
    public static function post($uri, $action)
    {
    }

    /**
     * @param string $uri
     * @param \Closure|array|string|null $action
     *
     * @return \Illuminate\Routing\Route
     */
    public static function put($uri, $action)
    {
    }

    /**
     * @param string $uri
     * @param \Closure|array|string|null $action
     *
     * @return \Illuminate\Routing\Route
     */
    public static function patch($uri, $action)
    {
    }

    /**
     * @param string $uri
     * @param \Closure|array|string|null $action
     *
     * @return \Illuminate\Routing\Route
     */
    public static function delete($uri, $action)
    {
    }

    /**
     * @param string $uri
     * @param \Closure|array|string|null $action
     *
     * @return \Illuminate\Routing\Route
     */
    public static function options($uri, $action)
    {
    }

    /**
     * @param string $uri
     * @param \Closure|array|string|null $action
     *
     * @return \Illuminate\Routing\Route
     */
    public static function any($uri, $action)
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

    /**
     * @param mixed $value
     *
     * @return \Illuminate\Routing\RouteRegistrar
     */
    public static function prefix($value)
    {
    }

}