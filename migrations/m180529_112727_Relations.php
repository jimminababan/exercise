<?php

use yii\db\Schema;
use yii\db\Migration;

class m180529_112727_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_restaurant_opening_hours_restaurant_id',
            '{{%restaurant_opening_hours}}','restaurant_id',
            '{{%restaurants}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_restaurant_opening_hours_restaurant_id', '{{%restaurant_opening_hours}}');
    }
}
