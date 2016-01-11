<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_auth_codes".
 *
 * @property string $auth_code
 * @property integer $session_id
 * @property integer $expire_time
 * @property string $client_redirect_uri
 *
 * @property OauthAuthCodeScopes[] $oauthAuthCodeScopes
 * @property OauthSessions $session
 */
class AuthCodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_auth_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_code', 'session_id', 'expire_time', 'client_redirect_uri'], 'required'],
            [['session_id', 'expire_time'], 'integer'],
            [['auth_code', 'client_redirect_uri'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'auth_code' => 'Auth Code',
            'session_id' => 'Session ID',
            'expire_time' => 'Expire Time',
            'client_redirect_uri' => 'Client Redirect Uri',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAuthCodeScopes()
    {
        return $this->hasMany(OauthAuthCodeScopes::className(), ['auth_code' => 'auth_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(OauthSessions::className(), ['id' => 'session_id']);
    }
}
