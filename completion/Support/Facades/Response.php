<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\View\Factory;
    use Illuminate\Routing\Redirector;

    /**
     * @see Illuminate\Support\Facades\Response
     * @see Illuminate\Routing\ResponseFactory
     */
    class Response
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
         * The view factory instance.
         *
         * @var \Illuminate\Contracts\View\Factory
         */
        protected $view;

        /**
         * The redirector instance.
         *
         * @var \Illuminate\Routing\Redirector
         */
        protected $redirector;

        /**
         * The registered string macros.
         *
         * @var array
         */
        protected static $macros;

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Response::getFacadeAccessor()
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
         * Create a new response factory instance.
         *
         * @param \Illuminate\Contracts\View\Factory $view
         * @param \Illuminate\Routing\Redirector $redirector
         * 
         * @see \Illuminate\Routing\ResponseFactory::__construct()
         */
        public function __construct(Factory $view, Redirector $redirector)
        {
        }

        /**
         * Return a new response from the application.
         *
         * @param string $content
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\Response
         * @see \Illuminate\Routing\ResponseFactory::make()
         */
        public static function make($content = '', $status = 200, array $headers = [])
        {
        }

        /**
         * Return a new view response from the application.
         *
         * @param string $view
         * @param array $data
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\Response
         * @see \Illuminate\Routing\ResponseFactory::view()
         */
        public static function view($view, $data = [], $status = 200, array $headers = [])
        {
        }

        /**
         * Return a new JSON response from the application.
         *
         * @param mixed $data
         * @param int $status
         * @param array $headers
         * @param int $options
         * @return \Illuminate\Http\JsonResponse
         * @see \Illuminate\Routing\ResponseFactory::json()
         */
        public static function json($data = [], $status = 200, array $headers = [], $options = 0)
        {
        }

        /**
         * Return a new JSONP response from the application.
         *
         * @param string $callback
         * @param mixed $data
         * @param int $status
         * @param array $headers
         * @param int $options
         * @return \Illuminate\Http\JsonResponse
         * @see \Illuminate\Routing\ResponseFactory::jsonp()
         */
        public static function jsonp($callback, $data = [], $status = 200, array $headers = [], $options = 0)
        {
        }

        /**
         * Return a new streamed response from the application.
         *
         * @param \Closure $callback
         * @param int $status
         * @param array $headers
         * @return \Symfony\Component\HttpFoundation\StreamedResponse
         * @see \Illuminate\Routing\ResponseFactory::stream()
         */
        public static function stream($callback, $status = 200, array $headers = [])
        {
        }

        /**
         * Create a new file download response.
         *
         * @param \SplFileInfo|string $file
         * @param string $name
         * @param array $headers
         * @param string|null $disposition
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
         * @see \Illuminate\Routing\ResponseFactory::download()
         */
        public static function download($file, $name = null, array $headers = [], $disposition = 'attachment')
        {
        }

        /**
         * Return the raw contents of a binary file.
         *
         * @param \SplFileInfo|string $file
         * @param array $headers
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
         * @see \Illuminate\Routing\ResponseFactory::file()
         */
        public static function file($file, array $headers = [])
        {
        }

        /**
         * Create a new redirect response to the given path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\ResponseFactory::redirectTo()
         */
        public static function redirectTo($path, $status = 302, $headers = [], $secure = null)
        {
        }

        /**
         * Create a new redirect response to a named route.
         *
         * @param string $route
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\ResponseFactory::redirectToRoute()
         */
        public static function redirectToRoute($route, $parameters = [], $status = 302, $headers = [])
        {
        }

        /**
         * Create a new redirect response to a controller action.
         *
         * @param string $action
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\ResponseFactory::redirectToAction()
         */
        public static function redirectToAction($action, $parameters = [], $status = 302, $headers = [])
        {
        }

        /**
         * Create a new redirect response, while putting the current URL in the session.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\ResponseFactory::redirectGuest()
         */
        public static function redirectGuest($path, $status = 302, $headers = [], $secure = null)
        {
        }

        /**
         * Create a new redirect response to the previously intended location.
         *
         * @param string $default
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse
         * @see \Illuminate\Routing\ResponseFactory::redirectToIntended()
         */
        public static function redirectToIntended($default = '/', $status = 302, $headers = [], $secure = null)
        {
        }

        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return null
         * @see \Illuminate\Routing\ResponseFactory::macro()
         */
        public static function macro($name, callable $macro)
        {
        }

        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Routing\ResponseFactory::hasMacro()
         */
        public static function hasMacro($name)
        {
        }

    }
}

namespace {
    class Response extends Illuminate\Support\Facades\Response
    {
    }
}