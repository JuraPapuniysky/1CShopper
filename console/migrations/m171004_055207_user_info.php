<?php

use yii\db\Migration;

class m171004_055207_user_info extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user_info}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'phone' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex('fk_user_info', '{{%user_info}}', 'user_id');
        $this->addForeignKey('fk_user_info', '{{%user_info}}', 'user_id', '{{%user}}', 'id');
    }

    public function safeDown()
    {
        echo "m171004_055207_user_info cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171004_055207_user_info cannot be reverted.\n";

        return false;
    }
    */
}
