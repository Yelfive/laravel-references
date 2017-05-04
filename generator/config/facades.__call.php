<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-04
 */

/**
 * This is used when facades accessor has a __call to redirect the methods call into another class
 *```
 * accessor::class => another::class
 *```
 */
return [
    \Illuminate\Session\SessionManager::class => \Illuminate\Session\Store::class
];