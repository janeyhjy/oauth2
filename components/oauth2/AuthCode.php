<?php

namespace app\components\oauth2;

use Yii;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\AuthCodeGrant;
use League\OAuth2\Server\Grant\RefreshTokenGrant;
use app\components\oauth2\storage\SessionStorage;
use app\components\oauth2\storage\AccessTokenStorage;
use app\components\oauth2\storage\ClientStorage;
use app\components\oauth2\storage\ScopeStorage;
use app\components\oauth2\storage\AuthCodeStorage;
use app\components\oauth2\storage\RefreshTokenStorage;


class AuthCode extends \yii\base\Component
{
    public $server = null;

    public function init()
    {
        parent::init();

        $this->server = new AuthorizationServer;

        $this->server->setSessionStorage(new SessionStorage);
        $this->server->setAccessTokenStorage(new AccessTokenStorage);
        $this->server->setClientStorage(new ClientStorage);
        $this->server->setScopeStorage(new ScopeStorage);
        $this->server->setAuthCodeStorage(new AuthCodeStorage);
        $this->server->setRefreshTokenStorage(new RefreshTokenStorage);

        $authCodeGrant = new AuthCodeGrant();
        $this->server->addGrantType($authCodeGrant);

        $refrehTokenGrant = new RefreshTokenGrant();
        $this->server->addGrantType($refrehTokenGrant);
    }
}