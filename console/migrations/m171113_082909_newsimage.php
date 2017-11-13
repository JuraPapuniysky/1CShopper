<?php

use yii\db\Migration;

class m171113_082909_newsimage extends Migration
{
    public function safeUp()
    {
        $this->createTable('news_promotion_image',[
            'id' => $this->primaryKey(),
            'news_promotion_id' => $this->integer()->unique()->notNull(),
            'src' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex('fk_news_prom_image', '{{%news_promotion_image}}', 'news_promotion_id');
        $this->addForeignKey('fk_news_prom_image', '{{%news_promotion_image}}', 'news_promotion_id', '{{%news_promotion}}', 'id');
    }

    public function safeDown()
    {
        echo "m171113_082909_newsimage cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171113_082909_newsimage cannot be reverted.\n";

        return false;
    }
    */
}
