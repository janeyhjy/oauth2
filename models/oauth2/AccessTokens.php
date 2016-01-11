<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_access_tokens".
 *
 * @property string $access_token
 * @property integer $session_id
 * @property integer $expire_time
 *
 * @property OauthAccessTokenScopes[] $oauthAccessTokenScopes
 * @property OauthSessions $session
 * @property OauthRefreshTokens[] $oauthRefreshTokens
 */
class AccessTokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_access_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['access_token', 'session_id', 'expire_time'], 'required'],
            [['session_id', 'expire_time'], 'integer'],
            [['access_token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'access_token' => 'Access Token',
            'session_id' => 'Session ID',
            'expire_time' => 'Expire Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAccessTokenScopes()
    {
        return $this->hasMany(OauthAccessTokenScopes::className(), ['access_token' => 'access_token']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(OauthSessions::className(), ['id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthRefreshTokens()
    {
        return $this->hasMany(OauthRefreshTokens::className(), ['access_token' => 'access_token']);
    }
}
