<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_refresh_tokens".
 *
 * @property string $refresh_token
 * @property integer $expire_time
 * @property string $access_token
 *
 * @property OauthAccessTokens $accessToken
 */
class RefreshTokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_refresh_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['refresh_token', 'expire_time', 'access_token'], 'required'],
            [['expire_time'], 'integer'],
            [['refresh_token', 'access_token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'refresh_token' => 'Refresh Token',
            'expire_time' => 'Expire Time',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessToken()
    {
        return $this->hasOne(OauthAccessTokens::className(), ['access_token' => 'access_token']);
    }
}
