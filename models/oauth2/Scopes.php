<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_scopes".
 *
 * @property string $id
 * @property string $description
 *
 * @property OauthAccessTokenScopes[] $oauthAccessTokenScopes
 * @property OauthAuthCodeScopes[] $oauthAuthCodeScopes
 * @property OauthSessionScopes[] $oauthSessionScopes
 */
class Scopes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_scopes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'description'], 'required'],
            [['id', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAccessTokenScopes()
    {
        return $this->hasMany(OauthAccessTokenScopes::className(), ['scope' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAuthCodeScopes()
    {
        return $this->hasMany(OauthAuthCodeScopes::className(), ['scope' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthSessionScopes()
    {
        return $this->hasMany(OauthSessionScopes::className(), ['scope' => 'id']);
    }
}
