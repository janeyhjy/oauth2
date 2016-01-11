<?php

namespace app\components\oauth2\storage;

use League\OAuth2\Server\Entity\ScopeEntity;
use League\OAuth2\Server\Storage\AbstractStorage;
use League\OAuth2\Server\Storage\ScopeInterface;

class ScopeStorage extends AbstractStorage implements ScopeInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($scope, $grantType = null, $clientId = null)
    {
        return [['id'=>1, 'description'=>'description']];
        // $result = Capsule::table('oauth_scopes')
        //                         ->where('id', $scope)
        //                         ->get();

        // if (count($result) === 0) {
        //     return;
        // }

        // return (new ScopeEntity($this->server))->hydrate([
        //     'id'            =>  $result[0]['id'],
        //     'description'   =>  $result[0]['description'],
        // ]);
    }
}
