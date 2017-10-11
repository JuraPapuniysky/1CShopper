<?php

use yii\db\Migration;

class m171011_115405_update_order extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'user_ip', $this->string(255));
    }

    public function safeDown()
    {
        echo "m171011_115405_update_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171011_115405_update_order cannot be reverted.\n";

        return false;
    }
    */
}
