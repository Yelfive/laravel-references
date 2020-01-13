<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-04-30
 */
use fk\reference\support\Helper;
use Illuminate\Support\Facades\App;

/**
 * @var array $namespace
 * @var array $columns
 * @var array $methods
 * @var string $modelName
 * @var string $tableName
 * @var string $baseModelName
 * @var array $rules
 * @var array $dynamicWhere
 * @var array $uses
 * @var bool $isAbstract
 */

echo "<?php\n";

?>

namespace <?= $namespace ?>;
<?php if ($uses): ?>

<?php foreach($uses as $use): ?>
use <?= $use; ?>;
<?php endforeach; ?>
<?php endif; ?>

/**
 * Fields in the table `<?= $tableName ?>`
 *
<?php foreach ($columns as list($type, $property, $description)): ?>
 * @property <?= $type ?> $<?= $property ?><?= $description ? ' ' . trim($description) : '' ?><?= "\n" ?>
<?php endforeach; ?>
 *
<?php if($methods): ?>
<?php foreach ($methods as list($type, $name, $parameters, $description)): ?>
 * @method <?= $type ?> <?= $name ?>(<?= $parameters ?>) <?= $description ?><?= "\n" ?>
<?php endforeach; ?>
 *
<?php endif; ?>
 */
<?= $isAbstract ? 'abstract class' : 'class' ?> <?= $modelName ?> extends <?= $baseModelName ?> <?= "\n" ?>
{

    /**
     * @var string Name of the table, without prefix
     */
    public $table = '<?= $tableName ?>';

    public function rules()
    {
        return [
<?php foreach($rules as $name => $rule): ?>
            '<?= $name ?>' => <?= Helper::dump($rule, true) ?>,<?= "\n" ?>
<?php endforeach; ?>
        ];
    }

}
