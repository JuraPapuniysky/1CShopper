<?php

use yii\db\Migration;

class m171113_073617_newspromotion extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%news_promotion}}',[
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(255),
            'text' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        echo "m171113_073617_newspromotion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171113_073617_newspromotion cannot be reverted.\n";

        return false;
    }
    */
}
