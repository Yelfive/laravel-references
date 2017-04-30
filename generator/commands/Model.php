<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference\commands;

use fk\reference\support\ColumnSchema;
use fk\reference\support\TableSchema;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Model extends Command
{

    protected $name = 'reference:model';
//    protected $signature = 'reference:model {names?* : name of the table} {--d|dir=App\Models}';

    protected $description = 'Generate model references or create model instead of `php artisan make:model`';

    public function handle()
    {
        if ($this->hasArgument('tables')) {
            $this->generateModels();
        } else {
            $this->generateDocs();
        }
    }

    protected function generateDocs()
    {

    }

    protected function generateModels()
    {
        $tables = $this->argument('tables');
        foreach ($tables as $table) {
            $table = strtolower($table);
            $this->generateModel($table);
        }
    }

    protected function generateModel($table)
    {
        $schema = $this->getTableSchema($table);
        $dir = app_path('test/');
        $namespace = 'App\Models';

        $columns = $rules = [];
        foreach ($schema->columns as $column) {
            $columns[] = [
                $this->getColumnType($column->columnType), $column->columnName, ''
            ];
            $rules[$column->columnName] = $this->getRules($column);
        }
        $modelName = ucfirst(ColumnSchema::camelCase($table));
        $baseModelName = 'App\Models';
        $content = $this->render([
            'namespace' => $namespace,
            'columns' => $columns,
            'modelName' => $modelName,
            'baseModelName' => $baseModelName,
            'rules' => $rules,
            'tableName' => $table,
        ]);
    }

    /**
     * @param ColumnSchema $column
     * @return array
     */
    protected function getRules($column)
    {
        $callable = false;
        $rules = [];
        switch ($column->columnType) {
            case 'tinyint':
            case 'mediumint':
            case 'int':
            case 'bigint':
                $rules = ['integer'];
                if ($column->columnType === 'tinyint') {
//                    var_dump($column->unsigned, 123);die;
                    if ($column->unsigned) {
                        $rules[] = 'min:0';
                        $rules[] = 'max:255';
                    } else {
                        $rules[] = 'min:-128';
                        $rules[] = 'max:127';
                    }
                }
                if ($column->columnType === 'mediumint') {
                    if ($column->unsigned) {
                        $rules[] = 'min:0';
                        $rules[] = 'max:16777215';
                    } else {
                        $rules[] = 'min:-8388608';
                        $rules[] = 'max:8388607';
                    }
                } else if ($column->columnType === 'int') {
                    if ($column->unsigned) {
                        $rules[] = 'min:0';
                        $rules[] = 'max:4294967295';
                    } else {
                        $rules[] = 'min:-2147683648';
                        $rules[] = 'max:2147683647';
                    }
                }
                break;
            case 'decimal':
                $rules = [
                    'float'
                ];
                break;
            case 'varchar':
                $rules = [
                    'string',
                    'max:' . $column->characterMaximumLength
                ];
                break;
            default:
                $rules[] = '';
        }
        return $callable ? $rules : implode('|', $rules);
    }

    protected function getColumnType($type)
    {
        switch ($type) {
            case 'tinyint':
            case 'int':
                return 'integer';
            case 'decimal':
                return 'float';
            case 'varchar':
                return 'string';
            default:
                return $type;
        }
    }

    protected function render($params)
    {
        $path = __DIR__ . '/../templates/model.php';
        extract($params);
        ob_start();
        include $path;
        $content = ob_get_clean();
        echo $content;
        die;
    }

    protected function getTableSchema($table)
    {
        return new TableSchema($table);
    }

    protected function getArguments()
    {
        return [
            ['tables', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, 'Name(s) of the table']
        ];
    }

    protected function getOptions()
    {
        return [
            ['dir', 'd', InputOption::VALUE_OPTIONAL, 'Directory for the models to be placed', 'App\Models'],
        ];
    }

}