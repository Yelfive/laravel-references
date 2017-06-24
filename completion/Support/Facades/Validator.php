<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\Translation\Translator;
    use Illuminate\Contracts\Container\Container;
    use Closure;
    use Illuminate\Validation\PresenceVerifierInterface;

    /**
     * @see \Illuminate\Support\Facades\Validator
     * @see \Illuminate\Validation\Factory
     */
    class Validator
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
         * The Translator implementation.
         *
         * @var \Illuminate\Contracts\Translation\Translator
         */
        protected $translator;

        /**
         * The Presence Verifier implementation.
         *
         * @var \Illuminate\Validation\PresenceVerifierInterface
         */
        protected $verifier;

        /**
         * The IoC container instance.
         *
         * @var \Illuminate\Contracts\Container\Container
         */
        protected $container;

        /**
         * All of the custom validator extensions.
         *
         * @var array
         */
        protected $extensions;

        /**
         * All of the custom implicit validator extensions.
         *
         * @var array
         */
        protected $implicitExtensions;

        /**
         * All of the custom dependent validator extensions.
         *
         * @var array
         */
        protected $dependentExtensions;

        /**
         * All of the custom validator message replacers.
         *
         * @var array
         */
        protected $replacers;

        /**
         * All of the fallback messages for custom rules.
         *
         * @var array
         */
        protected $fallbackMessages;

        /**
         * The Validator resolver instance.
         *
         * @var Closure
         */
        protected $resolver;

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
         * Create a new Validator factory instance.
         *
         * @param \Illuminate\Contracts\Translation\Translator $translator
         * @param \Illuminate\Contracts\Container\Container $container
         * 
         * @see \Illuminate\Validation\Factory::__construct()
         */
        public function __construct(Translator $translator, Container $container = null)
        {
        }

        /**
         * Create a new Validator instance.
         *
         * @param array $data
         * @param array $rules
         * @param array $messages
         * @param array $customAttributes
         * @return \Illuminate\Validation\Validator
         * @see \Illuminate\Validation\Factory::make()
         */
        public static function make(array $data, array $rules, array $messages = [], array $customAttributes = [])
        {
        }

        /**
         * Validate the given data against the provided rules.
         *
         * @param array $data
         * @param array $rules
         * @param array $messages
         * @param array $customAttributes
         * @return null
         *
         * @throws \Illuminate\Validation\ValidationException
         * @see \Illuminate\Validation\Factory::validate()
         */
        public static function validate(array $data, array $rules, array $messages = [], array $customAttributes = [])
        {
        }

        /**
         * Register a custom validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return null
         * @see \Illuminate\Validation\Factory::extend()
         */
        public static function extend($rule, $extension, $message = null)
        {
        }

        /**
         * Register a custom implicit validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return null
         * @see \Illuminate\Validation\Factory::extendImplicit()
         */
        public static function extendImplicit($rule, $extension, $message = null)
        {
        }

        /**
         * Register a custom implicit validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return null
         * @see \Illuminate\Validation\Factory::extendDependent()
         */
        public static function extendDependent($rule, $extension, $message = null)
        {
        }

        /**
         * Register a custom implicit validator message replacer.
         *
         * @param string $rule
         * @param \Closure|string $replacer
         * @return null
         * @see \Illuminate\Validation\Factory::replacer()
         */
        public static function replacer($rule, $replacer)
        {
        }

        /**
         * Set the Validator instance resolver.
         *
         * @param \Closure $resolver
         * @return null
         * @see \Illuminate\Validation\Factory::resolver()
         */
        public static function resolver(Closure $resolver)
        {
        }

        /**
         * Get the Translator implementation.
         *
         * @return \Illuminate\Contracts\Translation\Translator
         * @see \Illuminate\Validation\Factory::getTranslator()
         */
        public static function getTranslator()
        {
        }

        /**
         * Get the Presence Verifier implementation.
         *
         * @return \Illuminate\Validation\PresenceVerifierInterface
         * @see \Illuminate\Validation\Factory::getPresenceVerifier()
         */
        public static function getPresenceVerifier()
        {
        }

        /**
         * Set the Presence Verifier implementation.
         *
         * @param \Illuminate\Validation\PresenceVerifierInterface $presenceVerifier
         * @return null
         * @see \Illuminate\Validation\Factory::setPresenceVerifier()
         */
        public static function setPresenceVerifier(PresenceVerifierInterface $presenceVerifier)
        {
        }

    }
}

namespace {
    class Validator extends Illuminate\Support\Facades\Validator
    {
    }
}