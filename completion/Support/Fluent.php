<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-03
 */

namespace Illuminate\Support;

/**
 * @see \Illuminate\Database\Schema\Grammars\MySqlGrammar, modifyXXX
 *
 * @method $this virtualAs(string $alias)
 * @method $this storedAs(string $alias)
 * @method $this unsigned)
 * @method $this charset(string $charset)
 * @method $this collate(string $collate)
 * @method $this nullable(bool $nullable = true)
 * @method $this default(string $value)
 * @method $this increment() Set as auto increment row
 * @method $this comment(string $comment)
 * @method $this after(string $column)
 * @method $this first()
 * @method $this change() Indicates altering a column
 *
 * @method $this references(string $column) The reference column of the foreign table @see \Illuminate\Database\Schema\Blueprint::foreign for more information
 * @method $this on(string $table) Foreign table name
 *
 * @method $this unique() Create unique index at this column
 *
 */
class Fluent
{

}