<?php

namespace Illuminate\Support\Facades {

    use Symfony\Component\HttpFoundation\Request;
    use Closure;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    /**
     * @see Illuminate\Support\Facades\Input
     * @see Illuminate\Http\Request
     */
    class Input
    {
        const HEADER_FORWARDED = 'forwarded';

        const HEADER_CLIENT_IP = 'client_ip';

        const HEADER_CLIENT_HOST = 'client_host';

        const HEADER_CLIENT_PROTO = 'client_proto';

        const HEADER_CLIENT_PORT = 'client_port';

        const METHOD_HEAD = 'HEAD';

        const METHOD_GET = 'GET';

        const METHOD_POST = 'POST';

        const METHOD_PUT = 'PUT';

        const METHOD_PATCH = 'PATCH';

        const METHOD_DELETE = 'DELETE';

        const METHOD_PURGE = 'PURGE';

        const METHOD_OPTIONS = 'OPTIONS';

        const METHOD_TRACE = 'TRACE';

        const METHOD_CONNECT = 'CONNECT';

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
         * The decoded JSON content for the request.
         *
         * @var string
         */
        protected $json;

        /**
         * All of the converted files for the request.
         *
         * @var array
         */
        protected $convertedFiles;

        /**
         * The user resolver callback.
         *
         * @var \Closure
         */
        protected $userResolver;

        /**
         * The route resolver callback.
         *
         * @var \Closure
         */
        protected $routeResolver;

        /**
         * @var string[]
         */
        protected static $trustedProxies;

        /**
         * @var string[]
         */
        protected static $trustedHostPatterns;

        /**
         * @var string[]
         */
        protected static $trustedHosts;

        /**
         * Names for headers that can be trusted when
         * using trusted proxies.
         *
         * The FORWARDED header is the standard as of rfc7239.
         *
         * The other headers are non-standard, but widely used
         * by popular reverse proxies (like Apache mod_proxy or Amazon EC2).
         */
        protected static $trustedHeaders;

        
        protected static $httpMethodParameterOverride;

        /**
         * Custom parameters.
         *
         * @var \Symfony\Component\HttpFoundation\ParameterBag
         */
        public $attributes;

        /**
         * Request body parameters ($_POST).
         *
         * @var \Symfony\Component\HttpFoundation\ParameterBag
         */
        public $request;

        /**
         * Query string parameters ($_GET).
         *
         * @var \Symfony\Component\HttpFoundation\ParameterBag
         */
        public $query;

        /**
         * Server and execution environment parameters ($_SERVER).
         *
         * @var \Symfony\Component\HttpFoundation\ServerBag
         */
        public $server;

        /**
         * Uploaded files ($_FILES).
         *
         * @var \Symfony\Component\HttpFoundation\FileBag
         */
        public $files;

        /**
         * Cookies ($_COOKIE).
         *
         * @var \Symfony\Component\HttpFoundation\ParameterBag
         */
        public $cookies;

        /**
         * Headers (taken from the $_SERVER).
         *
         * @var \Symfony\Component\HttpFoundation\HeaderBag
         */
        public $headers;

        /**
         * @var string
         */
        protected $content;

        /**
         * @var array
         */
        protected $languages;

        /**
         * @var array
         */
        protected $charsets;

        /**
         * @var array
         */
        protected $encodings;

        /**
         * @var array
         */
        protected $acceptableContentTypes;

        /**
         * @var string
         */
        protected $pathInfo;

        /**
         * @var string
         */
        protected $requestUri;

        /**
         * @var string
         */
        protected $baseUrl;

        /**
         * @var string
         */
        protected $basePath;

        /**
         * @var string
         */
        protected $method;

        /**
         * @var string
         */
        protected $format;

        /**
         * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
         */
        protected $session;

        /**
         * @var string
         */
        protected $locale;

        /**
         * @var string
         */
        protected $defaultLocale;

        /**
         * @var array
         */
        protected static $formats;

        
        protected static $requestFactory;

        /**
         * The registered string macros.
         *
         * @var array
         */
        protected static $macros;

        /**
         * Get an item from the input data.
         *
         * This method is used for all request verbs (GET, POST, PUT, and DELETE)
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\Support\Facades\Input::get()
         */
        public static function get($key = null, $default = null)
        {
        }

        /**
         * Get the registered name of the component.
         *
         * @return string
         * @see \Illuminate\Support\Facades\Input::getFacadeAccessor()
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
         * Create a new Illuminate HTTP request from server variables.
         *
         * @return static
         * @see \Illuminate\Http\Request::capture()
         */
        public static function capture()
        {
        }

        /**
         * Return the Request instance.
         *
         * @return \Illuminate\Http\Request
         * @see \Illuminate\Http\Request::instance()
         */
        public static function instance()
        {
        }

        /**
         * Get the request method.
         *
         * @return string
         * @see \Illuminate\Http\Request::method()
         */
        public static function method()
        {
        }

        /**
         * Get the root URL for the application.
         *
         * @return string
         * @see \Illuminate\Http\Request::root()
         */
        public static function root()
        {
        }

        /**
         * Get the URL (no query string) for the request.
         *
         * @return string
         * @see \Illuminate\Http\Request::url()
         */
        public static function url()
        {
        }

        /**
         * Get the full URL for the request.
         *
         * @return string
         * @see \Illuminate\Http\Request::fullUrl()
         */
        public static function fullUrl()
        {
        }

        /**
         * Get the full URL for the request with the added query string parameters.
         *
         * @param array $query
         * @return string
         * @see \Illuminate\Http\Request::fullUrlWithQuery()
         */
        public static function fullUrlWithQuery(array $query)
        {
        }

        /**
         * Get the current path info for the request.
         *
         * @return string
         * @see \Illuminate\Http\Request::path()
         */
        public static function path()
        {
        }

        /**
         * Get the current encoded path info for the request.
         *
         * @return string
         * @see \Illuminate\Http\Request::decodedPath()
         */
        public static function decodedPath()
        {
        }

        /**
         * Get a segment from the URI (1 based index).
         *
         * @param int $index
         * @param string|null $default
         * @return string|null
         * @see \Illuminate\Http\Request::segment()
         */
        public static function segment($index, $default = null)
        {
        }

        /**
         * Get all of the segments for the request path.
         *
         * @return array
         * @see \Illuminate\Http\Request::segments()
         */
        public static function segments()
        {
        }

        /**
         * Determine if the current request URI matches a pattern.
         *
         * @return bool
         * @see \Illuminate\Http\Request::is()
         */
        public static function is()
        {
        }

        /**
         * Determine if the current request URL and query string matches a pattern.
         *
         * @return bool
         * @see \Illuminate\Http\Request::fullUrlIs()
         */
        public static function fullUrlIs()
        {
        }

        /**
         * Determine if the request is the result of an AJAX call.
         *
         * @return bool
         * @see \Illuminate\Http\Request::ajax()
         */
        public static function ajax()
        {
        }

        /**
         * Determine if the request is the result of an PJAX call.
         *
         * @return bool
         * @see \Illuminate\Http\Request::pjax()
         */
        public static function pjax()
        {
        }

        /**
         * Determine if the request is over HTTPS.
         *
         * @return bool
         * @see \Illuminate\Http\Request::secure()
         */
        public static function secure()
        {
        }

        /**
         * Returns the client IP address.
         *
         * @return string
         * @see \Illuminate\Http\Request::ip()
         */
        public static function ip()
        {
        }

        /**
         * Returns the client IP addresses.
         *
         * @return array
         * @see \Illuminate\Http\Request::ips()
         */
        public static function ips()
        {
        }

        /**
         * Merge new input into the current request's input array.
         *
         * @param array $input
         * @return null
         * @see \Illuminate\Http\Request::merge()
         */
        public static function merge(array $input)
        {
        }

        /**
         * Replace the input for the current request.
         *
         * @param array $input
         * @return null
         * @see \Illuminate\Http\Request::replace()
         */
        public static function replace(array $input)
        {
        }

        /**
         * Get the JSON payload for the request.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         * @see \Illuminate\Http\Request::json()
         */
        public static function json($key = null, $default = null)
        {
        }

        /**
         * Get the input source for the request.
         *
         * @return \Symfony\Component\HttpFoundation\ParameterBag
         * @see \Illuminate\Http\Request::getInputSource()
         */
        protected static function getInputSource()
        {
        }

        /**
         * Create an Illuminate request from a Symfony instance.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return \Illuminate\Http\Request
         * @see \Illuminate\Http\Request::createFromBase()
         */
        public static function createFromBase(Request $request)
        {
        }

        /**
         * {@inheritdoc}
         * @see \Illuminate\Http\Request::duplicate()
         */
        public static function duplicate(array $query = null, array $request = null, array $attributes = null, array $cookies = null, array $files = null, array $server = null)
        {
        }

        /**
         * Filter the given array of files, removing any empty values.
         *
         * @param mixed $files
         * @return mixed
         * @see \Illuminate\Http\Request::filterFiles()
         */
        protected static function filterFiles($files)
        {
        }

        /**
         * Get the session associated with the request.
         *
         * @return \Illuminate\Session\Store
         *
         * @throws \RuntimeException
         * @see \Illuminate\Http\Request::session()
         */
        public static function session()
        {
        }

        /**
         * Set the session instance on the request.
         *
         * @param \Illuminate\Contracts\Session\Session $session
         * @return null
         * @see \Illuminate\Http\Request::setLaravelSession()
         */
        public static function setLaravelSession($session)
        {
        }

        /**
         * Get the user making the request.
         *
         * @param string|null $guard
         * @return mixed
         * @see \Illuminate\Http\Request::user()
         */
        public static function user($guard = null)
        {
        }

        /**
         * Get the route handling the request.
         *
         * @param string|null $param
         *
         * @return \Illuminate\Routing\Route|object|string
         * @see \Illuminate\Http\Request::route()
         */
        public static function route($param = null)
        {
        }

        /**
         * Get a unique fingerprint for the request / route / IP address.
         *
         * @return string
         *
         * @throws \RuntimeException
         * @see \Illuminate\Http\Request::fingerprint()
         */
        public static function fingerprint()
        {
        }

        /**
         * Set the JSON payload for the request.
         *
         * @param array $json
         * @return \Illuminate\Http\Request
         * @see \Illuminate\Http\Request::setJson()
         */
        public static function setJson($json)
        {
        }

        /**
         * Get the user resolver callback.
         *
         * @return \Closure
         * @see \Illuminate\Http\Request::getUserResolver()
         */
        public static function getUserResolver()
        {
        }

        /**
         * Set the user resolver callback.
         *
         * @param \Closure $callback
         * @return \Illuminate\Http\Request
         * @see \Illuminate\Http\Request::setUserResolver()
         */
        public static function setUserResolver(Closure $callback)
        {
        }

        /**
         * Get the route resolver callback.
         *
         * @return \Closure
         * @see \Illuminate\Http\Request::getRouteResolver()
         */
        public static function getRouteResolver()
        {
        }

        /**
         * Set the route resolver callback.
         *
         * @param \Closure $callback
         * @return \Illuminate\Http\Request
         * @see \Illuminate\Http\Request::setRouteResolver()
         */
        public static function setRouteResolver(Closure $callback)
        {
        }

        /**
         * Get all of the input and files for the request.
         *
         * @return array
         * @see \Illuminate\Http\Request::toArray()
         */
        public static function toArray()
        {
        }

        /**
         * Determine if the given offset exists.
         *
         * @param string $offset
         * @return bool
         * @see \Illuminate\Http\Request::offsetExists()
         */
        public static function offsetExists($offset)
        {
        }

        /**
         * Get the value at the given offset.
         *
         * @param string $offset
         * @return mixed
         * @see \Illuminate\Http\Request::offsetGet()
         */
        public static function offsetGet($offset)
        {
        }

        /**
         * Set the value at the given offset.
         *
         * @param string $offset
         * @param mixed $value
         * @return null
         * @see \Illuminate\Http\Request::offsetSet()
         */
        public static function offsetSet($offset, $value)
        {
        }

        /**
         * Remove the value at the given offset.
         *
         * @param string $offset
         * @return null
         * @see \Illuminate\Http\Request::offsetUnset()
         */
        public static function offsetUnset($offset)
        {
        }

        /**
         * Check if an input element is set on the request.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Http\Request::__isset()
         */
        public static function __isset($key)
        {
        }

        /**
         * Constructor.
         *
         * @param array $query The GET parameters
         * @param array $request The POST parameters
         * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array $cookies The COOKIE parameters
         * @param array $files The FILES parameters
         * @param array $server The SERVER parameters
         * @param string|resource $content The raw body data
         * @see \Symfony\Component\HttpFoundation\Request::__construct()
         */
        public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
        {
        }

        /**
         * Sets the parameters for this request.
         *
         * This method also re-initializes all properties.
         *
         * @param array $query The GET parameters
         * @param array $request The POST parameters
         * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array $cookies The COOKIE parameters
         * @param array $files The FILES parameters
         * @param array $server The SERVER parameters
         * @param string|resource $content The raw body data
         * @see \Symfony\Component\HttpFoundation\Request::initialize()
         */
        public static function initialize(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
        {
        }

        /**
         * Creates a new request with values from PHP's super globals.
         *
         * @return static
         * @see \Symfony\Component\HttpFoundation\Request::createFromGlobals()
         */
        public static function createFromGlobals()
        {
        }

        /**
         * Creates a Request based on a given URI and configuration.
         *
         * The information contained in the URI always take precedence
         * over the other information (server and parameters).
         *
         * @param string $uri The URI
         * @param string $method The HTTP method
         * @param array $parameters The query (GET) or request (POST) parameters
         * @param array $cookies The request cookies ($_COOKIE)
         * @param array $files The request files ($_FILES)
         * @param array $server The server parameters ($_SERVER)
         * @param string $content The raw body data
         *
         * @return static
         * @see \Symfony\Component\HttpFoundation\Request::create()
         */
        public static function create($uri, $method = 'GET', $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
        {
        }

        /**
         * Sets a callable able to create a Request instance.
         *
         * This is mainly useful when you need to override the Request class
         * to keep BC with an existing system. It should not be used for any
         * other purpose.
         *
         * @param callable|null $callable A PHP callable
         * @see \Symfony\Component\HttpFoundation\Request::setFactory()
         */
        public static function setFactory($callable)
        {
        }

        /**
         * Overrides the PHP global variables according to this request instance.
         *
         * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
         * $_FILES is never overridden, see rfc1867
         * @see \Symfony\Component\HttpFoundation\Request::overrideGlobals()
         */
        public static function overrideGlobals()
        {
        }

        /**
         * Sets a list of trusted proxies.
         *
         * You should only list the reverse proxies that you manage directly.
         *
         * @param array $proxies A list of trusted proxies
         * @see \Symfony\Component\HttpFoundation\Request::setTrustedProxies()
         */
        public static function setTrustedProxies(array $proxies)
        {
        }

        /**
         * Gets the list of trusted proxies.
         *
         * @return array An array of trusted proxies
         * @see \Symfony\Component\HttpFoundation\Request::getTrustedProxies()
         */
        public static function getTrustedProxies()
        {
        }

        /**
         * Sets a list of trusted host patterns.
         *
         * You should only list the hosts you manage using regexs.
         *
         * @param array $hostPatterns A list of trusted host patterns
         * @see \Symfony\Component\HttpFoundation\Request::setTrustedHosts()
         */
        public static function setTrustedHosts(array $hostPatterns)
        {
        }

        /**
         * Gets the list of trusted host patterns.
         *
         * @return array An array of trusted host patterns
         * @see \Symfony\Component\HttpFoundation\Request::getTrustedHosts()
         */
        public static function getTrustedHosts()
        {
        }

        /**
         * Sets the name for trusted headers.
         *
         * The following header keys are supported:
         *
         * * Request::HEADER_CLIENT_IP: defaults to X-Forwarded-For (see getClientIp())
         * * Request::HEADER_CLIENT_HOST: defaults to X-Forwarded-Host (see getHost())
         * * Request::HEADER_CLIENT_PORT: defaults to X-Forwarded-Port (see getPort())
         * * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
         * * Request::HEADER_FORWARDED: defaults to Forwarded (see RFC 7239)
         *
         * Setting an empty value allows to disable the trusted header for the given key.
         *
         * @param string $key The header key
         * @param string $value The header name
         *
         * @throws \InvalidArgumentException
         * @see \Symfony\Component\HttpFoundation\Request::setTrustedHeaderName()
         */
        public static function setTrustedHeaderName($key, $value)
        {
        }

        /**
         * Gets the trusted proxy header name.
         *
         * @param string $key The header key
         *
         * @return string The header name
         *
         * @throws \InvalidArgumentException
         * @see \Symfony\Component\HttpFoundation\Request::getTrustedHeaderName()
         */
        public static function getTrustedHeaderName($key)
        {
        }

        /**
         * Normalizes a query string.
         *
         * It builds a normalized query string, where keys/value pairs are alphabetized,
         * have consistent escaping and unneeded delimiters are removed.
         *
         * @param string $qs Query string
         *
         * @return string A normalized query string for the Request
         * @see \Symfony\Component\HttpFoundation\Request::normalizeQueryString()
         */
        public static function normalizeQueryString($qs)
        {
        }

        /**
         * Enables support for the _method request parameter to determine the intended HTTP method.
         *
         * Be warned that enabling this feature might lead to CSRF issues in your code.
         * Check that you are using CSRF tokens when required.
         * If the HTTP method parameter override is enabled, an html-form with method "POST" can be altered
         * and used to send a "PUT" or "DELETE" request via the _method request parameter.
         * If these methods are not protected against CSRF, this presents a possible vulnerability.
         *
         * The HTTP method can only be overridden when the real HTTP method is POST.
         * @see \Symfony\Component\HttpFoundation\Request::enableHttpMethodParameterOverride()
         */
        public static function enableHttpMethodParameterOverride()
        {
        }

        /**
         * Checks whether support for the _method request parameter is enabled.
         *
         * @return bool True when the _method request parameter is enabled, false otherwise
         * @see \Symfony\Component\HttpFoundation\Request::getHttpMethodParameterOverride()
         */
        public static function getHttpMethodParameterOverride()
        {
        }

        /**
         * Gets the Session.
         *
         * @return SessionInterface|null The session
         * @see \Symfony\Component\HttpFoundation\Request::getSession()
         */
        public static function getSession()
        {
        }

        /**
         * Whether the request contains a Session which was started in one of the
         * previous requests.
         *
         * @return bool
         * @see \Symfony\Component\HttpFoundation\Request::hasPreviousSession()
         */
        public static function hasPreviousSession()
        {
        }

        /**
         * Whether the request contains a Session object.
         *
         * This method does not give any information about the state of the session object,
         * like whether the session is started or not. It is just a way to check if this Request
         * is associated with a Session instance.
         *
         * @return bool true when the Request contains a Session object, false otherwise
         * @see \Symfony\Component\HttpFoundation\Request::hasSession()
         */
        public static function hasSession()
        {
        }

        /**
         * Sets the Session.
         *
         * @param SessionInterface $session The Session
         * @see \Symfony\Component\HttpFoundation\Request::setSession()
         */
        public static function setSession(SessionInterface $session)
        {
        }

        /**
         * Returns the client IP addresses.
         *
         * In the returned array the most trusted IP address is first, and the
         * least trusted one last. The "real" client IP address is the last one,
         * but this is also the least trusted one. Trusted proxies are stripped.
         *
         * Use this method carefully; you should use getClientIp() instead.
         *
         * @return array The client IP addresses
         *
         * @see getClientIp()
         * @see \Symfony\Component\HttpFoundation\Request::getClientIps()
         */
        public static function getClientIps()
        {
        }

        /**
         * Returns the client IP address.
         *
         * This method can read the client IP address from the "X-Forwarded-For" header
         * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
         * header value is a comma+space separated list of IP addresses, the left-most
         * being the original client, and each successive proxy that passed the request
         * adding the IP address where it received the request from.
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-For",
         * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
         * the "client-ip" key.
         *
         * @return string The client IP address
         *
         * @see getClientIps()
         * @see http://en.wikipedia.org/wiki/X-Forwarded-For
         * @see \Symfony\Component\HttpFoundation\Request::getClientIp()
         */
        public static function getClientIp()
        {
        }

        /**
         * Returns current script name.
         *
         * @return string
         * @see \Symfony\Component\HttpFoundation\Request::getScriptName()
         */
        public static function getScriptName()
        {
        }

        /**
         * Returns the path being requested relative to the executed script.
         *
         * The path info always starts with a /.
         *
         * Suppose this request is instantiated from /mysite on localhost:
         *
         * * http://localhost/mysite returns an empty string
         * * http://localhost/mysite/about returns '/about'
         * * http://localhost/mysite/enco%20ded returns '/enco%20ded'
         * * http://localhost/mysite/about?var=1 returns '/about'
         *
         * @return string The raw path (i.e. not urldecoded)
         * @see \Symfony\Component\HttpFoundation\Request::getPathInfo()
         */
        public static function getPathInfo()
        {
        }

        /**
         * Returns the root path from which this request is executed.
         *
         * Suppose that an index.php file instantiates this request object:
         *
         * * http://localhost/index.php returns an empty string
         * * http://localhost/index.php/page returns an empty string
         * * http://localhost/web/index.php returns '/web'
         * * http://localhost/we%20b/index.php returns '/we%20b'
         *
         * @return string The raw path (i.e. not urldecoded)
         * @see \Symfony\Component\HttpFoundation\Request::getBasePath()
         */
        public static function getBasePath()
        {
        }

        /**
         * Returns the root URL from which this request is executed.
         *
         * The base URL never ends with a /.
         *
         * This is similar to getBasePath(), except that it also includes the
         * script filename (e.g. index.php) if one exists.
         *
         * @return string The raw URL (i.e. not urldecoded)
         * @see \Symfony\Component\HttpFoundation\Request::getBaseUrl()
         */
        public static function getBaseUrl()
        {
        }

        /**
         * Gets the request's scheme.
         *
         * @return string
         * @see \Symfony\Component\HttpFoundation\Request::getScheme()
         */
        public static function getScheme()
        {
        }

        /**
         * Returns the port on which the request is made.
         *
         * This method can read the client port from the "X-Forwarded-Port" header
         * when trusted proxies were set via "setTrustedProxies()".
         *
         * The "X-Forwarded-Port" header must contain the client port.
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-Port",
         * configure it via "setTrustedHeaderName()" with the "client-port" key.
         *
         * @return string
         * @see \Symfony\Component\HttpFoundation\Request::getPort()
         */
        public static function getPort()
        {
        }

        /**
         * Returns the user.
         *
         * @return string|null
         * @see \Symfony\Component\HttpFoundation\Request::getUser()
         */
        public static function getUser()
        {
        }

        /**
         * Returns the password.
         *
         * @return string|null
         * @see \Symfony\Component\HttpFoundation\Request::getPassword()
         */
        public static function getPassword()
        {
        }

        /**
         * Gets the user info.
         *
         * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
         * @see \Symfony\Component\HttpFoundation\Request::getUserInfo()
         */
        public static function getUserInfo()
        {
        }

        /**
         * Returns the HTTP host being requested.
         *
         * The port name will be appended to the host if it's non-standard.
         *
         * @return string
         * @see \Symfony\Component\HttpFoundation\Request::getHttpHost()
         */
        public static function getHttpHost()
        {
        }

        /**
         * Returns the requested URI (path and query string).
         *
         * @return string The raw URI (i.e. not URI decoded)
         * @see \Symfony\Component\HttpFoundation\Request::getRequestUri()
         */
        public static function getRequestUri()
        {
        }

        /**
         * Gets the scheme and HTTP host.
         *
         * If the URL was called with basic authentication, the user
         * and the password are not added to the generated string.
         *
         * @return string The scheme and HTTP host
         * @see \Symfony\Component\HttpFoundation\Request::getSchemeAndHttpHost()
         */
        public static function getSchemeAndHttpHost()
        {
        }

        /**
         * Generates a normalized URI (URL) for the Request.
         *
         * @return string A normalized URI (URL) for the Request
         *
         * @see getQueryString()
         * @see \Symfony\Component\HttpFoundation\Request::getUri()
         */
        public static function getUri()
        {
        }

        /**
         * Generates a normalized URI for the given path.
         *
         * @param string $path A path to use instead of the current one
         *
         * @return string The normalized URI for the path
         * @see \Symfony\Component\HttpFoundation\Request::getUriForPath()
         */
        public static function getUriForPath($path)
        {
        }

        /**
         * Returns the path as relative reference from the current Request path.
         *
         * Only the URIs path component (no schema, host etc.) is relevant and must be given.
         * Both paths must be absolute and not contain relative parts.
         * Relative URLs from one resource to another are useful when generating self-contained downloadable document archives.
         * Furthermore, they can be used to reduce the link size in documents.
         *
         * Example target paths, given a base path of "/a/b/c/d":
         * - "/a/b/c/d" -> ""
         * - "/a/b/c/" -> "./"
         * - "/a/b/" -> "../"
         * - "/a/b/c/other" -> "other"
         * - "/a/x/y" -> "../../x/y"
         *
         * @param string $path The target path
         *
         * @return string The relative target path
         * @see \Symfony\Component\HttpFoundation\Request::getRelativeUriForPath()
         */
        public static function getRelativeUriForPath($path)
        {
        }

        /**
         * Generates the normalized query string for the Request.
         *
         * It builds a normalized query string, where keys/value pairs are alphabetized
         * and have consistent escaping.
         *
         * @return string|null A normalized query string for the Request
         * @see \Symfony\Component\HttpFoundation\Request::getQueryString()
         */
        public static function getQueryString()
        {
        }

        /**
         * Checks whether the request is secure or not.
         *
         * This method can read the client protocol from the "X-Forwarded-Proto" header
         * when trusted proxies were set via "setTrustedProxies()".
         *
         * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
         * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
         * the "client-proto" key.
         *
         * @return bool
         * @see \Symfony\Component\HttpFoundation\Request::isSecure()
         */
        public static function isSecure()
        {
        }

        /**
         * Returns the host name.
         *
         * This method can read the client host name from the "X-Forwarded-Host" header
         * when trusted proxies were set via "setTrustedProxies()".
         *
         * The "X-Forwarded-Host" header must contain the client host name.
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-Host",
         * configure it via "setTrustedHeaderName()" with the "client-host" key.
         *
         * @return string
         *
         * @throws \UnexpectedValueException when the host name is invalid
         * @see \Symfony\Component\HttpFoundation\Request::getHost()
         */
        public static function getHost()
        {
        }

        /**
         * Sets the request method.
         *
         * @param string $method
         * @see \Symfony\Component\HttpFoundation\Request::setMethod()
         */
        public static function setMethod($method)
        {
        }

        /**
         * Gets the request "intended" method.
         *
         * If the X-HTTP-Method-Override header is set, and if the method is a POST,
         * then it is used to determine the "real" intended HTTP method.
         *
         * The _method request parameter can also be used to determine the HTTP method,
         * but only if enableHttpMethodParameterOverride() has been called.
         *
         * The method is always an uppercased string.
         *
         * @return string The request method
         *
         * @see getRealMethod()
         * @see \Symfony\Component\HttpFoundation\Request::getMethod()
         */
        public static function getMethod()
        {
        }

        /**
         * Gets the "real" request method.
         *
         * @return string The request method
         *
         * @see getMethod()
         * @see \Symfony\Component\HttpFoundation\Request::getRealMethod()
         */
        public static function getRealMethod()
        {
        }

        /**
         * Gets the mime type associated with the format.
         *
         * @param string $format The format
         *
         * @return string The associated mime type (null if not found)
         * @see \Symfony\Component\HttpFoundation\Request::getMimeType()
         */
        public static function getMimeType($format)
        {
        }

        /**
         * Gets the mime types associated with the format.
         *
         * @param string $format The format
         *
         * @return array The associated mime types
         * @see \Symfony\Component\HttpFoundation\Request::getMimeTypes()
         */
        public static function getMimeTypes($format)
        {
        }

        /**
         * Gets the format associated with the mime type.
         *
         * @param string $mimeType The associated mime type
         *
         * @return string|null The format (null if not found)
         * @see \Symfony\Component\HttpFoundation\Request::getFormat()
         */
        public static function getFormat($mimeType)
        {
        }

        /**
         * Associates a format with mime types.
         *
         * @param string $format The format
         * @param string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
         * @see \Symfony\Component\HttpFoundation\Request::setFormat()
         */
        public static function setFormat($format, $mimeTypes)
        {
        }

        /**
         * Gets the request format.
         *
         * Here is the process to determine the format:
         *
         * * format defined by the user (with setRequestFormat())
         * * _format request attribute
         * * $default
         *
         * @param string $default The default format
         *
         * @return string The request format
         * @see \Symfony\Component\HttpFoundation\Request::getRequestFormat()
         */
        public static function getRequestFormat($default = 'html')
        {
        }

        /**
         * Sets the request format.
         *
         * @param string $format The request format
         * @see \Symfony\Component\HttpFoundation\Request::setRequestFormat()
         */
        public static function setRequestFormat($format)
        {
        }

        /**
         * Gets the format associated with the request.
         *
         * @return string|null The format (null if no content type is present)
         * @see \Symfony\Component\HttpFoundation\Request::getContentType()
         */
        public static function getContentType()
        {
        }

        /**
         * Sets the default locale.
         *
         * @param string $locale
         * @see \Symfony\Component\HttpFoundation\Request::setDefaultLocale()
         */
        public static function setDefaultLocale($locale)
        {
        }

        /**
         * Get the default locale.
         *
         * @return string
         * @see \Symfony\Component\HttpFoundation\Request::getDefaultLocale()
         */
        public static function getDefaultLocale()
        {
        }

        /**
         * Sets the locale.
         *
         * @param string $locale
         * @see \Symfony\Component\HttpFoundation\Request::setLocale()
         */
        public static function setLocale($locale)
        {
        }

        /**
         * Get the locale.
         *
         * @return string
         * @see \Symfony\Component\HttpFoundation\Request::getLocale()
         */
        public static function getLocale()
        {
        }

        /**
         * Checks if the request method is of specified type.
         *
         * @param string $method Uppercase request method (GET, POST etc)
         *
         * @return bool
         * @see \Symfony\Component\HttpFoundation\Request::isMethod()
         */
        public static function isMethod($method)
        {
        }

        /**
         * Checks whether or not the method is safe.
         *
         * @see https://tools.ietf.org/html/rfc7231#section-4.2.1
         *
         * @param bool $andCacheable Adds the additional condition that the method should be cacheable. True by default.
         *
         * @return bool
         * @see \Symfony\Component\HttpFoundation\Request::isMethodSafe()
         */
        public static function isMethodSafe()
        {
        }

        /**
         * Checks whether or not the method is idempotent.
         *
         * @return bool
         * @see \Symfony\Component\HttpFoundation\Request::isMethodIdempotent()
         */
        public static function isMethodIdempotent()
        {
        }

        /**
         * Checks whether the method is cacheable or not.
         *
         * @see https://tools.ietf.org/html/rfc7231#section-4.2.3
         *
         * @return bool
         * @see \Symfony\Component\HttpFoundation\Request::isMethodCacheable()
         */
        public static function isMethodCacheable()
        {
        }

        /**
         * Returns the request body content.
         *
         * @param bool $asResource If true, a resource will be returned
         *
         * @return string|resource The request body content or a resource to read the body stream
         *
         * @throws \LogicException
         * @see \Symfony\Component\HttpFoundation\Request::getContent()
         */
        public static function getContent($asResource = false)
        {
        }

        /**
         * Gets the Etags.
         *
         * @return array The entity tags
         * @see \Symfony\Component\HttpFoundation\Request::getETags()
         */
        public static function getETags()
        {
        }

        /**
         * @return bool
         * @see \Symfony\Component\HttpFoundation\Request::isNoCache()
         */
        public static function isNoCache()
        {
        }

        /**
         * Returns the preferred language.
         *
         * @param array $locales An array of ordered available locales
         *
         * @return string|null The preferred locale
         * @see \Symfony\Component\HttpFoundation\Request::getPreferredLanguage()
         */
        public static function getPreferredLanguage(array $locales = null)
        {
        }

        /**
         * Gets a list of languages acceptable by the client browser.
         *
         * @return array Languages ordered in the user browser preferences
         * @see \Symfony\Component\HttpFoundation\Request::getLanguages()
         */
        public static function getLanguages()
        {
        }

        /**
         * Gets a list of charsets acceptable by the client browser.
         *
         * @return array List of charsets in preferable order
         * @see \Symfony\Component\HttpFoundation\Request::getCharsets()
         */
        public static function getCharsets()
        {
        }

        /**
         * Gets a list of encodings acceptable by the client browser.
         *
         * @return array List of encodings in preferable order
         * @see \Symfony\Component\HttpFoundation\Request::getEncodings()
         */
        public static function getEncodings()
        {
        }

        /**
         * Gets a list of content types acceptable by the client browser.
         *
         * @return array List of content types in preferable order
         * @see \Symfony\Component\HttpFoundation\Request::getAcceptableContentTypes()
         */
        public static function getAcceptableContentTypes()
        {
        }

        /**
         * Returns true if the request is a XMLHttpRequest.
         *
         * It works if your JavaScript library sets an X-Requested-With HTTP header.
         * It is known to work with common JavaScript frameworks:
         *
         * @see http://en.wikipedia.org/wiki/List_of_Ajax_frameworks#JavaScript
         *
         * @return bool true if the request is an XMLHttpRequest, false otherwise
         * @see \Symfony\Component\HttpFoundation\Request::isXmlHttpRequest()
         */
        public static function isXmlHttpRequest()
        {
        }

        
        protected static function prepareRequestUri()
        {
        }

        /**
         * Prepares the base URL.
         *
         * @return string
         * @see \Symfony\Component\HttpFoundation\Request::prepareBaseUrl()
         */
        protected static function prepareBaseUrl()
        {
        }

        /**
         * Prepares the base path.
         *
         * @return string base path
         * @see \Symfony\Component\HttpFoundation\Request::prepareBasePath()
         */
        protected static function prepareBasePath()
        {
        }

        /**
         * Prepares the path info.
         *
         * @return string path info
         * @see \Symfony\Component\HttpFoundation\Request::preparePathInfo()
         */
        protected static function preparePathInfo()
        {
        }

        /**
         * Initializes HTTP request formats.
         * @see \Symfony\Component\HttpFoundation\Request::initializeFormats()
         */
        protected static function initializeFormats()
        {
        }

        /**
         * Indicates whether this request originated from a trusted proxy.
         *
         * This can be useful to determine whether or not to trust the
         * contents of a proxy-specific header.
         *
         * @return bool true if the request came from a trusted proxy, false otherwise
         * @see \Symfony\Component\HttpFoundation\Request::isFromTrustedProxy()
         */
        public static function isFromTrustedProxy()
        {
        }

        /**
         * Determine if the given content types match.
         *
         * @param string $actual
         * @param string $type
         * @return bool
         * @see \Illuminate\Http\Request::matchesType()
         */
        public static function matchesType($actual, $type)
        {
        }

        /**
         * Determine if the request is sending JSON.
         *
         * @return bool
         * @see \Illuminate\Http\Request::isJson()
         */
        public static function isJson()
        {
        }

        /**
         * Determine if the current request probably expects a JSON response.
         *
         * @return bool
         * @see \Illuminate\Http\Request::expectsJson()
         */
        public static function expectsJson()
        {
        }

        /**
         * Determine if the current request is asking for JSON in return.
         *
         * @return bool
         * @see \Illuminate\Http\Request::wantsJson()
         */
        public static function wantsJson()
        {
        }

        /**
         * Determines whether the current requests accepts a given content type.
         *
         * @param string|array $contentTypes
         * @return bool
         * @see \Illuminate\Http\Request::accepts()
         */
        public static function accepts($contentTypes)
        {
        }

        /**
         * Return the most suitable content type from the given array based on content negotiation.
         *
         * @param string|array $contentTypes
         * @return string|null
         * @see \Illuminate\Http\Request::prefers()
         */
        public static function prefers($contentTypes)
        {
        }

        /**
         * Determines whether a request accepts JSON.
         *
         * @return bool
         * @see \Illuminate\Http\Request::acceptsJson()
         */
        public static function acceptsJson()
        {
        }

        /**
         * Determines whether a request accepts HTML.
         *
         * @return bool
         * @see \Illuminate\Http\Request::acceptsHtml()
         */
        public static function acceptsHtml()
        {
        }

        /**
         * Get the data format expected in the response.
         *
         * @param string $default
         * @return string
         * @see \Illuminate\Http\Request::format()
         */
        public static function format($default = 'html')
        {
        }

        /**
         * Retrieve an old input item.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array
         * @see \Illuminate\Http\Request::old()
         */
        public static function old($key = null, $default = null)
        {
        }

        /**
         * Flash the input for the current request to the session.
         *
         * @return null
         * @see \Illuminate\Http\Request::flash()
         */
        public static function flash()
        {
        }

        /**
         * Flash only some of the input to the session.
         *
         * @param array|mixed $keys
         * @return null
         * @see \Illuminate\Http\Request::flashOnly()
         */
        public static function flashOnly($keys)
        {
        }

        /**
         * Flash only some of the input to the session.
         *
         * @param array|mixed $keys
         * @return null
         * @see \Illuminate\Http\Request::flashExcept()
         */
        public static function flashExcept($keys)
        {
        }

        /**
         * Flush all of the old input from the session.
         *
         * @return null
         * @see \Illuminate\Http\Request::flush()
         */
        public static function flush()
        {
        }

        /**
         * Retrieve a server variable from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array
         * @see \Illuminate\Http\Request::server()
         */
        public static function server($key = null, $default = null)
        {
        }

        /**
         * Determine if a header is set on the request.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Http\Request::hasHeader()
         */
        public static function hasHeader($key)
        {
        }

        /**
         * Retrieve a header from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array
         * @see \Illuminate\Http\Request::header()
         */
        public static function header($key = null, $default = null)
        {
        }

        /**
         * Get the bearer token from the request headers.
         *
         * @return string|null
         * @see \Illuminate\Http\Request::bearerToken()
         */
        public static function bearerToken()
        {
        }

        /**
         * Determine if the request contains a given input item key.
         *
         * @param string|array $key
         * @return bool
         * @see \Illuminate\Http\Request::exists()
         */
        public static function exists($key)
        {
        }

        /**
         * Determine if the request contains a non-empty value for an input item.
         *
         * @param string|array $key
         * @return bool
         * @see \Illuminate\Http\Request::has()
         */
        public static function has($key)
        {
        }

        /**
         * Determine if the given input key is an empty string for "has".
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Http\Request::isEmptyString()
         */
        protected static function isEmptyString($key)
        {
        }

        /**
         * Get all of the input and files for the request.
         *
         * @return array
         * @see \Illuminate\Http\Request::all()
         */
        public static function all()
        {
        }

        /**
         * Retrieve an input item from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array
         * @see \Illuminate\Http\Request::input()
         */
        public static function input($key = null, $default = null)
        {
        }

        /**
         * Get a subset containing the provided keys with values from the input data.
         *
         * @param array|mixed $keys
         * @return array
         * @see \Illuminate\Http\Request::only()
         */
        public static function only($keys)
        {
        }

        /**
         * Get all of the input except for a specified array of items.
         *
         * @param array|mixed $keys
         * @return array
         * @see \Illuminate\Http\Request::except()
         */
        public static function except($keys)
        {
        }

        /**
         * Intersect an array of items with the input data.
         *
         * @param array|mixed $keys
         * @return array
         * @see \Illuminate\Http\Request::intersect()
         */
        public static function intersect($keys)
        {
        }

        /**
         * Retrieve a query string item from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array
         * @see \Illuminate\Http\Request::query()
         */
        public static function query($key = null, $default = null)
        {
        }

        /**
         * Determine if a cookie is set on the request.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Http\Request::hasCookie()
         */
        public static function hasCookie($key)
        {
        }

        /**
         * Retrieve a cookie from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array
         * @see \Illuminate\Http\Request::cookie()
         */
        public static function cookie($key = null, $default = null)
        {
        }

        /**
         * Get an array of all of the files on the request.
         *
         * @return array
         * @see \Illuminate\Http\Request::allFiles()
         */
        public static function allFiles()
        {
        }

        /**
         * Convert the given array of Symfony UploadedFiles to custom Laravel UploadedFiles.
         *
         * @param array $files
         * @return array
         * @see \Illuminate\Http\Request::convertUploadedFiles()
         */
        protected static function convertUploadedFiles(array $files)
        {
        }

        /**
         * Determine if the uploaded data contains a file.
         *
         * @param string $key
         * @return bool
         * @see \Illuminate\Http\Request::hasFile()
         */
        public static function hasFile($key)
        {
        }

        /**
         * Check that the given file is a valid file instance.
         *
         * @param mixed $file
         * @return bool
         * @see \Illuminate\Http\Request::isValidFile()
         */
        protected static function isValidFile($file)
        {
        }

        /**
         * Retrieve a file from the request.
         *
         * @param string $key
         * @param mixed $default
         * @return \Illuminate\Http\UploadedFile|array|null
         * @see \Illuminate\Http\Request::file()
         */
        public static function file($key = null, $default = null)
        {
        }

        /**
         * Retrieve a parameter item from a given source.
         *
         * @param string $source
         * @param string $key
         * @param string|array|null $default
         * @return string|array
         * @see \Illuminate\Http\Request::retrieveItem()
         */
        protected static function retrieveItem($source, $key, $default)
        {
        }

        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return null
         * @see \Illuminate\Http\Request::macro()
         */
        public static function macro($name, callable $macro)
        {
        }

        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Http\Request::hasMacro()
         */
        public static function hasMacro($name)
        {
        }

    }
}

namespace {
    class Input extends Illuminate\Support\Facades\Input
    {
    }
}