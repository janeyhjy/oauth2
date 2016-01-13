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
        $token = new AuthCodeEntity($this->server);
        $token->setId('I0kXkdIMjrz0kk6HWifR9SOVb4N5VfaNTimL9XVU');
        $token->setRedirectUri('http://www.baidu.com');
        $token->setExpireTime(time());

        return $token;
    }

    public function create($token, $expireTime, $sessionId, $redirectUri)
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function getScopes(AuthCodeEntity $token)
    {
        $scope = [];
        $result =  [['id'=>1, 'description'=>'description']];
        foreach ($result as $item) {
            $scope = (new ScopeEntity($this->server))
                ->hydrate([
                    'id' => $item['id'],
                    'description' => $item['description']
                ]);
            $reponse[] = $scope;
        }
        return $scope;
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
