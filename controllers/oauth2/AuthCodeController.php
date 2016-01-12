<?php

namespace app\controllers\oauth2;

use Yii;
use yii\rest\Controller;
use app\components\oauth2\storage\SessionStorage;

class AuthCodeController extends Controller
{
    // 跳转到用户授权页面
    public function actionAuthorize()
    {
        // http://oauth2.com/index.php?r=oauth2/auth-code/authorize&client_id=1&redirect_uri=http%3A%2F%2Fwww.baidu.com&state=state&response_type=code&scope=SCOPE
        // 验证参数
        try {
            $authParams = Yii::$app->oauth2->server->getGrantType('authorization_code')->checkAuthorizeParams();
        } catch (\Exception $e) {
            throw $e;
        }

        //　显示用户授权页面
        header('Location: http://oauth2.com/index.php?r=oauth2/page');

        // 重定向到 redirect_uri?code=....&state=...
        $redirectUri = Yii::$app->oauth2->server->getGrantType('authorization_code')->newAuthorizeRequest('user', 1, $authParams);
        return ['url' => $redirectUri];
    }
}