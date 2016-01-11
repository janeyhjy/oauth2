<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_auth_code_scopes".
 *
 * @property integer $id
 * @property string $auth_code
 * @property string $scope
 *
 * @property OauthScopes $scope0
 * @property OauthAuthCodes $authCode
 */
class AuthCodeScopes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_auth_code_scopes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_code', 'scope'], 'required'],
            [['auth_code', 'scope'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_code' => 'Auth Code',
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
    public function getAuthCode()
    {
        return $this->hasOne(OauthAuthCodes::className(), ['auth_code' => 'auth_code']);
    }
}
