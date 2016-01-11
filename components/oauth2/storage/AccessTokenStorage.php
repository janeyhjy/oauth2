<?php

namespace app\components\oauth2\storage;

use League\OAuth2\Server\Entity\AccessTokenEntity;
use League\OAuth2\Server\Entity\ScopeEntity;
use League\OAuth2\Server\Storage\AbstractStorage;
use League\OAuth2\Server\Storage\AccessTokenInterface;

class AccessTokenStorage extends AbstractStorage implements AccessTokenInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($token)
    {
        

        return "toekn";
    }

    /**
     * {@inheritdoc}
     */
    public function getScopes(AccessTokenEntity $token)
    {
        return [['id'=>1, 'description'=>'aaaaa']];
    }

    /**
     * {@inheritdoc}
     */
    public function create($token, $expireTime, $sessionId)
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function associateScope(AccessTokenEntity $token, ScopeEntity $scope)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function delete(AccessTokenEntity $token)
    {

    }
}
