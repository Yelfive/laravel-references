<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-11-24
 */

namespace App\Models;

use App\Events\ModelSaving;
use Carbon\Carbon;
use fk\utility\Database\Eloquent\Model as BaseModel;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Model extends BaseModel
{
    public const DELETED_YES = 'yes';

    public const DELETED_NO = 'no';

    /*
     +------------------------------------------------
     | MariaDB trigger will do the timestamp updating
     +------------------------------------
     */
    public $timestamps = false;

    public $dates = ['created_at', 'updated_at'];

    protected $dispatchesEvents = [
        'saving' => ModelSaving::class
    ];

    public static $displayAttributesOnly = false;

    public function displayAttributes()
    {
        return $this->getAttributes(null, ['deleted', 'password_hash']);
    }

    public function attributesToArray()
    {
        return static::$displayAttributesOnly ? $this->displayAttributes() : parent::attributesToArray();
    }
}