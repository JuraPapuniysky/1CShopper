<?php

use yii\db\Migration;

class m171003_102209_cart extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'user_ip' => $this->string(20),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%cart_product}}', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer(),
            'product_id' => $this->integer(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
        ]);

        $this->createIndex('fk_cart', '{{%cart_product}}', 'cart_id');
        $this->addForeignKey('fk_cart', '{{%cart_product}}', 'cart_id', '{{%cart}}', 'id');

        $this->createIndex('fk_cart_product', '{{%cart_product}}', 'product_id');
        $this->addForeignKey('fk_cart_product', '{{%cart_product}}', 'product_id', '{{%product}}', 'id');
    }

    public function safeDown()
    {
        echo "m171003_102209_cart cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171003_102209_cart cannot be reverted.\n";

        return false;
    }
    */
}
