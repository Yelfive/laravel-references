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