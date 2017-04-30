<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 */
namespace Illuminate\Support\Facades;

/**
 * @see \Illuminate\Foundation\Application
 */
class App
{
    /**
     * Get the version number of the application.
     * @see \Illuminate\Foundation\Application::version()
     * @return string
     */
    public static function version()
    {
    }

    /**
     * Run the given array of bootstrap classes.
     * @see \Illuminate\Foundation\Application::bootstrapWith()
     * @param array $bootstrappers
     * @return void
     */
    public static function bootstrapWith($bootstrappers)
    {
    }

    /**
     * Register a callback to run after loading the environment.
     * @see \Illuminate\Foundation\Application::afterLoadingEnvironment()
     * @param \Closure $callback
     * @return void
     */
    public static function afterLoadingEnvironment($callback)
    {
    }

    /**
     * Register a callback to run before a bootstrapper.
     *
     * @see \Illuminate\Foundation\Application::beforeBootstrapping();
     * @param string $bootstrapper
     * @param \Closure $callback
     * @return void
     */
    public static function beforeBootstrapping($bootstrapper, $callback)
    {
    }

    /**
     * Register a callback to run after a bootstrapper.
     *
     * @see \Illuminate\Foundation\Application::afterBootstrapping()
     * @param string $bootstrapper
     * @param \Closure $callback
     * @return void
     * @static
     */
    public static function afterBootstrapping($bootstrapper, $callback)
    {
    }

    /**
     * Determine if the application has been bootstrapped before.
     *
     * @see \Illuminate\Foundation\Application::hasBeenBootstrapped()
     * @return bool
     * @static
     */
    public static function hasBeenBootstrapped()
    {
    }

    /**
     * Set the base path for the application.
     *
     * @see \Illuminate\Foundation\Application::setBasePath()
     * @param string $basePath
     * @return $this
     * @static
     */
    public static function setBasePath($basePath)
    {
    }

    /**
     * Get the path to the application "app" directory.
     *
     * @see \Illuminate\Foundation\Application::path()
     * @return string
     * @static
     */
    public static function path()
    {
    }

    /**
     * Get the base path of the Laravel installation.
     *
     * @see  \Illuminate\Foundation\Application::basePath()
     * @return string
     * @static
     */
    public static function basePath()
    {
    }

    /**
     * Get the path to the bootstrap directory.
     *
     * @see \Illuminate\Foundation\Application::bootstrapPath()
     * @return string
     * @static
     */
    public static function bootstrapPath()
    {
    }

    /**
     * Get the path to the application configuration files.
     *
     * @see \Illuminate\Foundation\Application::configPath()
     * @return string
     * @static
     */
    public static function configPath()
    {
    }

    /**
     * Get the path to the database directory.
     *
     * @return string
     * @static
     */
    public static function databasePath()
    {
        return \Illuminate\Foundation\Application::databasePath();
    }

    /**
     * Set the database directory.
     *
     * @param string $path
     * @return $this
     * @static
     */
    public static function useDatabasePath($path)
    {
        return \Illuminate\Foundation\Application::useDatabasePath($path);
    }

    /**
     * Get the path to the language files.
     *
     * @return string
     * @static
     */
    public static function langPath()
    {
        return \Illuminate\Foundation\Application::langPath();
    }

    /**
     * Get the path to the public / web directory.
     *
     * @return string
     * @static
     */
    public static function publicPath()
    {
        return \Illuminate\Foundation\Application::publicPath();
    }

    /**
     * Get the path to the storage directory.
     *
     * @return string
     * @static
     */
    public static function storagePath()
    {
        return \Illuminate\Foundation\Application::storagePath();
    }

    /**
     * Set the storage directory.
     *
     * @param string $path
     * @return $this
     * @static
     */
    public static function useStoragePath($path)
    {
        return \Illuminate\Foundation\Application::useStoragePath($path);
    }

    /**
     * Get the path to the resources directory.
     *
     * @return string
     * @static
     */
    public static function resourcePath()
    {
        return \Illuminate\Foundation\Application::resourcePath();
    }

    /**
     * Get the path to the environment file directory.
     *
     * @return string
     * @static
     */
    public static function environmentPath()
    {
        return \Illuminate\Foundation\Application::environmentPath();
    }

    /**
     * Set the directory for the environment file.
     *
     * @param string $path
     * @return $this
     * @static
     */
    public static function useEnvironmentPath($path)
    {
        return \Illuminate\Foundation\Application::useEnvironmentPath($path);
    }

    /**
     * Set the environment file to be loaded during bootstrapping.
     *
     * @param string $file
     * @return $this
     * @static
     */
    public static function loadEnvironmentFrom($file)
    {
        return \Illuminate\Foundation\Application::loadEnvironmentFrom($file);
    }

    /**
     * Get the environment file the application is using.
     *
     * @return string
     * @static
     */
    public static function environmentFile()
    {
        return \Illuminate\Foundation\Application::environmentFile();
    }

    /**
     * Get the fully qualified path to the environment file.
     *
     * @return string
     * @static
     */
    public static function environmentFilePath()
    {
        return \Illuminate\Foundation\Application::environmentFilePath();
    }

    /**
     * Get or check the current application environment.
     *
     * @return string|bool
     * @static
     */
    public static function environment()
    {
        return \Illuminate\Foundation\Application::environment();
    }

    /**
     * Determine if application is in local environment.
     *
     * @return bool
     * @static
     */
    public static function isLocal()
    {
        return \Illuminate\Foundation\Application::isLocal();
    }

    /**
     * Detect the application's current environment.
     *
     * @param \Closure $callback
     * @return string
     * @static
     */
    public static function detectEnvironment($callback)
    {
        return \Illuminate\Foundation\Application::detectEnvironment($callback);
    }

    /**
     * Determine if we are running in the console.
     *
     * @return bool
     * @static
     */
    public static function runningInConsole()
    {
        return \Illuminate\Foundation\Application::runningInConsole();
    }

    /**
     * Determine if we are running unit tests.
     *
     * @return bool
     * @static
     */
    public static function runningUnitTests()
    {
        return \Illuminate\Foundation\Application::runningUnitTests();
    }

    /**
     * Register all of the configured providers.
     *
     * @return void
     * @static
     */
    public static function registerConfiguredProviders()
    {
        \Illuminate\Foundation\Application::registerConfiguredProviders();
    }

    /**
     * Register a service provider with the application.
     *
     * @param \Illuminate\Support\ServiceProvider|string $provider
     * @param array $options
     * @param bool $force
     * @return \Illuminate\Support\ServiceProvider
     * @static
     */
    public static function register($provider, $options = array(), $force = false)
    {
        return \Illuminate\Foundation\Application::register($provider, $options, $force);
    }

    /**
     * Get the registered service provider instance if it exists.
     *
     * @param \Illuminate\Support\ServiceProvider|string $provider
     * @return \Illuminate\Support\ServiceProvider|null
     * @static
     */
    public static function getProvider($provider)
    {
        return \Illuminate\Foundation\Application::getProvider($provider);
    }

    /**
     * Resolve a service provider instance from the class name.
     *
     * @param string $provider
     * @return \Illuminate\Support\ServiceProvider
     * @static
     */
    public static function resolveProvider($provider)
    {
        return \Illuminate\Foundation\Application::resolveProvider($provider);
    }

    /**
     * Load and boot all of the remaining deferred providers.
     *
     * @return void
     * @static
     */
    public static function loadDeferredProviders()
    {
        \Illuminate\Foundation\Application::loadDeferredProviders();
    }

    /**
     * Load the provider for a deferred service.
     *
     * @param string $service
     * @return void
     * @static
     */
    public static function loadDeferredProvider($service)
    {
        \Illuminate\Foundation\Application::loadDeferredProvider($service);
    }

    /**
     * Register a deferred provider and service.
     *
     * @param string $provider
     * @param string $service
     * @return void
     * @static
     */
    public static function registerDeferredProvider($provider, $service = null)
    {
        \Illuminate\Foundation\Application::registerDeferredProvider($provider, $service);
    }

    /**
     * Resolve the given type from the container.
     *
     * (Overriding Container::make)
     *
     * @param string $abstract
     * @return mixed
     * @static
     */
    public static function make($abstract)
    {
        return \Illuminate\Foundation\Application::make($abstract);
    }

    /**
     * Determine if the given abstract type has been bound.
     *
     * (Overriding Container::bound)
     *
     * @param string $abstract
     * @return bool
     * @static
     */
    public static function bound($abstract)
    {
        return \Illuminate\Foundation\Application::bound($abstract);
    }

    /**
     * Determine if the application has booted.
     *
     * @return bool
     * @static
     */
    public static function isBooted()
    {
        return \Illuminate\Foundation\Application::isBooted();
    }

    /**
     * Boot the application's service providers.
     *
     * @return void
     * @static
     */
    public static function boot()
    {
        \Illuminate\Foundation\Application::boot();
    }

    /**
     * Register a new boot listener.
     *
     * @param mixed $callback
     * @return void
     * @static
     */
    public static function booting($callback)
    {
        \Illuminate\Foundation\Application::booting($callback);
    }

    /**
     * Register a new "booted" listener.
     *
     * @param mixed $callback
     * @return void
     * @static
     */
    public static function booted($callback)
    {
        \Illuminate\Foundation\Application::booted($callback);
    }

    /**
     * {@inheritdoc}
     *
     * @static
     */
    public static function handle($request, $type = 1, $catch = true)
    {
        return \Illuminate\Foundation\Application::handle($request, $type, $catch);
    }

    /**
     * Determine if middleware has been disabled for the application.
     *
     * @return bool
     * @static
     */
    public static function shouldSkipMiddleware()
    {
        return \Illuminate\Foundation\Application::shouldSkipMiddleware();
    }

    /**
     * Get the path to the cached services.php file.
     *
     * @return string
     * @static
     */
    public static function getCachedServicesPath()
    {
        return \Illuminate\Foundation\Application::getCachedServicesPath();
    }

    /**
     * Determine if the application configuration is cached.
     *
     * @return bool
     * @static
     */
    public static function configurationIsCached()
    {
        return \Illuminate\Foundation\Application::configurationIsCached();
    }

    /**
     * Get the path to the configuration cache file.
     *
     * @return string
     * @static
     */
    public static function getCachedConfigPath()
    {
        return \Illuminate\Foundation\Application::getCachedConfigPath();
    }

    /**
     * Determine if the application routes are cached.
     *
     * @return bool
     * @static
     */
    public static function routesAreCached()
    {
        return \Illuminate\Foundation\Application::routesAreCached();
    }

    /**
     * Get the path to the routes cache file.
     *
     * @return string
     * @static
     */
    public static function getCachedRoutesPath()
    {
        return \Illuminate\Foundation\Application::getCachedRoutesPath();
    }

    /**
     * Determine if the application is currently down for maintenance.
     *
     * @return bool
     * @static
     */
    public static function isDownForMaintenance()
    {
        return \Illuminate\Foundation\Application::isDownForMaintenance();
    }

    /**
     * Throw an HttpException with the given data.
     *
     * @param int $code
     * @param string $message
     * @param array $headers
     * @return void
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @static
     */
    public static function abort($code, $message = '', $headers = array())
    {
        \Illuminate\Foundation\Application::abort($code, $message, $headers);
    }

    /**
     * Register a terminating callback with the application.
     *
     * @param \Closure $callback
     * @return $this
     * @static
     */
    public static function terminating($callback)
    {
        return \Illuminate\Foundation\Application::terminating($callback);
    }

    /**
     * Terminate the application.
     *
     * @return void
     * @static
     */
    public static function terminate()
    {
        \Illuminate\Foundation\Application::terminate();
    }

    /**
     * Get the service providers that have been loaded.
     *
     * @return array
     * @static
     */
    public static function getLoadedProviders()
    {
        return \Illuminate\Foundation\Application::getLoadedProviders();
    }

    /**
     * Get the application's deferred services.
     *
     * @return array
     * @static
     */
    public static function getDeferredServices()
    {
        return \Illuminate\Foundation\Application::getDeferredServices();
    }

    /**
     * Set the application's deferred services.
     *
     * @param array $services
     * @return void
     * @static
     */
    public static function setDeferredServices($services)
    {
        \Illuminate\Foundation\Application::setDeferredServices($services);
    }

    /**
     * Add an array of services to the application's deferred services.
     *
     * @param array $services
     * @return void
     * @static
     */
    public static function addDeferredServices($services)
    {
        \Illuminate\Foundation\Application::addDeferredServices($services);
    }

    /**
     * Determine if the given service is a deferred service.
     *
     * @param string $service
     * @return bool
     * @static
     */
    public static function isDeferredService($service)
    {
        return \Illuminate\Foundation\Application::isDeferredService($service);
    }

    /**
     * Configure the real-time facade namespace.
     *
     * @param string $namespace
     * @return void
     * @static
     */
    public static function provideFacades($namespace)
    {
        \Illuminate\Foundation\Application::provideFacades($namespace);
    }

    /**
     * Define a callback to be used to configure Monolog.
     *
     * @param callable $callback
     * @return $this
     * @static
     */
    public static function configureMonologUsing($callback)
    {
        return \Illuminate\Foundation\Application::configureMonologUsing($callback);
    }

    /**
     * Determine if the application has a custom Monolog configurator.
     *
     * @return bool
     * @static
     */
    public static function hasMonologConfigurator()
    {
        return \Illuminate\Foundation\Application::hasMonologConfigurator();
    }

    /**
     * Get the custom Monolog configurator for the application.
     *
     * @return callable
     * @static
     */
    public static function getMonologConfigurator()
    {
        return \Illuminate\Foundation\Application::getMonologConfigurator();
    }

    /**
     * Get the current application locale.
     *
     * @return string
     * @static
     */
    public static function getLocale()
    {
        return \Illuminate\Foundation\Application::getLocale();
    }

    /**
     * Set the current application locale.
     *
     * @param string $locale
     * @return void
     * @static
     */
    public static function setLocale($locale)
    {
        \Illuminate\Foundation\Application::setLocale($locale);
    }

    /**
     * Determine if application locale is the given locale.
     *
     * @param string $locale
     * @return bool
     * @static
     */
    public static function isLocale($locale)
    {
        return \Illuminate\Foundation\Application::isLocale($locale);
    }

    /**
     * Register the core class aliases in the container.
     *
     * @return void
     * @static
     */
    public static function registerCoreContainerAliases()
    {
        \Illuminate\Foundation\Application::registerCoreContainerAliases();
    }

    /**
     * Flush the container of all bindings and resolved instances.
     *
     * @return void
     * @static
     */
    public static function flush()
    {
        \Illuminate\Foundation\Application::flush();
    }

    /**
     * Get the application namespace.
     *
     * @return string
     * @throws \RuntimeException
     * @static
     */
    public static function getNamespace()
    {
        return \Illuminate\Foundation\Application::getNamespace();
    }

    /**
     * Define a contextual binding.
     *
     * @param string $concrete
     * @return \Illuminate\Contracts\Container\ContextualBindingBuilder
     * @static
     */
    public static function when($concrete)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::when($concrete);
    }

    /**
     * Determine if the given abstract type has been resolved.
     *
     * @param string $abstract
     * @return bool
     * @static
     */
    public static function resolved($abstract)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::resolved($abstract);
    }

    /**
     * Determine if a given type is shared.
     *
     * @param string $abstract
     * @return bool
     * @static
     */
    public static function isShared($abstract)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::isShared($abstract);
    }

    /**
     * Determine if a given string is an alias.
     *
     * @param string $name
     * @return bool
     * @static
     */
    public static function isAlias($name)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::isAlias($name);
    }

    /**
     * Register a binding with the container.
     *
     * @param string|array $abstract
     * @param \Closure|string|null $concrete
     * @param bool $shared
     * @return void
     * @static
     */
    public static function bind($abstract, $concrete = null, $shared = false)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::bind($abstract, $concrete, $shared);
    }

    /**
     * Determine if the container has a method binding.
     *
     * @param string $method
     * @return bool
     * @static
     */
    public static function hasMethodBinding($method)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::hasMethodBinding($method);
    }

    /**
     * Bind a callback to resolve with Container::call.
     *
     * @param string $method
     * @param \Closure $callback
     * @return void
     * @static
     */
    public static function bindMethod($method, $callback)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::bindMethod($method, $callback);
    }

    /**
     * Get the method binding for the given method.
     *
     * @param string $method
     * @param mixed $instance
     * @return mixed
     * @static
     */
    public static function callMethodBinding($method, $instance)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::callMethodBinding($method, $instance);
    }

    /**
     * Add a contextual binding to the container.
     *
     * @param string $concrete
     * @param string $abstract
     * @param \Closure|string $implementation
     * @return void
     * @static
     */
    public static function addContextualBinding($concrete, $abstract, $implementation)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::addContextualBinding($concrete, $abstract, $implementation);
    }

    /**
     * Register a binding if it hasn't already been registered.
     *
     * @param string $abstract
     * @param \Closure|string|null $concrete
     * @param bool $shared
     * @return void
     * @static
     */
    public static function bindIf($abstract, $concrete = null, $shared = false)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::bindIf($abstract, $concrete, $shared);
    }

    /**
     * Register a shared binding in the container.
     *
     * @param string|array $abstract
     * @param \Closure|string|null $concrete
     * @return void
     * @static
     */
    public static function singleton($abstract, $concrete = null)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::singleton($abstract, $concrete);
    }

    /**
     * "Extend" an abstract type in the container.
     *
     * @param string $abstract
     * @param \Closure $closure
     * @return void
     * @throws \InvalidArgumentException
     * @static
     */
    public static function extend($abstract, $closure)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::extend($abstract, $closure);
    }

    /**
     * Register an existing instance as shared in the container.
     *
     * @param string $abstract
     * @param mixed $instance
     * @return void
     * @static
     */
    public static function instance($abstract, $instance)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::instance($abstract, $instance);
    }

    /**
     * Assign a set of tags to a given binding.
     *
     * @param array|string $abstracts
     * @param array|mixed $tags
     * @return void
     * @static
     */
    public static function tag($abstracts, $tags)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::tag($abstracts, $tags);
    }

    /**
     * Resolve all of the bindings for a given tag.
     *
     * @param string $tag
     * @return array
     * @static
     */
    public static function tagged($tag)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::tagged($tag);
    }

    /**
     * Alias a type to a different name.
     *
     * @param string $abstract
     * @param string $alias
     * @return void
     * @static
     */
    public static function alias($abstract, $alias)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::alias($abstract, $alias);
    }

    /**
     * Bind a new callback to an abstract's rebind event.
     *
     * @param string $abstract
     * @param \Closure $callback
     * @return mixed
     * @static
     */
    public static function rebinding($abstract, $callback)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::rebinding($abstract, $callback);
    }

    /**
     * Refresh an instance on the given target and method.
     *
     * @param string $abstract
     * @param mixed $target
     * @param string $method
     * @return mixed
     * @static
     */
    public static function refresh($abstract, $target, $method)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::refresh($abstract, $target, $method);
    }

    /**
     * Wrap the given closure such that its dependencies will be injected when executed.
     *
     * @param \Closure $callback
     * @param array $parameters
     * @return \Closure
     * @static
     */
    public static function wrap($callback, $parameters = array())
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::wrap($callback, $parameters);
    }

    /**
     * Call the given Closure / class@method and inject its dependencies.
     *
     * @param callable|string $callback
     * @param array $parameters
     * @param string|null $defaultMethod
     * @return mixed
     * @static
     */
    public static function call($callback, $parameters = array(), $defaultMethod = null)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::call($callback, $parameters, $defaultMethod);
    }

    /**
     * Get a closure to resolve the given type from the container.
     *
     * @param string $abstract
     * @return \Closure
     * @static
     */
    public static function factory($abstract)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::factory($abstract);
    }

    /**
     * Instantiate a concrete instance of the given type.
     *
     * @param string $concrete
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @static
     */
    public static function build($concrete)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::build($concrete);
    }

    /**
     * Register a new resolving callback.
     *
     * @param string $abstract
     * @param \Closure|null $callback
     * @return void
     * @static
     */
    public static function resolving($abstract, $callback = null)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::resolving($abstract, $callback);
    }

    /**
     * Register a new after resolving callback for all types.
     *
     * @param string $abstract
     * @param \Closure|null $callback
     * @return void
     * @static
     */
    public static function afterResolving($abstract, $callback = null)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::afterResolving($abstract, $callback);
    }

    /**
     * Get the container's bindings.
     *
     * @return array
     * @static
     */
    public static function getBindings()
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::getBindings();
    }

    /**
     * Get the alias for an abstract if available.
     *
     * @param string $abstract
     * @return string
     * @throws \LogicException
     * @static
     */
    public static function getAlias($abstract)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::getAlias($abstract);
    }

    /**
     * Remove a resolved instance from the instance cache.
     *
     * @param string $abstract
     * @return void
     * @static
     */
    public static function forgetInstance($abstract)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::forgetInstance($abstract);
    }

    /**
     * Clear all of the instances from the container.
     *
     * @return void
     * @static
     */
    public static function forgetInstances()
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::forgetInstances();
    }

    /**
     * Set the globally available instance of the container.
     *
     * @return static
     * @static
     */
    public static function getInstance()
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::getInstance();
    }

    /**
     * Set the shared instance of the container.
     *
     * @param \Illuminate\Contracts\Container\Container|null $container
     * @return static
     * @static
     */
    public static function setInstance($container = null)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::setInstance($container);
    }

    /**
     * Determine if a given offset exists.
     *
     * @param string $key
     * @return bool
     * @static
     */
    public static function offsetExists($key)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::offsetExists($key);
    }

    /**
     * Get the value at a given offset.
     *
     * @param string $key
     * @return mixed
     * @static
     */
    public static function offsetGet($key)
    {
        //Method inherited from \Illuminate\Container\Container
        return \Illuminate\Foundation\Application::offsetGet($key);
    }

    /**
     * Set the value at a given offset.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     * @static
     */
    public static function offsetSet($key, $value)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::offsetSet($key, $value);
    }

    /**
     * Unset the value at a given offset.
     *
     * @param string $key
     * @return void
     * @static
     */
    public static function offsetUnset($key)
    {
        //Method inherited from \Illuminate\Container\Container
        \Illuminate\Foundation\Application::offsetUnset($key);
    }

}
