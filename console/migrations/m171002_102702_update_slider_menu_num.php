<?php

use yii\db\Migration;

class m171002_102702_update_slider_menu_num extends Migration
{
    public function safeUp()
    {
        $this->addColumn('slider', 'num', $this->integer()->unique());
        $this->addColumn('category', 'num', $this->integer()->unique());

    }

    public function safeDown()
    {
        echo "m171002_102702_update_slider_menu_num cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171002_102702_update_slider_menu_num cannot be reverted.\n";

        return false;
    }
    */
}
