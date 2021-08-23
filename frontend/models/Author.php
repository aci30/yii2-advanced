<?php

namespace frontend\models;

class Author extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%author}}';
    }

    public function getBooks()
    {
        $this->hasMany(Book::class, ['author_id' => 'id']);
    }
}