<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%restaurants}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property RestaurantOpeningHours[] $restaurantOpeningHours
 */
class Restaurants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%restaurants}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantOpeningHours()
    {
        return $this->hasMany(RestaurantOpeningHours::className(), ['restaurant_id' => 'id']);
    }
}
