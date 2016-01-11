<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_access_token_scopes".
 *
 * @property integer $id
 * @property string $access_token
 * @property string $scope
 *
 * @property OauthScopes $scope0
 * @property OauthAccessTokens $accessToken
 */
class AccessTokenScopes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_access_token_scopes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['access_token', 'scope'], 'required'],
            [['access_token', 'scope'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'access_token' => 'Access Token',
            'scope' => 'Scope',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScope0()
    {
        return $this->hasOne(OauthScopes::className(), ['id' => 'scope']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessToken()
    {
        return $this->hasOne(OauthAccessTokens::className(), ['access_token' => 'access_token']);
    }
}
