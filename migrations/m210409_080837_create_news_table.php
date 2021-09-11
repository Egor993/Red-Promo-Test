<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m210409_080837_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'description'  => $this->text(),
            'img'  => $this->string(100),
            'city' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
