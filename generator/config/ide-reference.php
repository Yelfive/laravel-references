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
        'dir' => 'app\Models',
        'preferArrayRules' => true,
        'except' => ['updated_at', 'created_at', 'deleted']
    ],
    'completion' => [
        /*
         +----------------------------------------------------------------
         | Where the ide-completion should be generated
         +----------------------------------------------------------------
         | This is a directory to hold all the generated files,
         | which should never be autoload-able.
         */
        'destination' => __DIR__ . '/../app/Documents/completion',
    ]
];
