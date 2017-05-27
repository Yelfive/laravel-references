<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Translation\LoaderInterface;
    use Illuminate\Translation\MessageSelector;

    /**
     * @see Illuminate\Support\Facades\Lang
     * @see Illuminate\Translation\Translator
     */
    class Lang
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
         * The loader implementation.
         *
         * @var \Illuminate\Translation\LoaderInterface
         */
        protected $loader;

        /**
         * The default locale being used by the translator.
         *
         * @var string
         */
        protected $locale;

        /**
         * The fallback locale used by the translator.
         *
         * @var string
         */
        protected $fallback;

        /**
         * The array of loaded translation groups.
         *
         * @var array
         */
        protected $loaded;

        /**
         * The message selector.
         *
         * @var \Illuminate\Translation\MessageSelector
         */
        protected $selector;

        /**
         * A cache of the parsed items.
         *
         * @var array
         */
        protected $parsed;

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
         * @see \Illuminate\Support\Facades\Lang::getFacadeAccessor()
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
         * Create a new translator instance.
         *
         * @param \Illuminate\Translation\LoaderInterface $loader
         * @param string $locale
         * 
         * @see \Illuminate\Translation\Translator::__construct()
         */
        public function __construct(LoaderInterface $loader, $locale)
        {
        }

        /**
         * Determine if a translation exists for a given locale.
         *
         * @param string $key
         * @param string|null $locale
         * @return bool
         * @see \Illuminate\Translation\Translator::hasForLocale()
         */
        public static function hasForLocale($key, $locale = null)
        {
        }

        /**
         * Determine if a translation exists.
         *
         * @param string $key
         * @param string|null $locale
         * @param bool $fallback
         * @return bool
         * @see \Illuminate\Translation\Translator::has()
         */
        public static function has($key, $locale = null, $fallback = true)
        {
        }

        /**
         * Get the translation for a given key.
         *
         * @param string $key
         * @param array $replace
         * @param string $locale
         * @return string|array|null
         * @see \Illuminate\Translation\Translator::trans()
         */
        public static function trans($key, array $replace = [], $locale = null)
        {
        }

        /**
         * Get the translation for the given key.
         *
         * @param string $key
         * @param array $replace
         * @param string|null $locale
         * @param bool $fallback
         * @return string|array|null
         * @see \Illuminate\Translation\Translator::get()
         */
        public static function get($key, array $replace = [], $locale = null, $fallback = true)
        {
        }

        /**
         * Get the translation for a given key from the JSON translation files.
         *
         * @param string $key
         * @param array $replace
         * @param string $locale
         * @return string
         * @see \Illuminate\Translation\Translator::getFromJson()
         */
        public static function getFromJson($key, array $replace = [], $locale = null)
        {
        }

        /**
         * Get a translation according to an integer value.
         *
         * @param string $key
         * @param int|array|\Countable $number
         * @param array $replace
         * @param string $locale
         * @return string
         * @see \Illuminate\Translation\Translator::transChoice()
         */
        public static function transChoice($key, $number, array $replace = [], $locale = null)
        {
        }

        /**
         * Get a translation according to an integer value.
         *
         * @param string $key
         * @param int|array|\Countable $number
         * @param array $replace
         * @param string $locale
         * @return string
         * @see \Illuminate\Translation\Translator::choice()
         */
        public static function choice($key, $number, array $replace = [], $locale = null)
        {
        }

        /**
         * Get the proper locale for a choice operation.
         *
         * @param string|null $locale
         * @return string
         * @see \Illuminate\Translation\Translator::localeForChoice()
         */
        protected static function localeForChoice($locale)
        {
        }

        /**
         * Retrieve a language line out the loaded array.
         *
         * @param string $namespace
         * @param string $group
         * @param string $locale
         * @param string $item
         * @param array $replace
         * @return string|array|null
         * @see \Illuminate\Translation\Translator::getLine()
         */
        protected static function getLine($namespace, $group, $locale, $item, array $replace)
        {
        }

        /**
         * Make the place-holder replacements on a line.
         *
         * @param string $line
         * @param array $replace
         * @return string
         * @see \Illuminate\Translation\Translator::makeReplacements()
         */
        protected static function makeReplacements($line, array $replace)
        {
        }

        /**
         * Sort the replacements array.
         *
         * @param array $replace
         * @return array
         * @see \Illuminate\Translation\Translator::sortReplacements()
         */
        protected static function sortReplacements(array $replace)
        {
        }

        /**
         * Add translation lines to the given locale.
         *
         * @param array $lines
         * @param string $locale
         * @param string $namespace
         * @return null
         * @see \Illuminate\Translation\Translator::addLines()
         */
        public static function addLines(array $lines, $locale, $namespace = '*')
        {
        }

        /**
         * Load the specified language group.
         *
         * @param string $namespace
         * @param string $group
         * @param string $locale
         * @return null
         * @see \Illuminate\Translation\Translator::load()
         */
        public static function load($namespace, $group, $locale)
        {
        }

        /**
         * Determine if the given group has been loaded.
         *
         * @param string $namespace
         * @param string $group
         * @param string $locale
         * @return bool
         * @see \Illuminate\Translation\Translator::isLoaded()
         */
        protected static function isLoaded($namespace, $group, $locale)
        {
        }

        /**
         * Add a new namespace to the loader.
         *
         * @param string $namespace
         * @param string $hint
         * @return null
         * @see \Illuminate\Translation\Translator::addNamespace()
         */
        public static function addNamespace($namespace, $hint)
        {
        }

        /**
         * Parse a key into namespace, group, and item.
         *
         * @param string $key
         * @return array
         * @see \Illuminate\Translation\Translator::parseKey()
         */
        public static function parseKey($key)
        {
        }

        /**
         * Get the array of locales to be checked.
         *
         * @param string|null $locale
         * @return array
         * @see \Illuminate\Translation\Translator::localeArray()
         */
        protected static function localeArray($locale)
        {
        }

        /**
         * Get the message selector instance.
         *
         * @return \Illuminate\Translation\MessageSelector
         * @see \Illuminate\Translation\Translator::getSelector()
         */
        public static function getSelector()
        {
        }

        /**
         * Set the message selector instance.
         *
         * @param \Illuminate\Translation\MessageSelector $selector
         * @return null
         * @see \Illuminate\Translation\Translator::setSelector()
         */
        public static function setSelector(MessageSelector $selector)
        {
        }

        /**
         * Get the language line loader implementation.
         *
         * @return \Illuminate\Translation\LoaderInterface
         * @see \Illuminate\Translation\Translator::getLoader()
         */
        public static function getLoader()
        {
        }

        /**
         * Get the default locale being used.
         *
         * @return string
         * @see \Illuminate\Translation\Translator::locale()
         */
        public static function locale()
        {
        }

        /**
         * Get the default locale being used.
         *
         * @return string
         * @see \Illuminate\Translation\Translator::getLocale()
         */
        public static function getLocale()
        {
        }

        /**
         * Set the default locale.
         *
         * @param string $locale
         * @return null
         * @see \Illuminate\Translation\Translator::setLocale()
         */
        public static function setLocale($locale)
        {
        }

        /**
         * Get the fallback locale being used.
         *
         * @return string
         * @see \Illuminate\Translation\Translator::getFallback()
         */
        public static function getFallback()
        {
        }

        /**
         * Set the fallback locale being used.
         *
         * @param string $fallback
         * @return null
         * @see \Illuminate\Translation\Translator::setFallback()
         */
        public static function setFallback($fallback)
        {
        }

        /**
         * Parse an array of basic segments.
         *
         * @param array $segments
         * @return array
         * @see \Illuminate\Support\NamespacedItemResolver::parseBasicSegments()
         */
        protected static function parseBasicSegments(array $segments)
        {
        }

        /**
         * Parse an array of namespaced segments.
         *
         * @param string $key
         * @return array
         * @see \Illuminate\Support\NamespacedItemResolver::parseNamespacedSegments()
         */
        protected static function parseNamespacedSegments($key)
        {
        }

        /**
         * Set the parsed value of a key.
         *
         * @param string $key
         * @param array $parsed
         * @return null
         * @see \Illuminate\Support\NamespacedItemResolver::setParsedKey()
         */
        public static function setParsedKey($key, $parsed)
        {
        }

        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return null
         * @see \Illuminate\Translation\Translator::macro()
         */
        public static function macro($name, callable $macro)
        {
        }

        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Translation\Translator::hasMacro()
         */
        public static function hasMacro($name)
        {
        }

    }
}

namespace {
    class Lang extends Illuminate\Support\Facades\Lang
    {
    }
}