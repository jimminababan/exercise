<?php

namespace app\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "resto_schedule".
 *
 * @property int $resto_schedule
 * @property string $resto_name
 * @property string $resto_open_time
 */
class RestoSchedule extends \yii\db\ActiveRecord
{

    public function getDay(){
        $waktu = explode('/',$this->resto_open_time);
        return Json::encode($waktu);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resto_schedule';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resto_name', 'resto_open_time'], 'required'],
            [['resto_name', 'resto_open_time'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'resto_schedule' => 'Resto Schedule',
            'resto_name' => 'Resto Name',
            'resto_open_time' => 'Resto Open Time',
        ];
    }
}
