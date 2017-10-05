<?php

use yii\db\Migration;

class m171004_060338_order_date extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'created_at', $this->integer());
        $this->addColumn('{{%order}}', 'updated_at', $this->integer());
    }

    public function safeDown()
    {
        echo "m171004_060338_order_date cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171004_060338_order_date cannot be reverted.\n";

        return false;
    }
    */
}
