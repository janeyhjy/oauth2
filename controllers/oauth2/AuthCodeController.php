<?php

namespace app\controllers\oauth2;

use Yii;
use yii\rest\Controller;
use app\components\oauth2\storage\SessionStorage;

class AuthCodeController extends Controller
{
    public function actionAuthorize()
    {
        // return Yii::$app->oauth2->server->getGrantType('authorization_code');
        // return ['ok'=>1];
        try {
            $authParams = Yii::$app->oauth2->server->getGrantType('authorization_code')->checkAuthorizeParams();
        } catch (\Exception $e) {
            throw $e;
        }

        $redirectUri = $server->getGrantType('authorization_code')->newAuthorizeRequest('user', 1, $authParams);

        return ['url' => $redirectUri];
    }
}