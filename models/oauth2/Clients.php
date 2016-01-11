<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_clients".
 *
 * @property string $id
 * @property string $secret
 * @property string $name
 *
 * @property OauthSessions[] $oauthSessions
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'secret', 'name'], 'required'],
            [['id', 'secret', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'secret' => 'Secret',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthSessions()
    {
        return $this->hasMany(OauthSessions::className(), ['client_id' => 'id']);
    }
}
