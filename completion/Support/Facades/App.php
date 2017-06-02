<?php

namespace Illuminate\Support\Facades {

    use Closure;
    use Illuminate\Support\ServiceProvider;
    use Symfony\Component\HttpFoundation\Request;
    use ReflectionParameter;
    use Illuminate\Contracts\Container\Container;

    /**
     * @see Illuminate\Support\Facades\App
     * @see Illuminate\Foundation\Application
     */
    class App
    {
        const VERSION = '5.4.18';

        const MASTER_REQUEST = 1;

        const SUB_REQUEST = 2;

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
         * The base path for the Laravel installation.
         *
         * @var string
         */
        protected $basePath;

        /**
         * Indicates if the application has been bootstrapped before.
         *
         * @var bool
         */
        protected $hasBeenBootstrapped;

        /**
         * Indicates if the application has "booted".
         *
         * @var bool
         */
        protected $booted;

        /**
         * The array of booting callbacks.
         *
         * @var array
         */
        protected $bootingCallbacks;

        /**
         * The array of booted callbacks.
         *
         * @var array
         */
        protected $bootedCallbacks;

        /**
         * The array of terminating callbacks.
         *
         * @var array
         */
        protected $terminatingCallbacks;

        /**
         * All of the registered service providers.
         *
         * @var array
         */
        protected $serviceProviders;

        /**
         * The names of the loaded service providers.
         *
         * @var array
         */
        protected $loadedProviders;

        /**
         * The deferred services and their providers.
         *
         * @var array
         */
        protected $deferredServices;

        /**
         * A custom callback used to configure Monolog.
         *
         * @var callable|null
         */
        protected $monologConfigurator;

        /**
         * The custom database path defined by the developer.
         *
         * @var string
         */
        protected $databasePath;

        /**
         * The custom storage path defined by the developer.
         *
         * @var string
         */
        protected $storagePath;

        /**
         * The custom environment path defined by the developer.
         *
         * @var string
         */
        protected $environmentPath;

        /**
         * The environment file to load during bootstrapping.
         *
         * @var string
         */
        protected $environmentFile;

        /**
         * The application namespace.
         *
         * @var string
         */
        protected $namespace;

        /**
         * The current globally available container (if any).
         *
         * @var static
         */
        protected static $instance;

        /**
         * An array of the types that have been resolved.
         *
         * @var array
         */
        protected $resolved;

        /**
         * The container's bindings.
         *
         * @var array
         */
        protected $bindings;

        /**
         * The container's method bindings.
         *
         * @var array
         */
        protected $methodBindings;

        /**
         * The container's shared instances.
         *
         * @var array
         */
        protected $instances;

        /**
         * The registered type aliases.
         *
         * @var array
         */
        protected $aliases;

        /**
         * The registered aliases keyed by the abstract name.
         *
         * @var array
         */
        protected $abstractAliases;

        /**
         * The extension closures for services.
         *
         * @var array
         */
        protected $extenders;

        /**
         * All of the registered tags.
         *
         * @var array
         */
        protected $tags;

        /**
         * The stack of concretions currently being built.
         *
         * @var array
         */
        protected $buildStack;

        /**
         * The parameter override stack.
         *
         * @var array
         */
        protected $with;

        /**
         * The contextual binding map.
         *
         * @var array
         */
        public $contextual;

        /**
         * All of the registered rebound callbacks.
         *
         * @var array
         */
        protected $reboundCallbacks;

        /**
         * All of the global resolving callbacks.
         *
         * @var array
         */
        protected $globalResolvingCallbacks;

        /**
         * All of the global after resolving callbacks.
         *
         * @var array
         */
        protected $globalAfterResolvingCallbacks;

        /**
         * All of the resolving callbacks by class type.
         *
         * @var array
         */
        protected $resolvingCallbacks;

        /**
         * All of the after resolving callbacks by class type.
         *
         * @var array
         */
        protected $afterResolvingCallbacks;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\App::getFacadeAccessor()
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
         * Create a new Illuminate application instance.
         *
         * @param string|null $basePath
         * 
         * @see \Illuminate\Foundation\Application::__construct()
         */
        public function __construct($basePath = null)
        {
        }

        /**
         * Get the version number of the application.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::version()
         */
        public static function version()
        {
        }

        /**
         * Register the basic bindings into the container.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::registerBaseBindings()
         */
        protected static function registerBaseBindings()
        {
        }

        /**
         * Register all of the base service providers.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::registerBaseServiceProviders()
         */
        protected static function registerBaseServiceProviders()
        {
        }

        /**
         * Run the given array of bootstrap classes.
         *
         * @param array $bootstrappers
         * @return null
         * @see \Illuminate\Foundation\Application::bootstrapWith()
         */
        public static function bootstrapWith(array $bootstrappers)
        {
        }

        /**
         * Register a callback to run after loading the environment.
         *
         * @param \Closure $callback
         * @return null
         * @see \Illuminate\Foundation\Application::afterLoadingEnvironment()
         */
        public static function afterLoadingEnvironment(Closure $callback)
        {
        }

        /**
         * Register a callback to run before a bootstrapper.
         *
         * @param string $bootstrapper
         * @param Closure $callback
         * @return null
         * @see \Illuminate\Foundation\Application::beforeBootstrapping()
         */
        public static function beforeBootstrapping($bootstrapper, Closure $callback)
        {
        }

        /**
         * Register a callback to run after a bootstrapper.
         *
         * @param string $bootstrapper
         * @param Closure $callback
         * @return null
         * @see \Illuminate\Foundation\Application::afterBootstrapping()
         */
        public static function afterBootstrapping($bootstrapper, Closure $callback)
        {
        }

        /**
         * Determine if the application has been bootstrapped before.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::hasBeenBootstrapped()
         */
        public static function hasBeenBootstrapped()
        {
        }

        /**
         * Set the base path for the application.
         *
         * @param string $basePath
         * @return \Illuminate\Foundation\Application
         * @see \Illuminate\Foundation\Application::setBasePath()
         */
        public static function setBasePath($basePath)
        {
        }

        /**
         * Bind all of the application paths in the container.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::bindPathsInContainer()
         */
        protected static function bindPathsInContainer()
        {
        }

        /**
         * Get the path to the application "app" directory.
         *
         * @param string $path Optionally, a path to append to the app path
         * @return string
         * @see \Illuminate\Foundation\Application::path()
         */
        public static function path($path = '')
        {
        }

        /**
         * Get the base path of the Laravel installation.
         *
         * @param string $path Optionally, a path to append to the base path
         * @return string
         * @see \Illuminate\Foundation\Application::basePath()
         */
        public static function basePath($path = '')
        {
        }

        /**
         * Get the path to the bootstrap directory.
         *
         * @param string $path Optionally, a path to append to the bootstrap path
         * @return string
         * @see \Illuminate\Foundation\Application::bootstrapPath()
         */
        public static function bootstrapPath($path = '')
        {
        }

        /**
         * Get the path to the application configuration files.
         *
         * @param string $path Optionally, a path to append to the config path
         * @return string
         * @see \Illuminate\Foundation\Application::configPath()
         */
        public static function configPath($path = '')
        {
        }

        /**
         * Get the path to the database directory.
         *
         * @param string $path Optionally, a path to append to the database path
         * @return string
         * @see \Illuminate\Foundation\Application::databasePath()
         */
        public static function databasePath($path = '')
        {
        }

        /**
         * Set the database directory.
         *
         * @param string $path
         * @return \Illuminate\Foundation\Application
         * @see \Illuminate\Foundation\Application::useDatabasePath()
         */
        public static function useDatabasePath($path)
        {
        }

        /**
         * Get the path to the language files.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::langPath()
         */
        public static function langPath()
        {
        }

        /**
         * Get the path to the public / web directory.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::publicPath()
         */
        public static function publicPath()
        {
        }

        /**
         * Get the path to the storage directory.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::storagePath()
         */
        public static function storagePath()
        {
        }

        /**
         * Set the storage directory.
         *
         * @param string $path
         * @return \Illuminate\Foundation\Application
         * @see \Illuminate\Foundation\Application::useStoragePath()
         */
        public static function useStoragePath($path)
        {
        }

        /**
         * Get the path to the resources directory.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Foundation\Application::resourcePath()
         */
        public static function resourcePath($path = '')
        {
        }

        /**
         * Get the path to the environment file directory.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::environmentPath()
         */
        public static function environmentPath()
        {
        }

        /**
         * Set the directory for the environment file.
         *
         * @param string $path
         * @return \Illuminate\Foundation\Application
         * @see \Illuminate\Foundation\Application::useEnvironmentPath()
         */
        public static function useEnvironmentPath($path)
        {
        }

        /**
         * Set the environment file to be loaded during bootstrapping.
         *
         * @param string $file
         * @return \Illuminate\Foundation\Application
         * @see \Illuminate\Foundation\Application::loadEnvironmentFrom()
         */
        public static function loadEnvironmentFrom($file)
        {
        }

        /**
         * Get the environment file the application is using.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::environmentFile()
         */
        public static function environmentFile()
        {
        }

        /**
         * Get the fully qualified path to the environment file.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::environmentFilePath()
         */
        public static function environmentFilePath()
        {
        }

        /**
         * Get or check the current application environment.
         *
         * @return string|bool
         * @see \Illuminate\Foundation\Application::environment()
         */
        public static function environment()
        {
        }

        /**
         * Determine if application is in local environment.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::isLocal()
         */
        public static function isLocal()
        {
        }

        /**
         * Detect the application's current environment.
         *
         * @param \Closure $callback
         * @return string
         * @see \Illuminate\Foundation\Application::detectEnvironment()
         */
        public static function detectEnvironment(Closure $callback)
        {
        }

        /**
         * Determine if we are running in the console.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::runningInConsole()
         */
        public static function runningInConsole()
        {
        }

        /**
         * Determine if we are running unit tests.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::runningUnitTests()
         */
        public static function runningUnitTests()
        {
        }

        /**
         * Register all of the configured providers.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::registerConfiguredProviders()
         */
        public static function registerConfiguredProviders()
        {
        }

        /**
         * Register a service provider with the application.
         *
         * @param \Illuminate\Support\ServiceProvider|string $provider
         * @param array $options
         * @param bool $force
         * @return \Illuminate\Support\ServiceProvider
         * @see \Illuminate\Foundation\Application::register()
         */
        public static function register($provider, $options = [], $force = false)
        {
        }

        /**
         * Get the registered service provider instance if it exists.
         *
         * @param \Illuminate\Support\ServiceProvider|string $provider
         * @return \Illuminate\Support\ServiceProvider|null
         * @see \Illuminate\Foundation\Application::getProvider()
         */
        public static function getProvider($provider)
        {
        }

        /**
         * Resolve a service provider instance from the class name.
         *
         * @param string $provider
         * @return \Illuminate\Support\ServiceProvider
         * @see \Illuminate\Foundation\Application::resolveProvider()
         */
        public static function resolveProvider($provider)
        {
        }

        /**
         * Mark the given provider as registered.
         *
         * @param \Illuminate\Support\ServiceProvider $provider
         * @return null
         * @see \Illuminate\Foundation\Application::markAsRegistered()
         */
        protected static function markAsRegistered($provider)
        {
        }

        /**
         * Load and boot all of the remaining deferred providers.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::loadDeferredProviders()
         */
        public static function loadDeferredProviders()
        {
        }

        /**
         * Load the provider for a deferred service.
         *
         * @param string $service
         * @return null
         * @see \Illuminate\Foundation\Application::loadDeferredProvider()
         */
        public static function loadDeferredProvider($service)
        {
        }

        /**
         * Register a deferred provider and service.
         *
         * @param string $provider
         * @param string $service
         * @return null
         * @see \Illuminate\Foundation\Application::registerDeferredProvider()
         */
        public static function registerDeferredProvider($provider, $service = null)
        {
        }

        /**
         * Resolve the given type from the container.
         *
         * (Overriding Container::make)
         *
         * @param string $abstract
         * @return mixed
         * @see \Illuminate\Foundation\Application::make()
         */
        public static function make($abstract)
        {
        }

        /**
         * Determine if the given abstract type has been bound.
         *
         * (Overriding Container::bound)
         *
         * @param string $abstract
         * @return bool
         * @see \Illuminate\Foundation\Application::bound()
         */
        public static function bound($abstract)
        {
        }

        /**
         * Determine if the application has booted.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::isBooted()
         */
        public static function isBooted()
        {
        }

        /**
         * Boot the application's service providers.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::boot()
         */
        public static function boot()
        {
        }

        /**
         * Boot the given service provider.
         *
         * @param \Illuminate\Support\ServiceProvider $provider
         * @return mixed
         * @see \Illuminate\Foundation\Application::bootProvider()
         */
        protected static function bootProvider(ServiceProvider $provider)
        {
        }

        /**
         * Register a new boot listener.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Foundation\Application::booting()
         */
        public static function booting($callback)
        {
        }

        /**
         * Register a new "booted" listener.
         *
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Foundation\Application::booted()
         */
        public static function booted($callback)
        {
        }

        /**
         * Call the booting callbacks for the application.
         *
         * @param array $callbacks
         * @return null
         * @see \Illuminate\Foundation\Application::fireAppCallbacks()
         */
        protected static function fireAppCallbacks(array $callbacks)
        {
        }

        /**
         * {@inheritdoc}
         * @see \Illuminate\Foundation\Application::handle()
         */
        public static function handle(Request $request, $type = 1, $catch = true)
        {
        }

        /**
         * Determine if middleware has been disabled for the application.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::shouldSkipMiddleware()
         */
        public static function shouldSkipMiddleware()
        {
        }

        /**
         * Get the path to the cached services.php file.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::getCachedServicesPath()
         */
        public static function getCachedServicesPath()
        {
        }

        /**
         * Determine if the application configuration is cached.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::configurationIsCached()
         */
        public static function configurationIsCached()
        {
        }

        /**
         * Get the path to the configuration cache file.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::getCachedConfigPath()
         */
        public static function getCachedConfigPath()
        {
        }

        /**
         * Determine if the application routes are cached.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::routesAreCached()
         */
        public static function routesAreCached()
        {
        }

        /**
         * Get the path to the routes cache file.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::getCachedRoutesPath()
         */
        public static function getCachedRoutesPath()
        {
        }

        /**
         * Determine if the application is currently down for maintenance.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::isDownForMaintenance()
         */
        public static function isDownForMaintenance()
        {
        }

        /**
         * Throw an HttpException with the given data.
         *
         * @param int $code
         * @param string $message
         * @param array $headers
         * @return null
         *
         * @throws \Symfony\Component\HttpKernel\Exception\HttpException
         * @see \Illuminate\Foundation\Application::abort()
         */
        public static function abort($code, $message = '', array $headers = [])
        {
        }

        /**
         * Register a terminating callback with the application.
         *
         * @param \Closure $callback
         * @return \Illuminate\Foundation\Application
         * @see \Illuminate\Foundation\Application::terminating()
         */
        public static function terminating(Closure $callback)
        {
        }

        /**
         * Terminate the application.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::terminate()
         */
        public static function terminate()
        {
        }

        /**
         * Get the service providers that have been loaded.
         *
         * @return array
         * @see \Illuminate\Foundation\Application::getLoadedProviders()
         */
        public static function getLoadedProviders()
        {
        }

        /**
         * Get the application's deferred services.
         *
         * @return array
         * @see \Illuminate\Foundation\Application::getDeferredServices()
         */
        public static function getDeferredServices()
        {
        }

        /**
         * Set the application's deferred services.
         *
         * @param array $services
         * @return null
         * @see \Illuminate\Foundation\Application::setDeferredServices()
         */
        public static function setDeferredServices(array $services)
        {
        }

        /**
         * Add an array of services to the application's deferred services.
         *
         * @param array $services
         * @return null
         * @see \Illuminate\Foundation\Application::addDeferredServices()
         */
        public static function addDeferredServices(array $services)
        {
        }

        /**
         * Determine if the given service is a deferred service.
         *
         * @param string $service
         * @return bool
         * @see \Illuminate\Foundation\Application::isDeferredService()
         */
        public static function isDeferredService($service)
        {
        }

        /**
         * Configure the real-time facade namespace.
         *
         * @param string $namespace
         * @return null
         * @see \Illuminate\Foundation\Application::provideFacades()
         */
        public static function provideFacades($namespace)
        {
        }

        /**
         * Define a callback to be used to configure Monolog.
         *
         * @param callable $callback
         * @return \Illuminate\Foundation\Application
         * @see \Illuminate\Foundation\Application::configureMonologUsing()
         */
        public static function configureMonologUsing(callable $callback)
        {
        }

        /**
         * Determine if the application has a custom Monolog configurator.
         *
         * @return bool
         * @see \Illuminate\Foundation\Application::hasMonologConfigurator()
         */
        public static function hasMonologConfigurator()
        {
        }

        /**
         * Get the custom Monolog configurator for the application.
         *
         * @return callable
         * @see \Illuminate\Foundation\Application::getMonologConfigurator()
         */
        public static function getMonologConfigurator()
        {
        }

        /**
         * Get the current application locale.
         *
         * @return string
         * @see \Illuminate\Foundation\Application::getLocale()
         */
        public static function getLocale()
        {
        }

        /**
         * Set the current application locale.
         *
         * @param string $locale
         * @return null
         * @see \Illuminate\Foundation\Application::setLocale()
         */
        public static function setLocale($locale)
        {
        }

        /**
         * Determine if application locale is the given locale.
         *
         * @param string $locale
         * @return bool
         * @see \Illuminate\Foundation\Application::isLocale()
         */
        public static function isLocale($locale)
        {
        }

        /**
         * Register the core class aliases in the container.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::registerCoreContainerAliases()
         */
        public static function registerCoreContainerAliases()
        {
        }

        /**
         * Flush the container of all bindings and resolved instances.
         *
         * @return null
         * @see \Illuminate\Foundation\Application::flush()
         */
        public static function flush()
        {
        }

        /**
         * Get the application namespace.
         *
         * @return string
         *
         * @throws \RuntimeException
         * @see \Illuminate\Foundation\Application::getNamespace()
         */
        public static function getNamespace()
        {
        }

        /**
         * Define a contextual binding.
         *
         * @param string $concrete
         * @return \Illuminate\Contracts\Container\ContextualBindingBuilder
         * @see \Illuminate\Container\Container::when()
         */
        public static function when($concrete)
        {
        }

        /**
         * Determine if the given abstract type has been resolved.
         *
         * @param string $abstract
         * @return bool
         * @see \Illuminate\Container\Container::resolved()
         */
        public static function resolved($abstract)
        {
        }

        /**
         * Determine if a given type is shared.
         *
         * @param string $abstract
         * @return bool
         * @see \Illuminate\Container\Container::isShared()
         */
        public static function isShared($abstract)
        {
        }

        /**
         * Determine if a given string is an alias.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Container\Container::isAlias()
         */
        public static function isAlias($name)
        {
        }

        /**
         * Register a binding with the container.
         *
         * @param string|array $abstract
         * @param \Closure|string|null $concrete
         * @param bool $shared
         * @return null
         * @see \Illuminate\Container\Container::bind()
         */
        public static function bind($abstract, $concrete = null, $shared = false)
        {
        }

        /**
         * Get the Closure to be used when building a type.
         *
         * @param string $abstract
         * @param string $concrete
         * @return \Closure
         * @see \Illuminate\Container\Container::getClosure()
         */
        protected static function getClosure($abstract, $concrete)
        {
        }

        /**
         * Determine if the container has a method binding.
         *
         * @param string $method
         * @return bool
         * @see \Illuminate\Container\Container::hasMethodBinding()
         */
        public static function hasMethodBinding($method)
        {
        }

        /**
         * Bind a callback to resolve with Container::call.
         *
         * @param string $method
         * @param \Closure $callback
         * @return null
         * @see \Illuminate\Container\Container::bindMethod()
         */
        public static function bindMethod($method, $callback)
        {
        }

        /**
         * Get the method binding for the given method.
         *
         * @param string $method
         * @param mixed $instance
         * @return mixed
         * @see \Illuminate\Container\Container::callMethodBinding()
         */
        public static function callMethodBinding($method, $instance)
        {
        }

        /**
         * Add a contextual binding to the container.
         *
         * @param string $concrete
         * @param string $abstract
         * @param \Closure|string $implementation
         * @return null
         * @see \Illuminate\Container\Container::addContextualBinding()
         */
        public static function addContextualBinding($concrete, $abstract, $implementation)
        {
        }

        /**
         * Register a binding if it hasn't already been registered.
         *
         * @param string $abstract
         * @param \Closure|string|null $concrete
         * @param bool $shared
         * @return null
         * @see \Illuminate\Container\Container::bindIf()
         */
        public static function bindIf($abstract, $concrete = null, $shared = false)
        {
        }

        /**
         * Register a shared binding in the container.
         *
         * @param string|array $abstract
         * @param \Closure|string|null $concrete
         * @return null
         * @see \Illuminate\Container\Container::singleton()
         */
        public static function singleton($abstract, $concrete = null)
        {
        }

        /**
         * "Extend" an abstract type in the container.
         *
         * @param string $abstract
         * @param \Closure $closure
         * @return null
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Container\Container::extend()
         */
        public static function extend($abstract, Closure $closure)
        {
        }

        /**
         * Register an existing instance as shared in the container.
         *
         * @param string $abstract
         * @param mixed $instance
         * @return null
         * @see \Illuminate\Container\Container::instance()
         */
        public static function instance($abstract, $instance)
        {
        }

        /**
         * Remove an alias from the contextual binding alias cache.
         *
         * @param string $searched
         * @return null
         * @see \Illuminate\Container\Container::removeAbstractAlias()
         */
        protected static function removeAbstractAlias($searched)
        {
        }

        /**
         * Assign a set of tags to a given binding.
         *
         * @param array|string $abstracts
         * @param array|mixed ...$tags
         * @return null
         * @see \Illuminate\Container\Container::tag()
         */
        public static function tag($abstracts, $tags)
        {
        }

        /**
         * Resolve all of the bindings for a given tag.
         *
         * @param string $tag
         * @return array
         * @see \Illuminate\Container\Container::tagged()
         */
        public static function tagged($tag)
        {
        }

        /**
         * Alias a type to a different name.
         *
         * @param string $abstract
         * @param string $alias
         * @return null
         * @see \Illuminate\Container\Container::alias()
         */
        public static function alias($abstract, $alias)
        {
        }

        /**
         * Bind a new callback to an abstract's rebind event.
         *
         * @param string $abstract
         * @param \Closure $callback
         * @return mixed
         * @see \Illuminate\Container\Container::rebinding()
         */
        public static function rebinding($abstract, Closure $callback)
        {
        }

        /**
         * Refresh an instance on the given target and method.
         *
         * @param string $abstract
         * @param mixed $target
         * @param string $method
         * @return mixed
         * @see \Illuminate\Container\Container::refresh()
         */
        public static function refresh($abstract, $target, $method)
        {
        }

        /**
         * Fire the "rebound" callbacks for the given abstract type.
         *
         * @param string $abstract
         * @return null
         * @see \Illuminate\Container\Container::rebound()
         */
        protected static function rebound($abstract)
        {
        }

        /**
         * Get the rebound callbacks for a given type.
         *
         * @param string $abstract
         * @return array
         * @see \Illuminate\Container\Container::getReboundCallbacks()
         */
        protected static function getReboundCallbacks($abstract)
        {
        }

        /**
         * Wrap the given closure such that its dependencies will be injected when executed.
         *
         * @param \Closure $callback
         * @param array $parameters
         * @return \Closure
         * @see \Illuminate\Container\Container::wrap()
         */
        public static function wrap(Closure $callback, array $parameters = [])
        {
        }

        /**
         * Call the given Closure / class@method and inject its dependencies.
         *
         * @param callable|string $callback
         * @param array $parameters
         * @param string|null $defaultMethod
         * @return mixed
         * @see \Illuminate\Container\Container::call()
         */
        public static function call($callback, array $parameters = [], $defaultMethod = null)
        {
        }

        /**
         * Get a closure to resolve the given type from the container.
         *
         * @param string $abstract
         * @return \Closure
         * @see \Illuminate\Container\Container::factory()
         */
        public static function factory($abstract)
        {
        }

        /**
         * Resolve the given type with the given parameter overrides.
         *
         * @param string $abstract
         * @param array $parameters
         * @return mixed
         * @see \Illuminate\Container\Container::makeWith()
         */
        public static function makeWith($abstract, array $parameters)
        {
        }

        /**
         * Resolve the given type from the container.
         *
         * @param string $abstract
         * @param array $parameters
         * @return mixed
         * @see \Illuminate\Container\Container::resolve()
         */
        protected static function resolve($abstract, $parameters = [])
        {
        }

        /**
         * Get the concrete type for a given abstract.
         *
         * @param string $abstract
         * @return mixed $concrete
         * @see \Illuminate\Container\Container::getConcrete()
         */
        protected static function getConcrete($abstract)
        {
        }

        /**
         * Get the contextual concrete binding for the given abstract.
         *
         * @param string $abstract
         * @return string|null
         * @see \Illuminate\Container\Container::getContextualConcrete()
         */
        protected static function getContextualConcrete($abstract)
        {
        }

        /**
         * Find the concrete binding for the given abstract in the contextual binding array.
         *
         * @param string $abstract
         * @return string|null
         * @see \Illuminate\Container\Container::findInContextualBindings()
         */
        protected static function findInContextualBindings($abstract)
        {
        }

        /**
         * Determine if the given concrete is buildable.
         *
         * @param mixed $concrete
         * @param string $abstract
         * @return bool
         * @see \Illuminate\Container\Container::isBuildable()
         */
        protected static function isBuildable($concrete, $abstract)
        {
        }

        /**
         * Instantiate a concrete instance of the given type.
         *
         * @param string $concrete
         * @return mixed
         *
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         * @see \Illuminate\Container\Container::build()
         */
        public static function build($concrete)
        {
        }

        /**
         * Resolve all of the dependencies from the ReflectionParameters.
         *
         * @param array $dependencies
         * @return array
         * @see \Illuminate\Container\Container::resolveDependencies()
         */
        protected static function resolveDependencies(array $dependencies)
        {
        }

        /**
         * Determine if the given dependency has a parameter override from makeWith.
         *
         * @param \ReflectionParameter $dependency
         * @return bool
         * @see \Illuminate\Container\Container::hasParameterOverride()
         */
        protected static function hasParameterOverride($dependency)
        {
        }

        /**
         * Get a parameter override for a dependency.
         *
         * @param \ReflectionParameter $dependency
         * @return mixed
         * @see \Illuminate\Container\Container::getParameterOverride()
         */
        protected static function getParameterOverride($dependency)
        {
        }

        /**
         * Resolve a non-class hinted primitive dependency.
         *
         * @param \ReflectionParameter $parameter
         * @return mixed
         *
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         * @see \Illuminate\Container\Container::resolvePrimitive()
         */
        protected static function resolvePrimitive(ReflectionParameter $parameter)
        {
        }

        /**
         * Resolve a class based dependency from the container.
         *
         * @param \ReflectionParameter $parameter
         * @return mixed
         *
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         * @see \Illuminate\Container\Container::resolveClass()
         */
        protected static function resolveClass(ReflectionParameter $parameter)
        {
        }

        /**
         * Throw an exception that the concrete is not instantiable.
         *
         * @param string $concrete
         * @return null
         *
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         * @see \Illuminate\Container\Container::notInstantiable()
         */
        protected static function notInstantiable($concrete)
        {
        }

        /**
         * Throw an exception for an unresolvable primitive.
         *
         * @param \ReflectionParameter $parameter
         * @return null
         *
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         * @see \Illuminate\Container\Container::unresolvablePrimitive()
         */
        protected static function unresolvablePrimitive(ReflectionParameter $parameter)
        {
        }

        /**
         * Register a new resolving callback.
         *
         * @param string $abstract
         * @param \Closure|null $callback
         * @return null
         * @see \Illuminate\Container\Container::resolving()
         */
        public static function resolving($abstract, Closure $callback = null)
        {
        }

        /**
         * Register a new after resolving callback for all types.
         *
         * @param string $abstract
         * @param \Closure|null $callback
         * @return null
         * @see \Illuminate\Container\Container::afterResolving()
         */
        public static function afterResolving($abstract, Closure $callback = null)
        {
        }

        /**
         * Fire all of the resolving callbacks.
         *
         * @param string $abstract
         * @param mixed $object
         * @return null
         * @see \Illuminate\Container\Container::fireResolvingCallbacks()
         */
        protected static function fireResolvingCallbacks($abstract, $object)
        {
        }

        /**
         * Fire all of the after resolving callbacks.
         *
         * @param string $abstract
         * @param mixed $object
         * @return null
         * @see \Illuminate\Container\Container::fireAfterResolvingCallbacks()
         */
        protected static function fireAfterResolvingCallbacks($abstract, $object)
        {
        }

        /**
         * Get all callbacks for a given type.
         *
         * @param string $abstract
         * @param object $object
         * @param array $callbacksPerType
         *
         * @return array
         * @see \Illuminate\Container\Container::getCallbacksForType()
         */
        protected static function getCallbacksForType($abstract, $object, array $callbacksPerType)
        {
        }

        /**
         * Fire an array of callbacks with an object.
         *
         * @param mixed $object
         * @param array $callbacks
         * @return null
         * @see \Illuminate\Container\Container::fireCallbackArray()
         */
        protected static function fireCallbackArray($object, array $callbacks)
        {
        }

        /**
         * Get the container's bindings.
         *
         * @return array
         * @see \Illuminate\Container\Container::getBindings()
         */
        public static function getBindings()
        {
        }

        /**
         * Get the alias for an abstract if available.
         *
         * @param string $abstract
         * @return string
         *
         * @throws \LogicException
         * @see \Illuminate\Container\Container::getAlias()
         */
        public static function getAlias($abstract)
        {
        }

        /**
         * Get the extender callbacks for a given type.
         *
         * @param string $abstract
         * @return array
         * @see \Illuminate\Container\Container::getExtenders()
         */
        protected static function getExtenders($abstract)
        {
        }

        /**
         * Drop all of the stale instances and aliases.
         *
         * @param string $abstract
         * @return null
         * @see \Illuminate\Container\Container::dropStaleInstances()
         */
        protected static function dropStaleInstances($abstract)
        {
        }

        /**
         * Remove a resolved instance from the instance cache.
         *
         * @param string $abstract
         * @return null
         * @see \Illuminate\Container\Container::forgetInstance()
         */
        public static function forgetInstance($abstract)
        {
        }

        /**
         * Clear all of the instances from the container.
         *
         * @return null
         * @see \Illuminate\Container\Container::forgetInstances()
         */
        public static function forgetInstances()
        {
        }

        /**
         * Set the globally available instance of the container.
         *
         * @return static
         * @see \Illuminate\Container\Container::getInstance()
         */
        public static function getInstance()
        {
        }

        /**
         * Set the shared instance of the container.
         *
         * @param \Illuminate\Contracts\Container\Container|null $container
         * @return static
         * @see \Illuminate\Container\Container::setInstance()
         */
        public static function setInstance(Container $container = null)
        {
        }

        /**
         * Determine if a given offset exists.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Container\Container::offsetExists()
         */
        public static function offsetExists($key)
        {
        }

        /**
         * Get the value at a given offset.
         *
         * @param string $key
         * @return mixed
         * @see \Illuminate\Container\Container::offsetGet()
         */
        public static function offsetGet($key)
        {
        }

        /**
         * Set the value at a given offset.
         *
         * @param string $key
         * @param mixed $value
         * @return null
         * @see \Illuminate\Container\Container::offsetSet()
         */
        public static function offsetSet($key, $value)
        {
        }

        /**
         * Unset the value at a given offset.
         *
         * @param string $key
         * @return null
         * @see \Illuminate\Container\Container::offsetUnset()
         */
        public static function offsetUnset($key)
        {
        }

    }
}

namespace {
    class App extends Illuminate\Support\Facades\App
    {
    }
}