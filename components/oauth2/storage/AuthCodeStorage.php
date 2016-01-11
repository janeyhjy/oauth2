<?php

namespace app\components\oauth2\storage;

use League\OAuth2\Server\Entity\AuthCodeEntity;
use League\OAuth2\Server\Entity\ScopeEntity;
use League\OAuth2\Server\Storage\AbstractStorage;
use League\OAuth2\Server\Storage\AuthCodeInterface;

class AuthCodeStorage extends AbstractStorage implements AuthCodeInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($code)
    {
        return 'token';
    }

    public function create($token, $expireTime, $sessionId, $redirectUri)
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function getScopes(AuthCodeEntity $token)
    {
        return [['id'=>1, 'description'=>'description']];
    }

    /**
     * {@inheritdoc}
     */
    public function associateScope(AuthCodeEntity $token, ScopeEntity $scope)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function delete(AuthCodeEntity $token)
    {
    }
}
