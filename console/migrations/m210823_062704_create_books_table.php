<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m210823_062704_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'text'=> $this->text(),
            'author_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-books-author_id',
            '{{%books}}',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-post-author_id',
            'books'
        );

        $this->dropTable('{{%books}}');
    }
}
