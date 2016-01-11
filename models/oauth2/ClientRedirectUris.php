<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_client_redirect_uris".
 *
 * @property integer $id
 * @property string $client_id
 * @property string $redirect_uri
 */
class ClientRedirectUris extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_client_redirect_uris';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'redirect_uri'], 'required'],
            [['client_id', 'redirect_uri'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'redirect_uri' => 'Redirect Uri',
        ];
    }
}
