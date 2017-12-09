<?php

namespace Illuminate\Routing;




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