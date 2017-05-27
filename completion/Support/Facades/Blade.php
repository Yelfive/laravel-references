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
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Blade::getFacadeAccessor()
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
         * Store the verbatim blocks and replace them with a temporary placeholder.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::storeVerbatimBlocks()
         */
        protected static function storeVerbatimBlocks($value)
        {
        }

        /**
         * Replace the raw placeholders with the original code stored in the raw blocks.
         *
         * @param string $result
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::restoreVerbatimBlocks()
         */
        protected static function restoreVerbatimBlocks($result)
        {
        }

        /**
         * Add the stored footers onto the given content.
         *
         * @param string $result
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::addFooters()
         */
        protected static function addFooters($result)
        {
        }

        /**
         * Parse the tokens from the template.
         *
         * @param array $token
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::parseToken()
         */
        protected static function parseToken($token)
        {
        }

        /**
         * Execute the user defined extensions.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileExtensions()
         */
        protected static function compileExtensions($value)
        {
        }

        /**
         * Compile Blade statements that start with "@".
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileStatements()
         */
        protected static function compileStatements($value)
        {
        }

        /**
         * Compile a single Blade @ statement.
         *
         * @param array $match
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileStatement()
         */
        protected static function compileStatement($match)
        {
        }

        /**
         * Call the given directive with the given value.
         *
         * @param string $name
         * @param string|null $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::callCustomDirective()
         */
        protected static function callCustomDirective($name, $value)
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
         * Compile the can statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileCan()
         */
        protected static function compileCan($expression)
        {
        }

        /**
         * Compile the cannot statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileCannot()
         */
        protected static function compileCannot($expression)
        {
        }

        /**
         * Compile the else-can statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileElsecan()
         */
        protected static function compileElsecan($expression)
        {
        }

        /**
         * Compile the else-cannot statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileElsecannot()
         */
        protected static function compileElsecannot($expression)
        {
        }

        /**
         * Compile the end-can statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndcan()
         */
        protected static function compileEndcan()
        {
        }

        /**
         * Compile the end-cannot statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndcannot()
         */
        protected static function compileEndcannot()
        {
        }

        /**
         * Compile Blade comments into an empty string.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileComments()
         */
        protected static function compileComments($value)
        {
        }

        /**
         * Compile the component statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileComponent()
         */
        protected static function compileComponent($expression)
        {
        }

        /**
         * Compile the end-component statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndComponent()
         */
        protected static function compileEndComponent()
        {
        }

        /**
         * Compile the slot statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileSlot()
         */
        protected static function compileSlot($expression)
        {
        }

        /**
         * Compile the end-slot statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndSlot()
         */
        protected static function compileEndSlot()
        {
        }

        /**
         * Compile the has-section statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileHasSection()
         */
        protected static function compileHasSection($expression)
        {
        }

        /**
         * Compile the if statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileIf()
         */
        protected static function compileIf($expression)
        {
        }

        /**
         * Compile the unless statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileUnless()
         */
        protected static function compileUnless($expression)
        {
        }

        /**
         * Compile the else-if statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileElseif()
         */
        protected static function compileElseif($expression)
        {
        }

        /**
         * Compile the else statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileElse()
         */
        protected static function compileElse()
        {
        }

        /**
         * Compile the end-if statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndif()
         */
        protected static function compileEndif()
        {
        }

        /**
         * Compile the end-unless statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndunless()
         */
        protected static function compileEndunless()
        {
        }

        /**
         * Compile the if-isset statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileIsset()
         */
        protected static function compileIsset($expression)
        {
        }

        /**
         * Compile the end-isset statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndIsset()
         */
        protected static function compileEndIsset()
        {
        }

        /**
         * Compile Blade echos into valid PHP.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEchos()
         */
        protected static function compileEchos($value)
        {
        }

        /**
         * Get the echo methods in the proper order for compilation.
         *
         * @return array
         * @see \Illuminate\View\Compilers\BladeCompiler::getEchoMethods()
         */
        protected static function getEchoMethods()
        {
        }

        /**
         * Compile the "raw" echo statements.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileRawEchos()
         */
        protected static function compileRawEchos($value)
        {
        }

        /**
         * Compile the "regular" echo statements.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileRegularEchos()
         */
        protected static function compileRegularEchos($value)
        {
        }

        /**
         * Compile the escaped echo statements.
         *
         * @param string $value
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEscapedEchos()
         */
        protected static function compileEscapedEchos($value)
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

        /**
         * Compile the each statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEach()
         */
        protected static function compileEach($expression)
        {
        }

        /**
         * Compile the include statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileInclude()
         */
        protected static function compileInclude($expression)
        {
        }

        /**
         * Compile the include-if statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileIncludeIf()
         */
        protected static function compileIncludeIf($expression)
        {
        }

        /**
         * Compile the include-when statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileIncludeWhen()
         */
        protected static function compileIncludeWhen($expression)
        {
        }

        /**
         * Compile the inject statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileInject()
         */
        protected static function compileInject($expression)
        {
        }

        /**
         * Compile the extends statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileExtends()
         */
        protected static function compileExtends($expression)
        {
        }

        /**
         * Compile the section statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileSection()
         */
        protected static function compileSection($expression)
        {
        }

        /**
         * Replace the @parent directive to a placeholder.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileParent()
         */
        protected static function compileParent()
        {
        }

        /**
         * Compile the yield statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileYield()
         */
        protected static function compileYield($expression)
        {
        }

        /**
         * Compile the show statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileShow()
         */
        protected static function compileShow()
        {
        }

        /**
         * Compile the append statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileAppend()
         */
        protected static function compileAppend()
        {
        }

        /**
         * Compile the overwrite statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileOverwrite()
         */
        protected static function compileOverwrite()
        {
        }

        /**
         * Compile the stop statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileStop()
         */
        protected static function compileStop()
        {
        }

        /**
         * Compile the end-section statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndsection()
         */
        protected static function compileEndsection()
        {
        }

        /**
         * Compile the for-else statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileForelse()
         */
        protected static function compileForelse($expression)
        {
        }

        /**
         * Compile the for-else-empty and empty statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEmpty()
         */
        protected static function compileEmpty($expression)
        {
        }

        /**
         * Compile the end-for-else statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndforelse()
         */
        protected static function compileEndforelse()
        {
        }

        /**
         * Compile the end-empty statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndEmpty()
         */
        protected static function compileEndEmpty()
        {
        }

        /**
         * Compile the for statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileFor()
         */
        protected static function compileFor($expression)
        {
        }

        /**
         * Compile the for-each statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileForeach()
         */
        protected static function compileForeach($expression)
        {
        }

        /**
         * Compile the break statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileBreak()
         */
        protected static function compileBreak($expression)
        {
        }

        /**
         * Compile the continue statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileContinue()
         */
        protected static function compileContinue($expression)
        {
        }

        /**
         * Compile the end-for statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndfor()
         */
        protected static function compileEndfor()
        {
        }

        /**
         * Compile the end-for-each statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndforeach()
         */
        protected static function compileEndforeach()
        {
        }

        /**
         * Compile the while statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileWhile()
         */
        protected static function compileWhile($expression)
        {
        }

        /**
         * Compile the end-while statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndwhile()
         */
        protected static function compileEndwhile()
        {
        }

        /**
         * Compile the raw PHP statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compilePhp()
         */
        protected static function compilePhp($expression)
        {
        }

        /**
         * Compile end-php statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndphp()
         */
        protected static function compileEndphp()
        {
        }

        /**
         * Compile the unset statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileUnset()
         */
        protected static function compileUnset($expression)
        {
        }

        /**
         * Compile the stack statements into the content.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileStack()
         */
        protected static function compileStack($expression)
        {
        }

        /**
         * Compile the push statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compilePush()
         */
        protected static function compilePush($expression)
        {
        }

        /**
         * Compile the end-push statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndpush()
         */
        protected static function compileEndpush()
        {
        }

        /**
         * Compile the prepend statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compilePrepend()
         */
        protected static function compilePrepend($expression)
        {
        }

        /**
         * Compile the end-prepend statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndprepend()
         */
        protected static function compileEndprepend()
        {
        }

        /**
         * Compile the lang statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileLang()
         */
        protected static function compileLang($expression)
        {
        }

        /**
         * Compile the end-lang statements into valid PHP.
         *
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileEndlang()
         */
        protected static function compileEndlang()
        {
        }

        /**
         * Compile the choice statements into valid PHP.
         *
         * @param string $expression
         * @return string
         * @see \Illuminate\View\Compilers\BladeCompiler::compileChoice()
         */
        protected static function compileChoice($expression)
        {
        }

    }
}

namespace {
    class Blade extends Illuminate\Support\Facades\Blade
    {
    }
}