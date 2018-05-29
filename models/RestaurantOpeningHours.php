<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%restaurant_opening_hours}}".
 *
 * @property int $id
 * @property int $restaurant_id
 * @property int $day_of_week Numeric representation of the day of the week. 0 (for Sunday) through 6 (for Saturday).
 * @property string $time_open
 * @property string $time_closed
 *
 * @property Restaurants $restaurant
 */
class RestaurantOpeningHours extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%restaurant_opening_hours}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['restaurant_id', 'day_of_week', 'time_open', 'time_closed'], 'required'],
            [['restaurant_id', 'day_of_week'], 'integer'],
            [['time_open', 'time_closed'], 'safe'],
            [['restaurant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurants::className(), 'targetAttribute' => ['restaurant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'restaurant_id' => Yii::t('app', 'Restaurant ID'),
            'day_of_week' => Yii::t('app', 'Day of Week'),
            'time_open' => Yii::t('app', 'Time Open'),
            'time_closed' => Yii::t('app', 'Time Closed'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurants::className(), ['id' => 'restaurant_id']);
    }
}
