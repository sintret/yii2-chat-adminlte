<?php

namespace sintret\chat\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property string $message
 * @property integer $userCreate
 * @property integer $userUpdate
 * @property string $updateDate
 * @property string $createDate
 */
class Chat extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['message'], 'required'],
            [['userCreate', 'userUpdate'], 'integer'],
            [['updateDate', 'createDate'], 'safe'],
            [['message'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'userCreate' => 'User Create',
            'userUpdate' => 'User Update',
            'updateDate' => 'Update Date',
            'createDate' => 'Create Date',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->createDate = date('Y-m-d H:i:s');
            $this->userCreate = Yii::$app->user->id;
            $this->userUpdate = Yii::$app->user->id;
        } else {
            $this->updateDate = date('Y-m-d H:i:s');
            $this->userUpdate = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }

    public function getUserCreateLabel() {

        $user = User::find()->select('username')->where(['id' => $this->userCreate])->one();
        return $user->username;
    }

    public function getUserUpdateLabel() {
        $user = User::find()->select('username')->where(['id' => $this->userUpdate])->one();
        return $user->username;
    }

    public static function records() {
        return static::find()->orderBy('id desc')->all;
    }

}
