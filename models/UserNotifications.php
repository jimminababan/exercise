<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_notifications}}".
 *
 * @property int $id
 * @property int $from_user_id
 * @property int $to_user_id
 * @property string $content
 * @property int $read
 */
class UserNotifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_notifications}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_user_id', 'to_user_id', 'content'], 'required'],
            [['from_user_id', 'to_user_id', 'read'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from_user_id' => Yii::t('app', 'From User ID'),
            'to_user_id' => Yii::t('app', 'To User ID'),
            'content' => Yii::t('app', 'Content'),
            'read' => Yii::t('app', 'Read'),
        ];
    }
}
