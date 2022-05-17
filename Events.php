<?php

namespace humhub\auth\basic;

use humhub\modules\user\models\forms\Login;
use humhub\modules\user\authclient\AuthClientHelpers;
use yii;

class Events
{
    /**
     * @param Event $event
     */
    public static function onBeforeRequest($event)
    {
        $request = Yii::$app->request;
        list($username, $password) = $request->getAuthCredentials();
        $identity = yii::$app->user->getIdentity();

        if ($username != null && $password != null && ($identity == null || $identity->username != $username)) {
            if ($identity != null) {
                Yii::$app->user->logout();
            }
            $login = new Login;
            if ($login->load(['username' => $username, 'password' => $password], '') && $login->validate()) {
                $user = AuthClientHelpers::getUserByAuthClient($login->authClient);
                if ($user == null) {
                    $user = AuthClientHelpers::createUser($login->authClient);
                }
                if ($user != null) {
                    Yii::$app->user->login($user);
                }
            }
        }
    }

}
