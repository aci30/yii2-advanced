<?php

namespace frontend\models;

class Book extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%books}}';
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }
}