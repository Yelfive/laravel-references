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
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Gate::getFacadeAccessor()
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
         * Create the ability callback for a callback string.
         *
         * @param string $callback
         * @return \Closure
         * @see \Illuminate\Auth\Access\Gate::buildAbilityCallback()
         */
        protected static function buildAbilityCallback($callback)
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
         * Get the raw result from the authorization callback.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return mixed
         * @see \Illuminate\Auth\Access\Gate::raw()
         */
        protected static function raw($ability, $arguments = [])
        {
        }

        /**
         * Resolve and call the appropriate authorization callback.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param string $ability
         * @param array $arguments
         * @return bool
         * @see \Illuminate\Auth\Access\Gate::callAuthCallback()
         */
        protected static function callAuthCallback($user, $ability, array $arguments)
        {
        }

        /**
         * Call all of the before callbacks and return if a result is given.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param string $ability
         * @param array $arguments
         * @return bool|null
         * @see \Illuminate\Auth\Access\Gate::callBeforeCallbacks()
         */
        protected static function callBeforeCallbacks($user, $ability, array $arguments)
        {
        }

        /**
         * Call all of the after callbacks with check result.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param string $ability
         * @param array $arguments
         * @param bool $result
         * @return null
         * @see \Illuminate\Auth\Access\Gate::callAfterCallbacks()
         */
        protected static function callAfterCallbacks($user, $ability, array $arguments, $result)
        {
        }

        /**
         * Resolve the callable for the given ability and arguments.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param string $ability
         * @param array $arguments
         * @return callable
         * @see \Illuminate\Auth\Access\Gate::resolveAuthCallback()
         */
        protected static function resolveAuthCallback($user, $ability, array $arguments)
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
         * Resolve the callback for a policy check.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param string $ability
         * @param array $arguments
         * @param mixed $policy
         * @return callable
         * @see \Illuminate\Auth\Access\Gate::resolvePolicyCallback()
         */
        protected static function resolvePolicyCallback($user, $ability, array $arguments, $policy)
        {
        }

        /**
         * Call the "before" method on the given policy, if applicable.
         *
         * @param mixed $policy
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param string $ability
         * @param array $arguments
         * @return mixed
         * @see \Illuminate\Auth\Access\Gate::callPolicyBefore()
         */
        protected static function callPolicyBefore($policy, $user, $ability, $arguments)
        {
        }

        /**
         * Format the policy ability into a method name.
         *
         * @param string $ability
         * @return string
         * @see \Illuminate\Auth\Access\Gate::formatAbilityToMethod()
         */
        protected static function formatAbilityToMethod($ability)
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

        /**
         * Resolve the user from the user resolver.
         *
         * @return mixed
         * @see \Illuminate\Auth\Access\Gate::resolveUser()
         */
        protected static function resolveUser()
        {
        }

        /**
         * Create a new access response.
         *
         * @param string|null $message
         * @return \Illuminate\Auth\Access\Response
         * @see \Illuminate\Auth\Access\Gate::allow()
         */
        protected static function allow($message = null)
        {
        }

        /**
         * Throws an unauthorized exception.
         *
         * @param string $message
         * @return null
         *
         * @throws \Illuminate\Auth\Access\AuthorizationException
         * @see \Illuminate\Auth\Access\Gate::deny()
         */
        protected static function deny($message = 'This action is unauthorized.')
        {
        }

    }
}

namespace {
    class Gate extends Illuminate\Support\Facades\Gate
    {
    }
}