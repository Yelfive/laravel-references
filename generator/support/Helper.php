<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-01
 */

namespace fk\reference\support;

class Helper
{
    /**
     * @param mixed $input
     * @return string
     */
    public static function dump($input, $return = true)
    {
        if (is_string($input)) {
            return "'$input'";
        } else if (is_array($input)) {
            $items = [];
            foreach ($input as $item) {
                if (!is_scalar($item)) {
                    $items[] = static::dump($item);
                } else if (is_string($item)) {
                    $items[] = "'$item'";
                } else {
                    $items[] = $item;
                }
            }
            return '[' . implode(', ', $items) . ']';
        }
    }
}