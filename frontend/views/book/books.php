<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\LinkPager;

/* @var $models */
/* @var $pages */
/* @var $bookModel */

foreach ($models as $model)
{
    echo 'title: '.$model->title;
    echo '<br>';
    echo 'text: '.$model->text;
    echo '<br>';
    echo 'author: '.$model->author->name;
    echo '<hr>';
}

echo LinkPager::widget([
    'pagination' => $pages,
]);

echo '<br>';

$form = ActiveForm::begin([
    'id' => 'book-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($bookModel, 'title') ?>
<?= $form->field($bookModel, 'text')->textarea(['rows' => 10]) ?>
<?= $form->field($bookModel, 'author_id') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Add book', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>