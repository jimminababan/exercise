<?php

use yii\db\Schema;
use yii\db\Migration;

class m180530_140206_user_notifications extends Migration
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
            '{{%user_notifications}}',
            [
                'id'=> $this->primaryKey(11),
                'from_user_id'=> $this->integer(11)->notNull(),
                'to_user_id'=> $this->integer(11)->notNull(),
                'content'=> $this->text()->notNull(),
                'read'=> $this->tinyint(1)->null()->defaultValue(0),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%user_notifications}}');
    }
}
