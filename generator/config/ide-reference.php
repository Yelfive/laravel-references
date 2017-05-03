<?php

/**
 * @author Felix Huang <yelfivehuang@gmail.com>
 * @date 2017-05-01
 */

/*
 * \Illuminate\Database\Eloquent\Model
 * \Illuminate\Database\Eloquent\Builder
 * \Illuminate\Database\Query\Builder
 * \Illuminate\Database\Query\Builder::dynamicWhere
 */
return [
    'model' => [
        'baseModel' => 'App\Models\Model',
        'namespace' => 'App\Models',
        'dir' => 'app\test',
        'preferArrayRules' => true,
        'except' => ['updated_at', 'created_at', 'deleted']
    ],
];