<?php

namespace app\controllers\oauth;

use Yii;
use yii\web\Controller;

class PageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('/oauth2/index' );
    }
}