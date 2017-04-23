<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-22
 */

namespace Illuminate\Support;

/**
 * Class Fluent
 * @package Illuminate\Support
 * @see
 * [[DB Modifiers]]
 * @method $this after(string $column) Place the column "after" another column (MySQL Only)
 * @method $this comment(string $comment) Add a comment to a column
 * @method $this default(string $value) Specify a "default" value for the column
 * @method $this first() Place the column "first" in the table (MySQL Only)
 * @method $this nullable() Allow NULL values to be inserted into the column
 * @method $this storeAs($expression) Create a stored generated column (MySQL Only)
 * @method $this unsigned() Set integer columns to UNSIGNED
 * @method $this virtualAs($expression) Create a virtual generated column (MySQL Only)
 * @method $this change() Indicates the change of an existed column
 *
 * @method $this references(string $column)
 * @method $this on(string $table)
 *
 */
class Fluent
{

}