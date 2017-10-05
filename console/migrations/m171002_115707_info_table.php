<?php

use yii\db\Migration;

class m171002_115707_info_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%info_table}}', [
            'id' => $this->primaryKey(),
            'main_phone' => $this->string(),
            'phone1' => $this->string(),
            'phone2' => $this->string(),
            'email' => $this->string(),
            'city' => $this->string(),
        ]);
    }

    public function safeDown()
    {
        echo "m171002_115707_info_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171002_115707_info_table cannot be reverted.\n";

        return false;
    }
    */
}
