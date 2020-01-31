<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference\support;

use Illuminate\Support\Facades\DB;

class TableSchema
{

    public $tableSchema;
    public $tableName;

    public $tablePrefix;
    public $databaseName;

    /**
     * @var ColumnSchema[]
     */
    public $columns;

    public function __construct($table)
    {
        $this->tablePrefix = DB::getTablePrefix();
        $this->databaseName = DB::getDatabaseName();
        $this->tableName = "{$this->tablePrefix}{$table}";
        $this->columns = DB::select("SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='$this->databaseName' AND TABLE_NAME ='$this->tableName'");
        $this->intoColumnSchema();
    }

    protected function intoColumnSchema()
    {
        foreach ($this->columns as &$column) {
            $column = new ColumnSchema($column);
        }
    }
}
