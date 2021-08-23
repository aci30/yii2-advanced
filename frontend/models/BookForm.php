<?php

namespace frontend\models;

class BookForm extends \yii\base\Model
{
    public $title;
    public $text;
    public $author_id;


    public function rules()
    {
        return [
            [['title', 'text', 'author_id'], 'required'],
            ['author_id', 'in', 'range' => Author::find()->select(['id'])->asArray()->column()],
        ];
    }
}