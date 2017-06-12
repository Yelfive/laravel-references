<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\Container\Container;

    /**
     * @see Illuminate\Support\Facades\Gate
     * @see Illuminate\Auth\Access\Gate
     */
    class Gate
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
         * The container instance.
         *
         * @var \Illuminate\Contracts\Container\Container
         */
        protected $container;

        /**
         * The user resolver callable.
         *
         * @var callable
         */
        protected $userResolver;

        /**
         * All of the defined abilities.
         *
         * @var array
         */
        protected $abilities;

        /**
         * All of the defined policies.
         *
         * @var array
         */
        protected $policies;

        /**
         * All of the registered before callbacks.
         *
         * @var array
         */
        protected $beforeCallbacks;

        /**
         * All of the registered after callbacks.
         *
         * @var array
         */
        protected $afterCallbacks;

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
         * Create a new gate instance.
         *
         * @param \Illuminate\Contracts\Container\Container $container
         * @param callable $userResolver
         * @param array $abilities
         * @param array $policies
         * @param array $beforeCallbacks
         * @param array $afterCallbacks
         * 
         * @see \Illuminate\Auth\Access\Gate::__construct()
         */
        public function __construct(Container $container, callable $userResolver, array $abilities = [], array $policies = [], array $beforeCallbacks = [], array $afterCallbacks = [])
        {
        }

        /**
         * Determine if a given ability has been defined.
         *
         * @param string $ability
         * @return bool
         * @see \Illuminate\Auth\Access\Gate::has()
         */
        public static function has($ability)
        {
        }

        /**
         * Define a new ability.
         *
         * @param string $ability
         * @param callable|string $callback
         * @return \Illuminate\Auth\Access\Gate
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Auth\Access\Gate::define()
         */
        public static function define($ability, $callback)
        {
        }

        /**
         * Define a policy class for a given class type.
         *
         * @param string $class
         * @param string $policy
         * @return \Illuminate\Auth\Access\Gate
         * @see \Illuminate\Auth\Access\Gate::policy()
         */
        public static function policy($class, $policy)
        {
        }

        /**
         * Register a callback to run before all Gate checks.
         *
         * @param callable $callback
         * @return \Illuminate\Auth\Access\Gate
         * @see \Illuminate\Auth\Access\Gate::before()
         */
        public static function before(callable $callback)
        {
        }

        /**
         * Register a callback to run after all Gate checks.
         *
         * @param callable $callback
         * @return \Illuminate\Auth\Access\Gate
         * @see \Illuminate\Auth\Access\Gate::after()
         */
        public static function after(callable $callback)
        {
        }

        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool
         * @see \Illuminate\Auth\Access\Gate::allows()
         */
        public static function allows($ability, $arguments = [])
        {
        }

        /**
         * Determine if the given ability should be denied for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool
         * @see \Illuminate\Auth\Access\Gate::denies()
         */
        public static function denies($ability, $arguments = [])
        {
        }

        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool
         * @see \Illuminate\Auth\Access\Gate::check()
         */
        public static function check($ability, $arguments = [])
        {
        }

        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return \Illuminate\Auth\Access\Response
         *
         * @throws \Illuminate\Auth\Access\AuthorizationException
         * @see \Illuminate\Auth\Access\Gate::authorize()
         */
        public static function authorize($ability, $arguments = [])
        {
        }

        /**
         * Get a policy instance for a given class.
         *
         * @param object|string $class
         * @return mixed
         * @see \Illuminate\Auth\Access\Gate::getPolicyFor()
         */
        public static function getPolicyFor($class)
        {
        }

        /**
         * Build a policy class instance of the given type.
         *
         * @param object|string $class
         * @return mixed
         * @see \Illuminate\Auth\Access\Gate::resolvePolicy()
         */
        public static function resolvePolicy($class)
        {
        }

        /**
         * Get a gate instance for the given user.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable|mixed $user
         * @return static
         * @see \Illuminate\Auth\Access\Gate::forUser()
         */
        public static function forUser($user)
        {
        }

    }
}

namespace {
    class Gate extends Illuminate\Support\Facades\Gate
    {
    }
}