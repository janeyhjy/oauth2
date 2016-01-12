<?php

namespace app\controllers\oauth2;

use Yii;
use yii\web\Controller;

class PageController extends Controller
{
    public $layout = 'oauth2';

    public function actionIndex()
    {
        return $this->render('/oauth2/index');
    }
}