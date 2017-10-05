<?php

use yii\db\Migration;

class m171004_080137_product_text extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('{{%product}}', 'description', $this->string(255));
        $this->addColumn('{{%product}}', 'text', $this->text());
    }

    public function safeDown()
    {
        echo "m171004_080137_product_text cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171004_080137_product_text cannot be reverted.\n";

        return false;
    }
    */
}
