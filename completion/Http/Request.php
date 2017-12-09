<?php

namespace Illuminate\Http;

use Symfony\Component\HttpFoundation\Session\SessionInterface;


class Request
{
    const HEADER_FORWARDED = 1;

    const HEADER_X_FORWARDED_FOR = 2;

    const HEADER_X_FORWARDED_HOST = 4;

    const HEADER_X_FORWARDED_PROTO = 8;

    const HEADER_X_FORWARDED_PORT = 16;

    const HEADER_X_FORWARDED_ALL = 30;

    const HEADER_X_FORWARDED_AWS_ELB = 26;

    const HEADER_CLIENT_IP = 2;

    const HEADER_CLIENT_HOST = 4;

    const HEADER_CLIENT_PROTO = 8;

    const HEADER_CLIENT_PORT = 16;

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
     *
     * @deprecated since version 3.3, to be removed in 4.0
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
     * @var string|resource
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
    public function initialize(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
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
    public function overrideGlobals()
    {
    }

    /**
     * Sets a list of trusted proxies.
     *
     * You should only list the reverse proxies that you manage directly.
     *
     * @param array $proxies A list of trusted proxies
     * @param int $trustedHeaderSet A bit field of Request::HEADER_*, to set which headers to trust from your proxies
     *
     * @throws \InvalidArgumentException When $trustedHeaderSet is invalid
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
     * Gets the set of trusted headers from trusted proxies.
     *
     * @return int A bit field of Request::HEADER_* that defines which headers are trusted from your proxies
     * @see \Symfony\Component\HttpFoundation\Request::getTrustedHeaderSet()
     */
    public static function getTrustedHeaderSet()
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
     *
     * @deprecated since version 3.3, to be removed in 4.0. Use the $trustedHeaderSet argument of the Request::setTrustedProxies() method instead.
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
     *
     * @deprecated since version 3.3, to be removed in 4.0. Use the Request::getTrustedHeaderSet() method instead.
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
     * Gets a "parameter" value from any bag.
     *
     * This method is mainly useful for libraries that want to provide some flexibility. If you don't need the
     * flexibility in controllers, it is better to explicitly get request parameters from the appropriate
     * public property instead (attributes, query, request).
     *
     * Order of precedence: PATH (routing placeholders or custom attributes), GET, BODY
     *
     * @param string $key The key
     * @param mixed $default The default value if the parameter key does not exist
     *
     * @return mixed
     * @see \Symfony\Component\HttpFoundation\Request::get()
     */
    public function get($key, $default = null)
    {
    }

    /**
     * Gets the Session.
     *
     * @return SessionInterface|null The session
     * @see \Symfony\Component\HttpFoundation\Request::getSession()
     */
    public function getSession()
    {
    }

    /**
     * Whether the request contains a Session which was started in one of the
     * previous requests.
     *
     * @return bool
     * @see \Symfony\Component\HttpFoundation\Request::hasPreviousSession()
     */
    public function hasPreviousSession()
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
    public function hasSession()
    {
    }

    /**
     * Sets the Session.
     *
     * @param SessionInterface $session The Session
     * @see \Symfony\Component\HttpFoundation\Request::setSession()
     */
    public function setSession(SessionInterface $session)
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
    public function getClientIps()
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
     * ("Client-Ip" for instance), configure it via the $trustedHeaderSet
     * argument of the Request::setTrustedProxies() method instead.
     *
     * @return string|null The client IP address
     *
     * @see getClientIps()
     * @see http://en.wikipedia.org/wiki/X-Forwarded-For
     * @see \Symfony\Component\HttpFoundation\Request::getClientIp()
     */
    public function getClientIp()
    {
    }

    /**
     * Returns current script name.
     *
     * @return string
     * @see \Symfony\Component\HttpFoundation\Request::getScriptName()
     */
    public function getScriptName()
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
    public function getPathInfo()
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
    public function getBasePath()
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
    public function getBaseUrl()
    {
    }

    /**
     * Gets the request's scheme.
     *
     * @return string
     * @see \Symfony\Component\HttpFoundation\Request::getScheme()
     */
    public function getScheme()
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
     * configure it via via the $trustedHeaderSet argument of the
     * Request::setTrustedProxies() method instead.
     *
     * @return int|string can be a string if fetched from the server bag
     * @see \Symfony\Component\HttpFoundation\Request::getPort()
     */
    public function getPort()
    {
    }

    /**
     * Returns the user.
     *
     * @return string|null
     * @see \Symfony\Component\HttpFoundation\Request::getUser()
     */
    public function getUser()
    {
    }

    /**
     * Returns the password.
     *
     * @return string|null
     * @see \Symfony\Component\HttpFoundation\Request::getPassword()
     */
    public function getPassword()
    {
    }

    /**
     * Gets the user info.
     *
     * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
     * @see \Symfony\Component\HttpFoundation\Request::getUserInfo()
     */
    public function getUserInfo()
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
    public function getHttpHost()
    {
    }

    /**
     * Returns the requested URI (path and query string).
     *
     * @return string The raw URI (i.e. not URI decoded)
     * @see \Symfony\Component\HttpFoundation\Request::getRequestUri()
     */
    public function getRequestUri()
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
    public function getSchemeAndHttpHost()
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
    public function getUri()
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
    public function getUriForPath($path)
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
    public function getRelativeUriForPath($path)
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
    public function getQueryString()
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
     * ("SSL_HTTPS" for instance), configure it via the $trustedHeaderSet
     * argument of the Request::setTrustedProxies() method instead.
     *
     * @return bool
     * @see \Symfony\Component\HttpFoundation\Request::isSecure()
     */
    public function isSecure()
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
     * configure it via the $trustedHeaderSet argument of the
     * Request::setTrustedProxies() method instead.
     *
     * @return string
     *
     * @throws SuspiciousOperationException when the host name is invalid or not trusted
     * @see \Symfony\Component\HttpFoundation\Request::getHost()
     */
    public function getHost()
    {
    }

    /**
     * Sets the request method.
     *
     * @param string $method
     * @see \Symfony\Component\HttpFoundation\Request::setMethod()
     */
    public function setMethod($method)
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
    public function getMethod()
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
    public function getRealMethod()
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
    public function getMimeType($format)
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
    public function getFormat($mimeType)
    {
    }

    /**
     * Associates a format with mime types.
     *
     * @param string $format The format
     * @param string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
     * @see \Symfony\Component\HttpFoundation\Request::setFormat()
     */
    public function setFormat($format, $mimeTypes)
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
    public function getRequestFormat($default = 'html')
    {
    }

    /**
     * Sets the request format.
     *
     * @param string $format The request format
     * @see \Symfony\Component\HttpFoundation\Request::setRequestFormat()
     */
    public function setRequestFormat($format)
    {
    }

    /**
     * Gets the format associated with the request.
     *
     * @return string|null The format (null if no content type is present)
     * @see \Symfony\Component\HttpFoundation\Request::getContentType()
     */
    public function getContentType()
    {
    }

    /**
     * Sets the default locale.
     *
     * @param string $locale
     * @see \Symfony\Component\HttpFoundation\Request::setDefaultLocale()
     */
    public function setDefaultLocale($locale)
    {
    }

    /**
     * Get the default locale.
     *
     * @return string
     * @see \Symfony\Component\HttpFoundation\Request::getDefaultLocale()
     */
    public function getDefaultLocale()
    {
    }

    /**
     * Sets the locale.
     *
     * @param string $locale
     * @see \Symfony\Component\HttpFoundation\Request::setLocale()
     */
    public function setLocale($locale)
    {
    }

    /**
     * Get the locale.
     *
     * @return string
     * @see \Symfony\Component\HttpFoundation\Request::getLocale()
     */
    public function getLocale()
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
    public function isMethod($method)
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
    public function isMethodSafe()
    {
    }

    /**
     * Checks whether or not the method is idempotent.
     *
     * @return bool
     * @see \Symfony\Component\HttpFoundation\Request::isMethodIdempotent()
     */
    public function isMethodIdempotent()
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
    public function isMethodCacheable()
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
    public function getContent($asResource = false)
    {
    }

    /**
     * Gets the Etags.
     *
     * @return array The entity tags
     * @see \Symfony\Component\HttpFoundation\Request::getETags()
     */
    public function getETags()
    {
    }

    /**
     * @return bool
     * @see \Symfony\Component\HttpFoundation\Request::isNoCache()
     */
    public function isNoCache()
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
    public function getPreferredLanguage(array $locales = null)
    {
    }

    /**
     * Gets a list of languages acceptable by the client browser.
     *
     * @return array Languages ordered in the user browser preferences
     * @see \Symfony\Component\HttpFoundation\Request::getLanguages()
     */
    public function getLanguages()
    {
    }

    /**
     * Gets a list of charsets acceptable by the client browser.
     *
     * @return array List of charsets in preferable order
     * @see \Symfony\Component\HttpFoundation\Request::getCharsets()
     */
    public function getCharsets()
    {
    }

    /**
     * Gets a list of encodings acceptable by the client browser.
     *
     * @return array List of encodings in preferable order
     * @see \Symfony\Component\HttpFoundation\Request::getEncodings()
     */
    public function getEncodings()
    {
    }

    /**
     * Gets a list of content types acceptable by the client browser.
     *
     * @return array List of content types in preferable order
     * @see \Symfony\Component\HttpFoundation\Request::getAcceptableContentTypes()
     */
    public function getAcceptableContentTypes()
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
    public function isXmlHttpRequest()
    {
    }

    
    protected function prepareRequestUri()
    {
    }

    /**
     * Prepares the base URL.
     *
     * @return string
     * @see \Symfony\Component\HttpFoundation\Request::prepareBaseUrl()
     */
    protected function prepareBaseUrl()
    {
    }

    /**
     * Prepares the base path.
     *
     * @return string base path
     * @see \Symfony\Component\HttpFoundation\Request::prepareBasePath()
     */
    protected function prepareBasePath()
    {
    }

    /**
     * Prepares the path info.
     *
     * @return string path info
     * @see \Symfony\Component\HttpFoundation\Request::preparePathInfo()
     */
    protected function preparePathInfo()
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
    public function isFromTrustedProxy()
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
    public function isJson()
    {
    }

    /**
     * Determine if the current request probably expects a JSON response.
     *
     * @return bool
     * @see \Illuminate\Http\Request::expectsJson()
     */
    public function expectsJson()
    {
    }

    /**
     * Determine if the current request is asking for JSON in return.
     *
     * @return bool
     * @see \Illuminate\Http\Request::wantsJson()
     */
    public function wantsJson()
    {
    }

    /**
     * Determines whether the current requests accepts a given content type.
     *
     * @param string|array $contentTypes
     * @return bool
     * @see \Illuminate\Http\Request::accepts()
     */
    public function accepts($contentTypes)
    {
    }

    /**
     * Return the most suitable content type from the given array based on content negotiation.
     *
     * @param string|array $contentTypes
     * @return string|null
     * @see \Illuminate\Http\Request::prefers()
     */
    public function prefers($contentTypes)
    {
    }

    /**
     * Determines whether a request accepts JSON.
     *
     * @return bool
     * @see \Illuminate\Http\Request::acceptsJson()
     */
    public function acceptsJson()
    {
    }

    /**
     * Determines whether a request accepts HTML.
     *
     * @return bool
     * @see \Illuminate\Http\Request::acceptsHtml()
     */
    public function acceptsHtml()
    {
    }

    /**
     * Get the data format expected in the response.
     *
     * @param string $default
     * @return string
     * @see \Illuminate\Http\Request::format()
     */
    public function format($default = 'html')
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
    public function old($key = null, $default = null)
    {
    }

    /**
     * Flash the input for the current request to the session.
     *
     * @return null
     * @see \Illuminate\Http\Request::flash()
     */
    public function flash()
    {
    }

    /**
     * Flash only some of the input to the session.
     *
     * @param array|mixed $keys
     * @return null
     * @see \Illuminate\Http\Request::flashOnly()
     */
    public function flashOnly($keys)
    {
    }

    /**
     * Flash only some of the input to the session.
     *
     * @param array|mixed $keys
     * @return null
     * @see \Illuminate\Http\Request::flashExcept()
     */
    public function flashExcept($keys)
    {
    }

    /**
     * Flush all of the old input from the session.
     *
     * @return null
     * @see \Illuminate\Http\Request::flush()
     */
    public function flush()
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
    public function server($key = null, $default = null)
    {
    }

    /**
     * Determine if a header is set on the request.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Http\Request::hasHeader()
     */
    public function hasHeader($key)
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
    public function header($key = null, $default = null)
    {
    }

    /**
     * Get the bearer token from the request headers.
     *
     * @return string|null
     * @see \Illuminate\Http\Request::bearerToken()
     */
    public function bearerToken()
    {
    }

    /**
     * Determine if the request contains a given input item key.
     *
     * @param string|array $key
     * @return bool
     * @see \Illuminate\Http\Request::exists()
     */
    public function exists($key)
    {
    }

    /**
     * Determine if the request contains a given input item key.
     *
     * @param string|array $key
     * @return bool
     * @see \Illuminate\Http\Request::has()
     */
    public function has($key)
    {
    }

    /**
     * Determine if the request contains any of the given inputs.
     *
     * @param dynamic $key
     * @return bool
     * @see \Illuminate\Http\Request::hasAny()
     */
    public function hasAny($keys)
    {
    }

    /**
     * Determine if the request contains a non-empty value for an input item.
     *
     * @param string|array $key
     * @return bool
     * @see \Illuminate\Http\Request::filled()
     */
    public function filled($key)
    {
    }

    /**
     * Determine if the given input key is an empty string for "has".
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Http\Request::isEmptyString()
     */
    protected function isEmptyString($key)
    {
    }

    /**
     * Get the keys for all of the input and files.
     *
     * @return array
     * @see \Illuminate\Http\Request::keys()
     */
    public function keys()
    {
    }

    /**
     * Get all of the input and files for the request.
     *
     * @param array|mixed $keys
     * @return array
     * @see \Illuminate\Http\Request::all()
     */
    public function all($keys = null)
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
    public function input($key = null, $default = null)
    {
    }

    /**
     * Get a subset containing the provided keys with values from the input data.
     *
     * @param array|mixed $keys
     * @return array
     * @see \Illuminate\Http\Request::only()
     */
    public function only($keys)
    {
    }

    /**
     * Get all of the input except for a specified array of items.
     *
     * @param array|mixed $keys
     * @return array
     * @see \Illuminate\Http\Request::except()
     */
    public function except($keys)
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
    public function query($key = null, $default = null)
    {
    }

    /**
     * Retrieve a request payload item from the request.
     *
     * @param string $key
     * @param string|array|null $default
     *
     * @return string|array
     * @see \Illuminate\Http\Request::post()
     */
    public function post($key = null, $default = null)
    {
    }

    /**
     * Determine if a cookie is set on the request.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Http\Request::hasCookie()
     */
    public function hasCookie($key)
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
    public function cookie($key = null, $default = null)
    {
    }

    /**
     * Get an array of all of the files on the request.
     *
     * @return array
     * @see \Illuminate\Http\Request::allFiles()
     */
    public function allFiles()
    {
    }

    /**
     * Convert the given array of Symfony UploadedFiles to custom Laravel UploadedFiles.
     *
     * @param array $files
     * @return array
     * @see \Illuminate\Http\Request::convertUploadedFiles()
     */
    protected function convertUploadedFiles(array $files)
    {
    }

    /**
     * Determine if the uploaded data contains a file.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Http\Request::hasFile()
     */
    public function hasFile($key)
    {
    }

    /**
     * Check that the given file is a valid file instance.
     *
     * @param mixed $file
     * @return bool
     * @see \Illuminate\Http\Request::isValidFile()
     */
    protected function isValidFile($file)
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
    public function file($key = null, $default = null)
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
    protected function retrieveItem($source, $key, $default)
    {
    }

    /**
     * Register a custom macro.
     *
     * @param string $name
     * @param object|callable $macro
     *
     * @return null
     * @see \Illuminate\Http\Request::macro()
     */
    public static function macro($name, $macro)
    {
    }

    /**
     * Mix another object into the class.
     *
     * @param object $mixin
     * @return null
     * @see \Illuminate\Http\Request::mixin()
     */
    public static function mixin($mixin)
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

    /**
     * @param array $rules
     *
     * @return \
     */
    public static function validate($rules)
    {
    }

}