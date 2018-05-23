<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table 1".
 *
 * @property string $COL 1
 * @property string $COL 2
 */
class Table extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['COL1'], 'string', 'max' => 35],
            [['COL2'], 'string', 'max' => 95],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'COL1' => 'Col 1',
            'COL2' => 'Col 2',
        ];
    }
}
