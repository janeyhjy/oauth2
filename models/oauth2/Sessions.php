<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_sessions".
 *
 * @property integer $id
 * @property string $owner_type
 * @property string $owner_id
 * @property string $client_id
 * @property string $client_redirect_uri
 *
 * @property OauthAccessTokens[] $oauthAccessTokens
 * @property OauthAuthCodes[] $oauthAuthCodes
 * @property OauthSessionScopes[] $oauthSessionScopes
 * @property OauthClients $client
 */
class Sessions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_sessions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_type', 'owner_id', 'client_id'], 'required'],
            [['owner_type', 'owner_id', 'client_id', 'client_redirect_uri'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_type' => 'Owner Type',
            'owner_id' => 'Owner ID',
            'client_id' => 'Client ID',
            'client_redirect_uri' => 'Client Redirect Uri',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAccessTokens()
    {
        return $this->hasMany(OauthAccessTokens::className(), ['session_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAuthCodes()
    {
        return $this->hasMany(OauthAuthCodes::className(), ['session_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthSessionScopes()
    {
        return $this->hasMany(OauthSessionScopes::className(), ['session_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(OauthClients::className(), ['id' => 'client_id']);
    }

    public function getOauthScopes()
    {
        return $this->hasOne(OauthScopes::className(), ['id' => ''])
    }

    public static function getOauthSessionByAccessToken($accessToken)
    {
        return self::find()
            ->select(['oauth_sessions.id', 'oauth_sessions.owner_type', 'oauth_sessions.owner_id', 'oauth_sessions.client_id', 'oauth_sessions.client_redirect_uri'])
            ->joinWith(['oauthAccessTokens'], false)
            ->where(['oauth_access_tokens.access_token' => $accessToken])
            ->one();
    }

    public static function getOauthSessionByAuthCode($authCode)
    {
        return self::find()
            ->select(['oauth_sessions.id', 'oauth_sessions.owner_type', 'oauth_sessions.owner_id', 'oauth_sessions.client_id', 'oauth_sessions.client_redirect_uri'])
            ->joinWith(['oauthAuthCodes'], false)
            ->where(['oauth_auth_codes.auth_code' => $authCode])
            ->one();
    }

    public static function getScopesBySession($sessionId)
    {
        return self::find()
            ->select(['oauth_scopes.*'])
            ->joinWith(['oauthSessionScopes', 'oauthSessionScopes.scope0'])
            ->where(['oauth_sessions.id' => $sessionId])
            ->asArray()
            ->all();
    }
}
