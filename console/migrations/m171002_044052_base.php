<?php

use yii\db\Migration;

class m171002_044052_base extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'role', $this->smallInteger()->defaultValue(2));

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'category_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'type_id' => $this->integer(),
            'name' => $this->string(255),
            'price' => $this->double(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'src' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%product_image}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'image_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%order}}', [
           'id' => $this->primaryKey(),
           'user_id' => $this->integer(),
           'status' => $this->smallInteger()->defaultValue(0),
           'first_name' => $this->string(255)->notNull(),
           'last_name' => $this->string(255)->notNull(),
           'email' => $this->string()->notNull(),
           'phone' => $this->string()->notNull(),
           'region' => $this->string(255),
           'city' => $this->string(255),
           'address' => $this->string(255),
           'index' => $this->string(16),
        ]);

        $this->createTable('order_product', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex('fk_category_type', '{{%type}}', 'category_id');
        $this->addForeignKey('fk_category_type', '{{%type}}', 'category_id', '{{%category}}', 'id');

        $this->createIndex('fk_type_product', '{{%product}}', 'type_id');
        $this->addForeignKey('fk_type_product', '{{%product}}', 'type_id', '{{%type}}', 'id');

        $this->createIndex('fk_category_product', '{{%product}}', 'category_id');
        $this->addForeignKey('fk_category_product', '{{%product}}', 'category_id', '{{%category}}', 'id');

        $this->createIndex('fk_product_image_image', '{{%product_image}}', 'image_id');
        $this->addForeignKey('fk_product_image_image', '{{%product_image}}', 'image_id', '{{%image}}', 'id');

        $this->createIndex('fk_product_image_product', '{{%product_image}}', 'product_id');
        $this->addForeignKey('fk_product_image_product', '{{%product_image}}', 'product_id', '{{%product}}', 'id');

        $this->createIndex('fk_slider_image', '{{%slider}}', 'image_id');
        $this->addForeignKey('fk_slider_image', '{{%slider}}', 'image_id', '{{%image}}', 'id');

        $this->createIndex('fk_order_product_product', '{{%order_product}}', 'product_id');
        $this->addForeignKey('fk_order_product_product', '{{%order_product}}', 'product_id', '{{%product}}', 'id');

        $this->createIndex('fk_order_product_order', '{{%order_product}}', 'order_id');
        $this->addForeignKey('fk_order_product_order', '{{%order_product}}', 'order_id', '{{%order}}', 'id');

    }

    public function safeDown()
    {
        echo "m171002_044052_base cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171002_044052_base cannot be reverted.\n";

        return false;
    }
    */
}
