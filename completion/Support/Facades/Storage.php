<?php

namespace Illuminate\Support\Facades {

    use OpenCloud\Rackspace;
    use League\Flysystem\AdapterInterface;
    use League\Flysystem\FilesystemInterface;
    use Closure;

    /**
     * @see Illuminate\Support\Facades\Storage
     * @see Illuminate\Filesystem\FilesystemManager
     */
    class Storage
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
         * The array of resolved filesystem drivers.
         *
         * @var array
         */
        protected $disks;

        /**
         * The registered custom driver creators.
         *
         * @var array
         */
        protected $customCreators;

        /**
         * Replace the given disk with a local, testing disk.
         *
         * @param string $disk
         * @return null
         * @see \Illuminate\Support\Facades\Storage::fake()
         */
        public static function fake($disk)
        {
        }

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Storage::getFacadeAccessor()
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
         * Create a new filesystem manager instance.
         *
         * @param \Illuminate\Contracts\Foundation\Application $app
         * 
         * @see \Illuminate\Filesystem\FilesystemManager::__construct()
         */
        public function __construct($app)
        {
        }

        /**
         * Get a filesystem instance.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::drive()
         */
        public static function drive($name = null)
        {
        }

        /**
         * Get a filesystem instance.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::disk()
         */
        public static function disk($name = null)
        {
        }

        /**
         * Get a default cloud filesystem instance.
         *
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::cloud()
         */
        public static function cloud()
        {
        }

        /**
         * Attempt to get the disk from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::get()
         */
        protected static function get($name)
        {
        }

        /**
         * Resolve the given disk.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\Filesystem\FilesystemManager::resolve()
         */
        protected static function resolve($name)
        {
        }

        /**
         * Call a custom driver creator.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::callCustomCreator()
         */
        protected static function callCustomCreator(array $config)
        {
        }

        /**
         * Create an instance of the local driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::createLocalDriver()
         */
        public static function createLocalDriver(array $config)
        {
        }

        /**
         * Create an instance of the ftp driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::createFtpDriver()
         */
        public static function createFtpDriver(array $config)
        {
        }

        /**
         * Create an instance of the Amazon S3 driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Cloud
         * @see \Illuminate\Filesystem\FilesystemManager::createS3Driver()
         */
        public static function createS3Driver(array $config)
        {
        }

        /**
         * Format the given S3 configuration with the default options.
         *
         * @param array $config
         * @return array
         * @see \Illuminate\Filesystem\FilesystemManager::formatS3Config()
         */
        protected static function formatS3Config(array $config)
        {
        }

        /**
         * Create an instance of the Rackspace driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Cloud
         * @see \Illuminate\Filesystem\FilesystemManager::createRackspaceDriver()
         */
        public static function createRackspaceDriver(array $config)
        {
        }

        /**
         * Get the Rackspace Cloud Files container.
         *
         * @param \OpenCloud\Rackspace $client
         * @param array $config
         * @return \OpenCloud\ObjectStore\Resource\Container
         * @see \Illuminate\Filesystem\FilesystemManager::getRackspaceContainer()
         */
        protected static function getRackspaceContainer(Rackspace $client, array $config)
        {
        }

        /**
         * Create a Flysystem instance with the given adapter.
         *
         * @param \League\Flysystem\AdapterInterface $adapter
         * @param array $config
         * @return \League\Flysystem\FlysystemInterface
         * @see \Illuminate\Filesystem\FilesystemManager::createFlysystem()
         */
        protected static function createFlysystem(AdapterInterface $adapter, array $config)
        {
        }

        /**
         * Adapt the filesystem implementation.
         *
         * @param \League\Flysystem\FilesystemInterface $filesystem
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         * @see \Illuminate\Filesystem\FilesystemManager::adapt()
         */
        protected static function adapt(FilesystemInterface $filesystem)
        {
        }

        /**
         * Set the given disk instance.
         *
         * @param string $name
         * @param mixed $disk
         * @return null
         * @see \Illuminate\Filesystem\FilesystemManager::set()
         */
        public static function set($name, $disk)
        {
        }

        /**
         * Get the filesystem connection configuration.
         *
         * @param string $name
         * @return array
         * @see \Illuminate\Filesystem\FilesystemManager::getConfig()
         */
        protected static function getConfig($name)
        {
        }

        /**
         * Get the default driver name.
         *
         * @return string
         * @see \Illuminate\Filesystem\FilesystemManager::getDefaultDriver()
         */
        public static function getDefaultDriver()
        {
        }

        /**
         * Get the default cloud driver name.
         *
         * @return string
         * @see \Illuminate\Filesystem\FilesystemManager::getDefaultCloudDriver()
         */
        public static function getDefaultCloudDriver()
        {
        }

        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Filesystem\FilesystemManager
         * @see \Illuminate\Filesystem\FilesystemManager::extend()
         */
        public static function extend($driver, Closure $callback)
        {
        }

    }
}

namespace {
    class Storage extends Illuminate\Support\Facades\Storage
    {
    }
}