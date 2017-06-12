<?php

namespace Illuminate\Support\Facades {



    /**
     * @see Illuminate\Support\Facades\File
     * @see Illuminate\Filesystem\Filesystem
     */
    class File
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
         * The registered string macros.
         *
         * @var array
         */
        protected static $macros;

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
         * Determine if a file or directory exists.
         *
         * @param string $path
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::exists()
         */
        public static function exists($path)
        {
        }

        /**
         * Get the contents of a file.
         *
         * @param string $path
         * @param bool $lock
         * @return string
         *
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @see \Illuminate\Filesystem\Filesystem::get()
         */
        public static function get($path, $lock = false)
        {
        }

        /**
         * Get contents of a file with shared access.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Filesystem\Filesystem::sharedGet()
         */
        public static function sharedGet($path)
        {
        }

        /**
         * Get the returned value of a file.
         *
         * @param string $path
         * @return mixed
         *
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @see \Illuminate\Filesystem\Filesystem::getRequire()
         */
        public static function getRequire($path)
        {
        }

        /**
         * Require the given file once.
         *
         * @param string $file
         * @return mixed
         * @see \Illuminate\Filesystem\Filesystem::requireOnce()
         */
        public static function requireOnce($file)
        {
        }

        /**
         * Write the contents of a file.
         *
         * @param string $path
         * @param string $contents
         * @param bool $lock
         * @return int
         * @see \Illuminate\Filesystem\Filesystem::put()
         */
        public static function put($path, $contents, $lock = false)
        {
        }

        /**
         * Prepend to a file.
         *
         * @param string $path
         * @param string $data
         * @return int
         * @see \Illuminate\Filesystem\Filesystem::prepend()
         */
        public static function prepend($path, $data)
        {
        }

        /**
         * Append to a file.
         *
         * @param string $path
         * @param string $data
         * @return int
         * @see \Illuminate\Filesystem\Filesystem::append()
         */
        public static function append($path, $data)
        {
        }

        /**
         * Get or set UNIX mode of a file or directory.
         *
         * @param string $path
         * @param int $mode
         * @return mixed
         * @see \Illuminate\Filesystem\Filesystem::chmod()
         */
        public static function chmod($path, $mode = null)
        {
        }

        /**
         * Delete the file at a given path.
         *
         * @param string|array $paths
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::delete()
         */
        public static function delete($paths)
        {
        }

        /**
         * Move a file to a new location.
         *
         * @param string $path
         * @param string $target
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::move()
         */
        public static function move($path, $target)
        {
        }

        /**
         * Copy a file to a new location.
         *
         * @param string $path
         * @param string $target
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::copy()
         */
        public static function copy($path, $target)
        {
        }

        /**
         * Create a hard link to the target file or directory.
         *
         * @param string $target
         * @param string $link
         * @return null
         * @see \Illuminate\Filesystem\Filesystem::link()
         */
        public static function link($target, $link)
        {
        }

        /**
         * Extract the file name from a file path.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Filesystem\Filesystem::name()
         */
        public static function name($path)
        {
        }

        /**
         * Extract the trailing name component from a file path.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Filesystem\Filesystem::basename()
         */
        public static function basename($path)
        {
        }

        /**
         * Extract the parent directory from a file path.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Filesystem\Filesystem::dirname()
         */
        public static function dirname($path)
        {
        }

        /**
         * Extract the file extension from a file path.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Filesystem\Filesystem::extension()
         */
        public static function extension($path)
        {
        }

        /**
         * Get the file type of a given file.
         *
         * @param string $path
         * @return string
         * @see \Illuminate\Filesystem\Filesystem::type()
         */
        public static function type($path)
        {
        }

        /**
         * Get the mime-type of a given file.
         *
         * @param string $path
         * @return string|false
         * @see \Illuminate\Filesystem\Filesystem::mimeType()
         */
        public static function mimeType($path)
        {
        }

        /**
         * Get the file size of a given file.
         *
         * @param string $path
         * @return int
         * @see \Illuminate\Filesystem\Filesystem::size()
         */
        public static function size($path)
        {
        }

        /**
         * Get the file's last modification time.
         *
         * @param string $path
         * @return int
         * @see \Illuminate\Filesystem\Filesystem::lastModified()
         */
        public static function lastModified($path)
        {
        }

        /**
         * Determine if the given path is a directory.
         *
         * @param string $directory
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::isDirectory()
         */
        public static function isDirectory($directory)
        {
        }

        /**
         * Determine if the given path is readable.
         *
         * @param string $path
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::isReadable()
         */
        public static function isReadable($path)
        {
        }

        /**
         * Determine if the given path is writable.
         *
         * @param string $path
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::isWritable()
         */
        public static function isWritable($path)
        {
        }

        /**
         * Determine if the given path is a file.
         *
         * @param string $file
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::isFile()
         */
        public static function isFile($file)
        {
        }

        /**
         * Find path names matching a given pattern.
         *
         * @param string $pattern
         * @param int $flags
         * @return array
         * @see \Illuminate\Filesystem\Filesystem::glob()
         */
        public static function glob($pattern, $flags = 0)
        {
        }

        /**
         * Get an array of all files in a directory.
         *
         * @param string $directory
         * @return array
         * @see \Illuminate\Filesystem\Filesystem::files()
         */
        public static function files($directory)
        {
        }

        /**
         * Get all of the files from the given directory (recursive).
         *
         * @param string $directory
         * @param bool $hidden
         * @return array
         * @see \Illuminate\Filesystem\Filesystem::allFiles()
         */
        public static function allFiles($directory, $hidden = false)
        {
        }

        /**
         * Get all of the directories within a given directory.
         *
         * @param string $directory
         * @return array
         * @see \Illuminate\Filesystem\Filesystem::directories()
         */
        public static function directories($directory)
        {
        }

        /**
         * Create a directory.
         *
         * @param string $path
         * @param int $mode
         * @param bool $recursive
         * @param bool $force
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::makeDirectory()
         */
        public static function makeDirectory($path, $mode = 493, $recursive = false, $force = false)
        {
        }

        /**
         * Move a directory.
         *
         * @param string $from
         * @param string $to
         * @param bool $overwrite
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::moveDirectory()
         */
        public static function moveDirectory($from, $to, $overwrite = false)
        {
        }

        /**
         * Copy a directory from one location to another.
         *
         * @param string $directory
         * @param string $destination
         * @param int $options
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::copyDirectory()
         */
        public static function copyDirectory($directory, $destination, $options = null)
        {
        }

        /**
         * Recursively delete a directory.
         *
         * The directory itself may be optionally preserved.
         *
         * @param string $directory
         * @param bool $preserve
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::deleteDirectory()
         */
        public static function deleteDirectory($directory, $preserve = false)
        {
        }

        /**
         * Empty the specified directory of all files and folders.
         *
         * @param string $directory
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::cleanDirectory()
         */
        public static function cleanDirectory($directory)
        {
        }

        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return null
         * @see \Illuminate\Filesystem\Filesystem::macro()
         */
        public static function macro($name, callable $macro)
        {
        }

        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool
         * @see \Illuminate\Filesystem\Filesystem::hasMacro()
         */
        public static function hasMacro($name)
        {
        }

    }
}

namespace {
    class File extends Illuminate\Support\Facades\File
    {
    }
}