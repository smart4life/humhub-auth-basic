<?php

namespace humhub\auth\basic;

use yii\helpers\Url;

/**
 * @inheritdoc
 */
class Module extends \humhub\components\Module
{
    /**
     * @inheritdoc
     */
    public function disable()
    {
        // Cleanup all module data, don't remove the parent::disable()!!!
        parent::disable();
    }
}
