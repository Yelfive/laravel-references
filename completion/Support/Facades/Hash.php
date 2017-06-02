<?php

namespace Illuminate\Support\Facades {



    /**
     * @see Illuminate\Support\Facades\Hash
     * @see Illuminate\Hashing\BcryptHasher
     */
    class Hash
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
         * Default crypt cost factor.
         *
         * @var int
         */
        protected $rounds;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Hash::getFacadeAccessor()
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
         * Hash the given value.
         *
         * @param string $value
         * @param array $options
         * @return string
         *
         * @throws \RuntimeException
         * @see \Illuminate\Hashing\BcryptHasher::make()
         */
        public static function make($value, array $options = [])
        {
        }

        /**
         * Check the given plain value against a hash.
         *
         * @param string $value
         * @param string $hashedValue
         * @param array $options
         * @return bool
         * @see \Illuminate\Hashing\BcryptHasher::check()
         */
        public static function check($value, $hashedValue, array $options = [])
        {
        }

        /**
         * Check if the given hash has been hashed using the given options.
         *
         * @param string $hashedValue
         * @param array $options
         * @return bool
         * @see \Illuminate\Hashing\BcryptHasher::needsRehash()
         */
        public static function needsRehash($hashedValue, array $options = [])
        {
        }

        /**
         * Set the default password work factor.
         *
         * @param int $rounds
         * @return \Illuminate\Hashing\BcryptHasher
         * @see \Illuminate\Hashing\BcryptHasher::setRounds()
         */
        public static function setRounds($rounds)
        {
        }

        /**
         * Extract the cost value from the options array.
         *
         * @param array $options
         * @return int
         * @see \Illuminate\Hashing\BcryptHasher::cost()
         */
        protected static function cost(array $options = [])
        {
        }

    }
}

namespace {
    class Hash extends Illuminate\Support\Facades\Hash
    {
    }
}