<?php

namespace Illuminate\Support\Facades {

    use Illuminate\View\Engines\EngineResolver;
    use Illuminate\View\ViewFinderInterface;
    use Illuminate\Contracts\Events\Dispatcher;
    use Illuminate\Contracts\Container\Container;

    /**
     * @see \Illuminate\Support\Facades\View
     * @see \Illuminate\View\Factory
     */
    class View
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
         * The engine implementation.
         *
         * @var \Illuminate\View\Engines\EngineResolver
         */
        protected $engines;

        /**
         * The view finder implementation.
         *
         * @var \Illuminate\View\ViewFinderInterface
         */
        protected $finder;

        /**
         * The event dispatcher instance.
         *
         * @var \Illuminate\Contracts\Events\Dispatcher
         */
        protected $events;

        /**
         * The IoC container instance.
         *
         * @var \Illuminate\Contracts\Container\Container
         */
        protected $container;

        /**
         * Data that should be available to all templates.
         *
         * @var array
         */
        protected $shared;

        /**
         * The extension to engine bindings.
         *
         * @var array
         */
        protected $extensions;

        /**
         * The view composer events.
         *
         * @var array
         */
        protected $composers;

        /**
         * The number of active rendering operations.
         *
         * @var int
         */
        protected $renderCount;

        /**
         * The components being rendered.
         *
         * @var array
         */
        protected $componentStack;

        /**
         * The original data passed to the component.
         *
         * @var array
         */
        protected $componentData;

        /**
         * The slot contents for the component.
         *
         * @var array
         */
        protected $slots;

        /**
         * The names of the slots being rendered.
         *
         * @var array
         */
        protected $slotStack;

        /**
         * All of the finished, captured sections.
         *
         * @var array
         */
        protected $sections;

        /**
         * The stack of in-progress sections.
         *
         * @var array
         */
        protected $sectionStack;

        /**
         * The parent placeholder for the request.
         *
         * @var string
         */
        protected static $parentPlaceholder;

        /**
         * The stack of in-progress loops.
         *
         * @var array
         */
        protected $loopsStack;

        /**
         * All of the finished, captured push sections.
         *
         * @var array
         */
        protected $pushes;

        /**
         * All of the finished, captured prepend sections.
         *
         * @var array
         */
        protected $prepends;

        /**
         * The stack of in-progress push sections.
         *
         * @var array
         */
        protected $pushStack;

        /**
         * The translation replacements for the translation being rendered.
         *
         * @var array
         */
        protected $translationReplacements;

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
         * Create a new view factory instance.
         *
         * @param \Illuminate\View\Engines\EngineResolver $engines
         * @param \Illuminate\View\ViewFinderInterface $finder
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * 
         * @see \Illuminate\View\Factory::__construct()
         */
        public function __construct(EngineResolver $engines, ViewFinderInterface $finder, Dispatcher $events)
        {
        }

        /**
         * Get the evaluated view contents for the given view.
         *
         * @param string $path
         * @param array $data
         * @param array $mergeData
         * @return \Illuminate\Contracts\View\View
         * @see \Illuminate\View\Factory::file()
         */
        public static function file($path, $data = [], $mergeData = [])
        {
        }

        /**
         * Get the evaluated view contents for the given view.
         *
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @return \Illuminate\Contracts\View\View
         * @see \Illuminate\View\Factory::make()
         */
        public static function make($view, $data = [], $mergeData = [])
        {
        }

        /**
         * Get the rendered content of the view based on a given condition.
         *
         * @param bool $condition
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @return string
         * @see \Illuminate\View\Factory::renderWhen()
         */
        public static function renderWhen($condition, $view, $data = [], $mergeData = [])
        {
        }

        /**
         * Get the rendered contents of a partial from a loop.
         *
         * @param string $view
         * @param array $data
         * @param string $iterator
         * @param string $empty
         * @return string
         * @see \Illuminate\View\Factory::renderEach()
         */
        public static function renderEach($view, $data, $iterator, $empty = 'raw|')
        {
        }

        /**
         * Determine if a given view exists.
         *
         * @param string $view
         * @return bool
         * @see \Illuminate\View\Factory::exists()
         */
        public static function exists($view)
        {
        }

        /**
         * Get the appropriate view engine for the given path.
         *
         * @param string $path
         * @return \Illuminate\View\Engines\EngineInterface
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\View\Factory::getEngineFromPath()
         */
        public static function getEngineFromPath($path)
        {
        }

        /**
         * Add a piece of shared data to the environment.
         *
         * @param array|string $key
         * @param mixed $value
         * @return mixed
         * @see \Illuminate\View\Factory::share()
         */
        public static function share($key, $value = null)
        {
        }

        /**
         * Increment the rendering counter.
         *
         * @return null
         * @see \Illuminate\View\Factory::incrementRender()
         */
        public static function incrementRender()
        {
        }

        /**
         * Decrement the rendering counter.
         *
         * @return null
         * @see \Illuminate\View\Factory::decrementRender()
         */
        public static function decrementRender()
        {
        }

        /**
         * Check if there are no active render operations.
         *
         * @return bool
         * @see \Illuminate\View\Factory::doneRendering()
         */
        public static function doneRendering()
        {
        }

        /**
         * Add a location to the array of view locations.
         *
         * @param string $location
         * @return null
         * @see \Illuminate\View\Factory::addLocation()
         */
        public static function addLocation($location)
        {
        }

        /**
         * Add a new namespace to the loader.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return \Illuminate\View\Factory
         * @see \Illuminate\View\Factory::addNamespace()
         */
        public static function addNamespace($namespace, $hints)
        {
        }

        /**
         * Prepend a new namespace to the loader.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return \Illuminate\View\Factory
         * @see \Illuminate\View\Factory::prependNamespace()
         */
        public static function prependNamespace($namespace, $hints)
        {
        }

        /**
         * Replace the namespace hints for the given namespace.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return \Illuminate\View\Factory
         * @see \Illuminate\View\Factory::replaceNamespace()
         */
        public static function replaceNamespace($namespace, $hints)
        {
        }

        /**
         * Register a valid view extension and its engine.
         *
         * @param string $extension
         * @param string $engine
         * @param \Closure $resolver
         * @return null
         * @see \Illuminate\View\Factory::addExtension()
         */
        public static function addExtension($extension, $engine, $resolver = null)
        {
        }

        /**
         * Flush all of the factory state like sections and stacks.
         *
         * @return null
         * @see \Illuminate\View\Factory::flushState()
         */
        public static function flushState()
        {
        }

        /**
         * Flush all of the section contents if done rendering.
         *
         * @return null
         * @see \Illuminate\View\Factory::flushStateIfDoneRendering()
         */
        public static function flushStateIfDoneRendering()
        {
        }

        /**
         * Get the extension to engine bindings.
         *
         * @return array
         * @see \Illuminate\View\Factory::getExtensions()
         */
        public static function getExtensions()
        {
        }

        /**
         * Get the engine resolver instance.
         *
         * @return \Illuminate\View\Engines\EngineResolver
         * @see \Illuminate\View\Factory::getEngineResolver()
         */
        public static function getEngineResolver()
        {
        }

        /**
         * Get the view finder instance.
         *
         * @return \Illuminate\View\ViewFinderInterface
         * @see \Illuminate\View\Factory::getFinder()
         */
        public static function getFinder()
        {
        }

        /**
         * Set the view finder instance.
         *
         * @param \Illuminate\View\ViewFinderInterface $finder
         * @return null
         * @see \Illuminate\View\Factory::setFinder()
         */
        public static function setFinder(ViewFinderInterface $finder)
        {
        }

        /**
         * Flush the cache of views located by the finder.
         *
         * @return null
         * @see \Illuminate\View\Factory::flushFinderCache()
         */
        public static function flushFinderCache()
        {
        }

        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher
         * @see \Illuminate\View\Factory::getDispatcher()
         */
        public static function getDispatcher()
        {
        }

        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return null
         * @see \Illuminate\View\Factory::setDispatcher()
         */
        public static function setDispatcher(Dispatcher $events)
        {
        }

        /**
         * Get the IoC container instance.
         *
         * @return \Illuminate\Contracts\Container\Container
         * @see \Illuminate\View\Factory::getContainer()
         */
        public static function getContainer()
        {
        }

        /**
         * Set the IoC container instance.
         *
         * @param \Illuminate\Contracts\Container\Container $container
         * @return null
         * @see \Illuminate\View\Factory::setContainer()
         */
        public static function setContainer(Container $container)
        {
        }

        /**
         * Get an item from the shared data.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\View\Factory::shared()
         */
        public static function shared($key, $default = null)
        {
        }

        /**
         * Get all of the shared data for the environment.
         *
         * @return array
         * @see \Illuminate\View\Factory::getShared()
         */
        public static function getShared()
        {
        }

        /**
         * Start a component rendering process.
         *
         * @param string $name
         * @param array $data
         * @return null
         * @see \Illuminate\View\Factory::startComponent()
         */
        public static function startComponent($name, array $data = [])
        {
        }

        /**
         * Render the current component.
         *
         * @return string
         * @see \Illuminate\View\Factory::renderComponent()
         */
        public static function renderComponent()
        {
        }

        /**
         * Start the slot rendering process.
         *
         * @param string $name
         * @param string|null $content
         * @return null
         * @see \Illuminate\View\Factory::slot()
         */
        public static function slot($name, $content = null)
        {
        }

        /**
         * Save the slot content for rendering.
         *
         * @return null
         * @see \Illuminate\View\Factory::endSlot()
         */
        public static function endSlot()
        {
        }

        /**
         * Register a view creator event.
         *
         * @param array|string $views
         * @param \Closure|string $callback
         * @return array
         * @see \Illuminate\View\Factory::creator()
         */
        public static function creator($views, $callback)
        {
        }

        /**
         * Register multiple view composers via an array.
         *
         * @param array $composers
         * @return array
         * @see \Illuminate\View\Factory::composers()
         */
        public static function composers(array $composers)
        {
        }

        /**
         * Register a view composer event.
         *
         * @param array|string $views
         * @param \Closure|string $callback
         * @return array
         * @see \Illuminate\View\Factory::composer()
         */
        public static function composer($views, $callback)
        {
        }

        /**
         * Call the composer for a given view.
         *
         * @param \Illuminate\Contracts\View\View $view
         * @return null
         * @see \Illuminate\View\Factory::callComposer()
         */
        public static function callComposer(\Illuminate\Contracts\View\View $view)
        {
        }

        /**
         * Call the creator for a given view.
         *
         * @param \Illuminate\Contracts\View\View $view
         * @return null
         * @see \Illuminate\View\Factory::callCreator()
         */
        public static function callCreator(\Illuminate\Contracts\View\View $view)
        {
        }

        /**
         * Start injecting content into a section.
         *
         * @param string $section
         * @param string|null $content
         * @return null
         * @see \Illuminate\View\Factory::startSection()
         */
        public static function startSection($section, $content = null)
        {
        }

        /**
         * Inject inline content into a section.
         *
         * @param string $section
         * @param string $content
         * @return null
         * @see \Illuminate\View\Factory::inject()
         */
        public static function inject($section, $content)
        {
        }

        /**
         * Stop injecting content into a section and return its contents.
         *
         * @return string
         * @see \Illuminate\View\Factory::yieldSection()
         */
        public static function yieldSection()
        {
        }

        /**
         * Stop injecting content into a section.
         *
         * @param bool $overwrite
         * @return string
         * @throws \InvalidArgumentException
         * @see \Illuminate\View\Factory::stopSection()
         */
        public static function stopSection($overwrite = false)
        {
        }

        /**
         * Stop injecting content into a section and append it.
         *
         * @return string
         * @throws \InvalidArgumentException
         * @see \Illuminate\View\Factory::appendSection()
         */
        public static function appendSection()
        {
        }

        /**
         * Get the string contents of a section.
         *
         * @param string $section
         * @param string $default
         * @return string
         * @see \Illuminate\View\Factory::yieldContent()
         */
        public static function yieldContent($section, $default = '')
        {
        }

        /**
         * Get the parent placeholder for the current request.
         *
         * @param string $section
         * @return string
         * @see \Illuminate\View\Factory::parentPlaceholder()
         */
        public static function parentPlaceholder($section = '')
        {
        }

        /**
         * Check if section exists.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\View\Factory::hasSection()
         */
        public static function hasSection($name)
        {
        }

        /**
         * Get the entire array of sections.
         *
         * @return array
         * @see \Illuminate\View\Factory::getSections()
         */
        public static function getSections()
        {
        }

        /**
         * Flush all of the sections.
         *
         * @return null
         * @see \Illuminate\View\Factory::flushSections()
         */
        public static function flushSections()
        {
        }

        /**
         * Add new loop to the stack.
         *
         * @param \Countable|array $data
         * @return null
         * @see \Illuminate\View\Factory::addLoop()
         */
        public static function addLoop($data)
        {
        }

        /**
         * Increment the top loop's indices.
         *
         * @return null
         * @see \Illuminate\View\Factory::incrementLoopIndices()
         */
        public static function incrementLoopIndices()
        {
        }

        /**
         * Pop a loop from the top of the loop stack.
         *
         * @return null
         * @see \Illuminate\View\Factory::popLoop()
         */
        public static function popLoop()
        {
        }

        /**
         * Get an instance of the last loop in the stack.
         *
         * @return \stdClass|null
         * @see \Illuminate\View\Factory::getLastLoop()
         */
        public static function getLastLoop()
        {
        }

        /**
         * Get the entire loop stack.
         *
         * @return array
         * @see \Illuminate\View\Factory::getLoopStack()
         */
        public static function getLoopStack()
        {
        }

        /**
         * Start injecting content into a push section.
         *
         * @param string $section
         * @param string $content
         * @return null
         * @see \Illuminate\View\Factory::startPush()
         */
        public static function startPush($section, $content = '')
        {
        }

        /**
         * Stop injecting content into a push section.
         *
         * @return string
         * @throws \InvalidArgumentException
         * @see \Illuminate\View\Factory::stopPush()
         */
        public static function stopPush()
        {
        }

        /**
         * Start prepending content into a push section.
         *
         * @param string $section
         * @param string $content
         * @return null
         * @see \Illuminate\View\Factory::startPrepend()
         */
        public static function startPrepend($section, $content = '')
        {
        }

        /**
         * Stop prepending content into a push section.
         *
         * @return string
         * @throws \InvalidArgumentException
         * @see \Illuminate\View\Factory::stopPrepend()
         */
        public static function stopPrepend()
        {
        }

        /**
         * Get the string contents of a push section.
         *
         * @param string $section
         * @param string $default
         * @return string
         * @see \Illuminate\View\Factory::yieldPushContent()
         */
        public static function yieldPushContent($section, $default = '')
        {
        }

        /**
         * Flush all of the stacks.
         *
         * @return null
         * @see \Illuminate\View\Factory::flushStacks()
         */
        public static function flushStacks()
        {
        }

        /**
         * Start a translation block.
         *
         * @param array $replacements
         * @return null
         * @see \Illuminate\View\Factory::startTranslation()
         */
        public static function startTranslation($replacements = [])
        {
        }

        /**
         * Render the current translation.
         *
         * @return string
         * @see \Illuminate\View\Factory::renderTranslation()
         */
        public static function renderTranslation()
        {
        }

    }
}

namespace {
    class View extends Illuminate\Support\Facades\View
    {
    }
}