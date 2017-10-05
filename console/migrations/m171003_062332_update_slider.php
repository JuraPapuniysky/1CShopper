<?php

use yii\db\Migration;

class m171003_062332_update_slider extends Migration
{
    public function safeUp()
    {
        $this->dropForeignKey('fk_slider_image', '{{%slider}}');
        $this->dropIndex('fk_slider_image', '{{%slider}}');
        $this->dropColumn('{{%slider}}', 'image_id');

        $this->createTable('{{%slider_image}}', [
            'id' => $this->primaryKey(),
            'slider_id' => $this->integer(),
            'image_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex('fk_slider_image', '{{%slider_image}}', 'slider_id');
        $this->addForeignKey('fk_slider_image', '{{%slider_image}}', 'slider_id', '{{%slider}}', 'id');

        $this->createIndex('fk_image_slider', '{{%slider_image}}', 'image_id');
        $this->addForeignKey('fk_image_slider', '{{%slider_image}}', 'image_id', '{{%image}}', 'id');
    }

    public function safeDown()
    {
        echo "m171003_062332_update_slider cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171003_062332_update_slider cannot be reverted.\n";

        return false;
    }
    */
}
