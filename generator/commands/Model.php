<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */

namespace fk\reference\commands;

use fk\reference\exceptions\FileNotFoundException;
use fk\reference\IdeReferenceServiceProvider;
use fk\reference\support\ColumnSchema;
use fk\reference\support\Helper;
use fk\reference\support\TableSchema;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Model extends Command
{

    protected $name = 'reference:model';

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

    protected function compareModel($filename, $content)
    {
        $tmp = sys_get_temp_dir() . '/php_temp';
        file_put_contents($tmp, $content);
        exec(<<<CMD
diff -y $filename $tmp
CMD
            , $output);
        unlink($tmp);
        if (!$output) {
            $this->info('The model is untouched');
            return;
        } else {
            $this->warn(str_repeat('\<', 10) . " diff\n");
            $this->warn("# old" . str_repeat("\t", 8) . '# new');
            $this->warn(implode("\n", $output));
            $this->info(str_repeat('\<', 10) . " model\n");
            $this->info($content);
        }
    }

    protected function doubleConfirm($model)
    {
        return $this->ask(<<<QUESTION
------------------------------------------------
| Are you sure you want to overwrite the model?  |
| Enter model's short name to overwrite          |
| Notice: the name is case-sensitive             |
 ------------------------------------------------
 Enter '$model'
QUESTION
        );
    }

    protected function write($modelShortName, $content)
    {
        $file = base_path($this->config('dir')) . "/$modelShortName.php";
        $file = str_replace('\\', '/', $file);
        $existedAlready = file_exists($file);
        if (
            $existedAlready
            &&
            (
                $this->option('overwrite') === false
                || $this->doubleConfirm($modelShortName) !== $modelShortName
            )
        ) {
            if ($this->option('overwrite')) {
                $this->error("Confirm failed. The answer is `$modelShortName`");
                sleep(1);
            }
            $this->warn("Model `$modelShortName` already exists at : $file");
            $this->compareModel($file, $content);
            $this->error('Use option --overwrite if you want to overwrite the existed file.');
            return;
        }

        $dir = dirname($file);
        if (!file_exists($dir)) {
            if ($this->confirm("Directory [$dir] does not exist! Create?", false)) {
                mkdir($dir, 0755, true);
                $this->comment('Directory created');
            } else {
                return;
            }
        }
        fwrite($handler = fopen($file, 'w'), $content);
        fclose($handler);
        $this->comment("Model `$modelShortName` " . ($existedAlready ? 'updated.' : 'created.'));
    }

    protected function config($name, $default = '')
    {
        return config(IdeReferenceServiceProvider::CONFIG_NAMESPACE . ".model.$name", $default);
    }

    protected function generateModel($table)
    {
        $schema = $this->getTableSchema($table);
        $namespace = $this->config('namespace', 'App\Models');

        $columns = $rules = [];
        foreach ($schema->columns as $column) {
            $description = ($column->columnDefault === null ? '' : "[Default " . Helper::dump($column->columnDefault, true) . "] ") . $column->columnComment;
            $columns[] = [
                $this->getColumnType($column->columnType), $column->columnName, $description
            ];

            // Do not set rules for primary key, for they are always auto increment
            if ($column->columnKey !== 'PRI') {
                $rules[$column->columnName] = $this->getRules($column);
            }
        }
        $modelName = ucfirst(ColumnSchema::camelCase($table));
        $baseModelName = $this->config('baseModel', 'App\Models\Model');
        $this->compareModelNamespace($namespace, $baseModelName);
        // todo add relations
        $relations = [];
        $content = $this->render([
            'namespace' => $namespace,
            'columns' => $columns,
            'methods' => $this->getMethods(),
            'modelName' => $modelName,
            'baseModelName' => $baseModelName,
            'rules' => $rules,
            'tableName' => $table,
            'relations' => $relations,
        ]);
        $this->write($modelName, $content);
    }

    protected function getMethods()
    {
        return [];
    }

    /**
     * Strip `$model`'s namespace if under the `$namespace`
     * e.g.
     *  $namespace = 'App\Models';
     *  $model = 'App\Models\Model';
     *
     *  // result:
     *  $model = 'Model';
     * @param string $namespace
     * @param string $model
     */
    protected function compareModelNamespace($namespace, &$model)
    {
        $namespace = $namespace . '\\';
        if (strpos($model, $namespace) === 0) {
            $model = substr($model, strlen($namespace));
        }
    }

    /**
     * @param ColumnSchema $column
     * @return array
     */
    protected function getRules($column)
    {
        $returnArray = false;
        $rules = [];
        switch ($column->columnType) {
            case 'tinyint':
            case 'mediumint':
            case 'int':
            case 'bigint':
                $rules = ['integer'];
                if ($column->columnType === 'tinyint') {
                    if ($column->unsigned) {
                        $rules[] = 'min:0';
                        $rules[] = 'max:255';
                    } else {
                        $rules[] = 'min:-128';
                        $rules[] = 'max:127';
                    }
                } else if ($column->columnType === 'mediumint') {
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
            case 'float':
            case 'double':
                $rules = [
                    'numeric'
                ];
                break;
            case 'varchar':
            case 'char':
                $rules = [
                    'string',
                    'max:' . $column->characterMaximumLength
                ];
                break;
            case 'date':
            case 'timestamp':
                $rules = ['date'];
                break;
            case 'enum':
                $rules = ['string'];
                break;
        }

        if (!$column->columnKey === 'UNI') array_unshift($rules, "unique:$column->tableName");
        if (!$column->isNullable && $column->columnDefault === null) array_unshift($rules, 'required');

        if (!$rules) $rules[] = '';

        return $returnArray || $this->config('preferArrayRules') ? $rules : implode('|', $rules);
    }

    protected function getColumnType($type)
    {
        switch ($type) {
            case 'tinyint':
            case 'mediumint':
            case 'int':
            case 'bigint':
                return 'integer';
            case 'decimal':
            case 'float':
            case 'double':
                return 'float';
            case 'char':
            case 'varchar':
            case 'text':
            case 'mediumtext':
            case 'longtext':
            case 'enum':
                return 'string';
            case 'datetime':
            case 'time':
            case 'timestamp':
                return '\Carbon\Carbon';
            default:
                return $type;
        }
    }

    protected function render($params)
    {
        $path = __DIR__ . '/../templates/model.php';
        if (!file_exists($path)) throw new FileNotFoundException($path);
        extract($params);

        ob_start();
        include $path;
        $content = ob_get_clean();
        return $content;
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
            ['overwrite', null, InputOption::VALUE_NONE, 'Overwrite if model exists when passed'],
        ];
    }

}