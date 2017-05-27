<?php

namespace Illuminate\Support\Facades {



    /**
     * @see Illuminate\Support\Facades\Crypt
     * @see Illuminate\Encryption\Encrypter
     */
    class Crypt
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
         * The encryption key.
         *
         * @var string
         */
        protected $key;

        /**
         * The algorithm used for encryption.
         *
         * @var string
         */
        protected $cipher;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Crypt::getFacadeAccessor()
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
         * Create a new encrypter instance.
         *
         * @param string $key
         * @param string $cipher
         * 
         *
         * @throws \RuntimeException
         * @see \Illuminate\Encryption\Encrypter::__construct()
         */
        public function __construct($key, $cipher = 'AES-128-CBC')
        {
        }

        /**
         * Determine if the given key and cipher combination is valid.
         *
         * @param string $key
         * @param string $cipher
         * @return bool
         * @see \Illuminate\Encryption\Encrypter::supported()
         */
        public static function supported($key, $cipher)
        {
        }

        /**
         * Encrypt the given value.
         *
         * @param mixed $value
         * @param bool $serialize
         * @return string
         *
         * @throws \Illuminate\Contracts\Encryption\EncryptException
         * @see \Illuminate\Encryption\Encrypter::encrypt()
         */
        public static function encrypt($value, $serialize = true)
        {
        }

        /**
         * Encrypt a string without serialization.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\Encryption\Encrypter::encryptString()
         */
        public static function encryptString($value)
        {
        }

        /**
         * Decrypt the given value.
         *
         * @param mixed $payload
         * @param bool $unserialize
         * @return string
         *
         * @throws \Illuminate\Contracts\Encryption\DecryptException
         * @see \Illuminate\Encryption\Encrypter::decrypt()
         */
        public static function decrypt($payload, $unserialize = true)
        {
        }

        /**
         * Decrypt the given string without unserialization.
         *
         * @param string $payload
         * @return string
         * @see \Illuminate\Encryption\Encrypter::decryptString()
         */
        public static function decryptString($payload)
        {
        }

        /**
         * Create a MAC for the given value.
         *
         * @param string $iv
         * @param mixed $value
         * @return string
         * @see \Illuminate\Encryption\Encrypter::hash()
         */
        protected static function hash($iv, $value)
        {
        }

        /**
         * Get the JSON array from the given payload.
         *
         * @param string $payload
         * @return array
         *
         * @throws \Illuminate\Contracts\Encryption\DecryptException
         * @see \Illuminate\Encryption\Encrypter::getJsonPayload()
         */
        protected static function getJsonPayload($payload)
        {
        }

        /**
         * Verify that the encryption payload is valid.
         *
         * @param mixed $payload
         * @return bool
         * @see \Illuminate\Encryption\Encrypter::validPayload()
         */
        protected static function validPayload($payload)
        {
        }

        /**
         * Determine if the MAC for the given payload is valid.
         *
         * @param array $payload
         * @return bool
         * @see \Illuminate\Encryption\Encrypter::validMac()
         */
        protected static function validMac(array $payload)
        {
        }

        /**
         * Calculate the hash of the given payload.
         *
         * @param array $payload
         * @param string $bytes
         * @return string
         * @see \Illuminate\Encryption\Encrypter::calculateMac()
         */
        protected static function calculateMac($payload, $bytes)
        {
        }

        /**
         * Get the encryption key.
         *
         * @return string
         * @see \Illuminate\Encryption\Encrypter::getKey()
         */
        public static function getKey()
        {
        }

    }
}

namespace {
    class Crypt extends Illuminate\Support\Facades\Crypt
    {
    }
}