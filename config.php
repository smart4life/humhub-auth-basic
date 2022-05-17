<?php

use humhub\auth\basic\Events;
use yii\base\Application;

return [
    'id' => 'auth-basic',
    'class' => 'humhub\auth\basic\Module',
    'namespace' => 'humhub\auth\basic',
    'events' => [
        [
            Application::class,
            Application::EVENT_BEFORE_REQUEST,
            ['humhub\auth\basic\Events', 'onBeforeRequest']]
    ],
];
