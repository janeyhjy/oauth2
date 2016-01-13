<?php

namespace app\controllers\oauth2;

use Yii;
use yii\rest\Controller;
use app\components\oauth2\storage\SessionStorage;

class AuthCodeController extends Controller
{
    // 跳转到用户授权页面
    // examples: http://oauth2.com/index.php?r=oauth2/auth-code/authorize&client_id=1&redirect_uri=http%3A%2F%2Fwww.baidu.com&state=state&response_type=code&scope=SCOPE
    public function actionAuthorize()
    {
        // 验证参数
        try {
            $authParams = Yii::$app->oauth2->server->getGrantType('authorization_code')->checkAuthorizeParams();
        } catch (\Exception $e) {
            throw $e;
        }

        //　显示用户授权页面
        // header('Location: http://oauth2.com/index.php?r=oauth2/page');

        // 重定向到 redirect_uri?code=....&state=...
        $redirectUri = Yii::$app->oauth2->server->getGrantType('authorization_code')->newAuthorizeRequest('user', 1, $authParams);
        return ['url' => $redirectUri];
    }

    // 获取access_token
    // examples: http://oauth2.com/index.php?r=oauth2/auth-code/access-token&client_id=1&client_secret=22222&redirect_uri=http%3A%2F%2Fwww.baidu.com&grant_type=authorization_code&code=I0kXkdIMjrz0kk6HWifR9SOVb4N5VfaNTimL9XVU
    public function actionAccessToken()
    {
        try {
            $response = Yii::$app->oauth2->server->issueAccessToken();
            return $response;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}