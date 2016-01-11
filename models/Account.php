<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $corp_id
 * @property string $corp_secret
 * @property string $user_id
 * @property string $access_token
 * @property string $access_token_expired_at
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['access_token_expired_at'], 'safe'],
            [['corp_id', 'user_id'], 'string', 'max' => 45],
            [['corp_secret'], 'string', 'max' => 128],
            [['access_token'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'corp_id' => 'Corp ID',
            'corp_secret' => 'Corp Secret',
            'user_id' => 'User ID',
            'access_token' => 'Access Token',
            'access_token_expired_at' => 'Access Token Expired At',
        ];
    }
}
