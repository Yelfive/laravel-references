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
 */

echo "<?php\n";

switch (substr(App::version(), 0, 3)) {
    case '5.4':
        $eventProperty = 'events';
        break;
    case '5.5':
    default:
        $eventProperty = 'dispatchesEvents';
        break;
}

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
 * @property <?= $type ?> $<?= $property ?> <?= $description ?><?= "\n" ?>
<?php endforeach; ?>
 *
<?php if($methods): ?>
<?php foreach ($methods as list($type, $name, $parameters, $description)): ?>
 * @method <?= $type ?> <?= $name ?>(<?= $parameters ?>) <?= $description ?><?= "\n" ?>
<?php endforeach; ?>
 *
<?php endif; ?>
 */
class <?= $modelName ?> extends <?= $baseModelName ?> <?= "\n" ?>
{

    /**
     * @var string Name of the table, without prefix
     */
    public $table = '<?= $tableName ?>';

    public $<?= $eventProperty ?> = [
        'saving' => \App\Events\ModelSaving::class,
    ];

    public function rules()
    {
        return [
<?php foreach($rules as $name => $rule): ?>
            '<?= $name ?>' => <?= Helper::dump($rule, true) ?>,<?= "\n" ?>
<?php endforeach; ?>
        ];
    }

}