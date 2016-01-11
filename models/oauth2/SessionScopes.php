<?php

namespace app\models\oauth2;

use Yii;

/**
 * This is the model class for table "oauth_session_scopes".
 *
 * @property integer $id
 * @property integer $session_id
 * @property string $scope
 *
 * @property OauthScopes $scope0
 * @property OauthSessions $session
 */
class SessionScopes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_session_scopes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['session_id', 'scope'], 'required'],
            [['session_id'], 'integer'],
            [['scope'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session_id' => 'Session ID',
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
    public function getSession()
    {
        return $this->hasOne(OauthSessions::className(), ['id' => 'session_id']);
    }
}
