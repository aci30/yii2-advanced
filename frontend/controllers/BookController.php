<?php

namespace frontend\controllers;

use frontend\models\Book;
use frontend\models\Author;
use frontend\models\BookForm;
use yii\data\Pagination;

class BookController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new BookForm();
        $model->load(\Yii::$app->request->post());

        if ($model->validate()){
            $book = new Book();
            $book->title = $model->title;
            $book->text = $model->text;
            $author = Author::find()->where(['id' => $model->author_id])->one();
            $book->link('author', $author);

            $book->save();
        }
        $books = Book::find()->with('author');
        $countQuery = clone $books;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $models = $books->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('books', [
            'models' => $models,
            'pages' => $pages,
            'bookModel' => new BookForm(),
        ]);
    }
}