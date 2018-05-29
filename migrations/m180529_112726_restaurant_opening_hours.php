<?php

use yii\db\Schema;
use yii\db\Migration;

class m180529_112726_restaurant_opening_hours extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%restaurant_opening_hours}}',
            [
                'id'=> $this->primaryKey(11),
                'restaurant_id'=> $this->integer(11)->notNull(),
                'day_of_week'=> $this->integer(11)->notNull()->comment('Numeric representation of the day of the week. 0 (for Sunday) through 6 (for Saturday).'),
                'time_open'=> $this->time()->notNull(),
                'time_closed'=> $this->time()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('restaurant_id','{{%restaurant_opening_hours}}',['restaurant_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('restaurant_id', '{{%restaurant_opening_hours}}');
        $this->dropTable('{{%restaurant_opening_hours}}');
    }
}
