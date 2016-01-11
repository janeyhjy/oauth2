<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();

// Resource server
// $sessionStorage = new \app\components\oauth2\storage\SessionStorage();
// $accessTokenStorage = new \app\components\oauth2\storage\AccessTokenStorage();
// $clientStorage = new \app\components\oauth2\storage\ClientStorage();
// $scopeStorage = new \app\components\oauth2\storage\ScopeStorage();

// $server = new \League\OAuth2\Server\ResourceServer(
//     $sessionStorage,
//     $accessTokenStorage,
//     $clientStorage,
//     $scopeStorage
// );

// Authorization server
// $server->setSessionStorage(new \app\components\oauth2\storage\SessionStorage);
// $server->setAccessTokenStorage(new \app\components\oauth2\storage\AccessTokenStorage);
// $server->setRefreshTokenStorage(new \app\components\oauth2\storage\RefreshTokenStorage);
// $server->setClientStorage(new \app\components\oauth2\storage\ClientStorage);
// $server->setScopeStorage(new \app\components\oauth2\storage\ScopeStorage);
// $server->setAuthCodeStorage(new \app\components\oauth2\storage\AuthCodeStorage);



