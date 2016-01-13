<?php

namespace app\components\oauth2\storage;

use League\OAuth2\Server\Entity\AccessTokenEntity;
use League\OAuth2\Server\Entity\AuthCodeEntity;
use League\OAuth2\Server\Entity\ScopeEntity;
use League\OAuth2\Server\Entity\SessionEntity;
use League\OAuth2\Server\Storage\AbstractStorage;
use League\OAuth2\Server\Storage\SessionInterface;

use app\models\auth2\Sessions;

class SessionStorage extends AbstractStorage implements SessionInterface
{
    public function getByAccessToken(AccessTokenEntity $accessToken)
    {
        $session = new SessionEntity($this->server);
        $session->setId(1);
        $session->setOwner('client', 'testclient');
        return $session;
    }

    public function getByAuthCode(AuthCodeEntity $authCode)
    {
        // $result = Sessions::getOauthSessionByAuthCode($authCode->getId());

        // if (!empty($result)) {
            $session = new SessionEntity($this->server);//?
            $session->setId(1);
            $session->setOwner('client', 'testclient');
            return $session;
        // }

        // return;
    }

    public function getScopes(SessionEntity $session)
    {
        // $result = Sessions::getScopesBySession($session->getId());
        $result = [['id'=>1, 'description'=>'description']];

        $scopes = [];

        foreach ($result as $scope) {
            $scopes[] = (new ScopeEntity($this->server))->hydrate([
                'id'            =>  $scope['id'],
                'description'   =>  $scope['description'],
            ]);
        }

        return $scopes;
    }

    public function create($ownerType, $ownerId, $clientId, $clientRedirectUri = null)
    {
        return 1;
    }

    public function associateScope(SessionEntity $session, ScopeEntity $scope)
    {
        return 1;
    }
}