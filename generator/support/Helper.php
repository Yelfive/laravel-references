<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-01
 */

namespace fk\reference\support;

use fk\reference\exceptions\InvalidVariableException;

class Helper
{

    public static function isIndexedArray($array)
    {
        $i = -1;
        foreach ($array as $k => $v) {
            if (is_string($k) || $k !== $i + 1) {
                return false;
            } else {
                $i = $k;
            }
        }
        return true;
    }

    /**
     * @param mixed $input
     * @param bool $inline
     * @param int $depth
     * @return string
     * @throws InvalidVariableException
     */
    public static function dump($input, bool $inline = false, $depth = 1): string
    {
        if (is_array($input)) {
            $string = '';

            $space = $inline ? ' ' : "\n" . str_repeat(' ', $depth * 4);

            if (static::isIndexedArray($input)) {
                foreach ($input as $value) {
                    $string .= ",$space" . (is_scalar($value) ? static::escape($value) : static::dump($value, $inline, $depth + 1));
                }
            } else {
                foreach ($input as $k => $value) {
                    $string .= ",$space" . static::escape($k) . ' => ' . (is_scalar($value) ? static::escape($value) : static::dump($value, $inline, $depth + 1));
                }
            }

            $chars = $inline ? ', ' : ',';
            return '[' . ltrim($string, $chars) . ($inline ? '' : ',') . substr($space, 0, -4) . ']';
        } else {
            return static::escape($input);
        }
    }

    protected static function escape($input)
    {
        if (is_numeric($input)) {
            return $input;
        } else if (is_string($input)) {
            return "'$input'";
        } else if (is_null($input)) {
            return 'null';
        } else if (is_bool($input)) {
            return $input ? 'true' : 'false';
        } else if (is_int($input)) {
            return $input;
        } else if ($input instanceof DumperExpression) {
            return $input->expression;
        }
    }
}