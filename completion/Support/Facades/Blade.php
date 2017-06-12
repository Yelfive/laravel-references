<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Filesystem\Filesystem;

    /**
     * @see Illuminate\Support\Facades\Blade
     * @see Illuminate\View\Compilers\BladeCompiler
     */
    class Blade
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
         * All of the registered extensions.
         *
         * @var array
         */
        protected $extensions;

        /**
         * All custom "directive" handlers.
         *
         * This was implemented as a more usable "extend" in 5.1.
         *
         * @var array
         */
        protected $customDirectives;

        /**
         * The file currently being compiled.
         *
         * @var string
         */
        protected $path;

        /**
         * All of the available compiler functions.
         *
         * @var array
         */
        protected $compilers;

        /**
         * Array of opening and closing tags for raw echos.
         *
         * @var array
         */
        protected $rawTags;

        /**
         * Array of opening and closing tags for regular echos.
         *
         * @var array
         */
        protected $contentTags;

        /**
         * Array of opening and closing tags for escaped echos.
         *
         * @var array
         */
        protected $escapedTags;

        /**
         * The "regular" / legacy echo string format.
         *
         * @var string
         */
        protected $echoFormat;

        /**
         * Array of footer lines to be added to template.
         *
         * @var array
         */
        protected $footer;

        /**
         * Placeholder to temporary mark the position of verbatim blocks.
         *
         * @var string
         */
        protected $verbatimPlaceholder;

        /**
         * Array to temporary store the verbatim blocks found in the template.
         *
         * @var array
         */
        protected $verbatimBlocks;

        /**
         * The Filesystem instance.
         *
         * @var \Illuminate\Filesystem\Filesystem
         */
        protected $files;

        /**
         * Get the cache path for the compiled views.
         *
         * @var string
         */
        protected $cachePath;

        /**
         * The name of the last section that was started.
         *
         * @var string
         */
        protected $lastSection;

        /**
         * Counter to keep track of nested forelse statements.
         *
         * @var int
         */
        protected $forElseCounter;

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
         * Compile the view at the given path.
         *
         * @param string $path
         * @return null
         * @see \Illuminate\View\Compilers\BladeCompiler::compile()
         */
        public static function compile($path = null)
        {
        }

        /**
         * Get the path currently being compiled.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::getPath()
         */
        public static function getPath()
        {
        }

        /**
         * Set the path currently being compiled.
         *
         * @param string $path
         * @return null
         * @see \Illuminate\View\Compilers\BladeCompiler::setPath()
         */
        public static function setPath($path)
        {
        }

        /**
         * Compile the given Blade template contents.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileString()
         */
        public static function compileString($value)
        {
        }

        /**
         * Strip the parentheses from the given expression.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::stripParentheses()
         */
        public static function stripParentheses($expression)
        {
        }

        /**
         * Register a custom Blade compiler.
         *
         * @param callable $compiler
         * @return null
         * @see \Illuminate\View\Compilers\BladeCompiler::extend()
         */
        public static function extend(callable $compiler)
        {
        }

        /**
         * Get the extensions used by the compiler.
         *
         * @return array
         * @see \Illuminate\View\Compilers\BladeCompiler::getExtensions()
         */
        public static function getExtensions()
        {
        }

        /**
         * Register a handler for custom directives.
         *
         * @param string $name
         * @param callable $handler
         * @return null
         * @see \Illuminate\View\Compilers\BladeCompiler::directive()
         */
        public static function directive($name, callable $handler)
        {
        }

        /**
         * Get the list of custom directives.
         *
         * @return array
         * @see \Illuminate\View\Compilers\BladeCompiler::getCustomDirectives()
         */
        public static function getCustomDirectives()
        {
        }

        /**
         * Set the echo format to be used by the compiler.
         *
         * @param string $format
         * @return null
         * @see \Illuminate\View\Compilers\BladeCompiler::setEchoFormat()
         */
        public static function setEchoFormat($format)
        {
        }

        /**
         * Create a new compiler instance.
         *
         * @param \Illuminate\Filesystem\Filesystem $files
         * @param string $cachePath
         * 
         *
         * @throws \InvalidArgumentException
         * @see \Illuminate\View\Compilers\Compiler::__construct()
         */
        public function __construct(Filesystem $files, $cachePath)
        {
        }

        /**
         * Get the path to the compiled version of a view.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\View\Compilers\Compiler::getCompiledPath()
         */
        public static function getCompiledPath($path)
        {
        }

        /**
         * Determine if the view at the given path is expired.
         *
         * @param string $path
         * @return bool
         * @see \Illuminate\View\Compilers\Compiler::isExpired()
         */
        public static function isExpired($path)
        {
        }

        /**
         * Compile the default values for the echo statement.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEchoDefaults()
         */
        public static function compileEchoDefaults($value)
        {
        }

    }
}

namespace {
    class Blade extends Illuminate\Support\Facades\Blade
    {
    }
}