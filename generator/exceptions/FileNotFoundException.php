<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-01
 */

namespace fk\reference\exceptions;

class FileNotFoundException extends \Exception
{
    public function __construct($path, $code = 0, \Exception $previous = null)
    {
        $message = "File not found: $path";
        parent::__construct($message, $code, $previous);
    }
}