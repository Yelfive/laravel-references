<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Console\Scheduling\Schedule;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\Events\Dispatcher;
    use Closure;
    use Exception;

    /**
     * @see Illuminate\Support\Facades\Artisan
     * @see App\Console\Kernel
     */
    class Artisan
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
         * The Artisan commands provided by your application.
         *
         * @var array
         */
        protected $commands;

        /**
         * The event dispatcher implementation.
         *
         * @var \Illuminate\Contracts\Events\Dispatcher
         */
        protected $events;

        /**
         * The Artisan application instance.
         *
         * @var \Illuminate\Console\Application
         */
        protected $artisan;

        /**
         * Indicates if the Closure commands have been loaded.
         *
         * @var bool
         */
        protected $commandsLoaded;

        /**
         * The bootstrap classes for the application.
         *
         * @var array
         */
        protected $bootstrappers;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Artisan::getFacadeAccessor()
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
         * Define the application's command schedule.
         *
         * @param \Illuminate\Console\Scheduling\Schedule $schedule
         * @return null
         * @see \App\Console\Kernel::schedule()
         */
        protected static function schedule(Schedule $schedule)
        {
        }

        /**
         * Register the Closure based commands for the application.
         *
         * @return null
         * @see \App\Console\Kernel::commands()
         */
        protected static function commands()
        {
        }

        /**
         * Create a new console kernel instance.
         *
         * @param \Illuminate\Contracts\Foundation\Application $app
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * 
         * @see \Illuminate\Foundation\Console\Kernel::__construct()
         */
        public function __construct(Application $app, Dispatcher $events)
        {
        }

        /**
         * Define the application's command schedule.
         *
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::defineConsoleSchedule()
         */
        protected static function defineConsoleSchedule()
        {
        }

        /**
         * Run the console application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param \Symfony\Component\Console\Output\OutputInterface $output
         * @return int
         * @see \Illuminate\Foundation\Console\Kernel::handle()
         */
        public static function handle($input, $output = null)
        {
        }

        /**
         * Terminate the application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param int $status
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::terminate()
         */
        public static function terminate($input, $status)
        {
        }

        /**
         * Register a Closure based command with the application.
         *
         * @param string $signature
         * @param Closure $callback
         * @return \Illuminate\Foundation\Console\ClosureCommand
         * @see \Illuminate\Foundation\Console\Kernel::command()
         */
        public static function command($signature, Closure $callback)
        {
        }

        /**
         * Register the given command with the console application.
         *
         * @param \Symfony\Component\Console\Command\Command $command
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::registerCommand()
         */
        public static function registerCommand($command)
        {
        }

        /**
         * Run an Artisan console command by name.
         *
         * @param string $command
         * @param array $parameters
         * @param \Symfony\Component\Console\Output\OutputInterface $outputBuffer
         * @return int
         * @see \Illuminate\Foundation\Console\Kernel::call()
         */
        public static function call($command, array $parameters = [], $outputBuffer = null)
        {
        }

        /**
         * Queue the given console command.
         *
         * @param string $command
         * @param array $parameters
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::queue()
         */
        public static function queue($command, array $parameters = [])
        {
        }

        /**
         * Get all of the commands registered with the console.
         *
         * @return array
         * @see \Illuminate\Foundation\Console\Kernel::all()
         */
        public static function all()
        {
        }

        /**
         * Get the output for the last run command.
         *
         * @return string
         * @see \Illuminate\Foundation\Console\Kernel::output()
         */
        public static function output()
        {
        }

        /**
         * Bootstrap the application for artisan commands.
         *
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::bootstrap()
         */
        public static function bootstrap()
        {
        }

        /**
         * Get the Artisan application instance.
         *
         * @return \Illuminate\Console\Application
         * @see \Illuminate\Foundation\Console\Kernel::getArtisan()
         */
        protected static function getArtisan()
        {
        }

        /**
         * Set the Artisan application instance.
         *
         * @param \Illuminate\Console\Application $artisan
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::setArtisan()
         */
        public static function setArtisan($artisan)
        {
        }

        /**
         * Get the bootstrap classes for the application.
         *
         * @return array
         * @see \Illuminate\Foundation\Console\Kernel::bootstrappers()
         */
        protected static function bootstrappers()
        {
        }

        /**
         * Report the exception to the exception handler.
         *
         * @param \Exception $e
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::reportException()
         */
        protected static function reportException(Exception $e)
        {
        }

        /**
         * Report the exception to the exception handler.
         *
         * @param \Symfony\Component\Console\Output\OutputInterface $output
         * @param \Exception $e
         * @return null
         * @see \Illuminate\Foundation\Console\Kernel::renderException()
         */
        protected static function renderException($output, Exception $e)
        {
        }

    }
}

namespace {
    class Artisan extends Illuminate\Support\Facades\Artisan
    {
    }
}