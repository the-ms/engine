<?php
/**
 * @var yii\web\View $this
 * @var string $action 'add' or 'edit'
 * @var yii\bootstrap\ActiveForm $form
 * @var app\modules\module\models\Module $item
 * @var app\modules\module\models\ModuleCat[] $cats
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if ($action == 'add') {
    $this->title = 'Добавление';
    $button_text = 'Добавить';
} else {
    $this->title = 'Редактирование';
    $button_text = 'Сохранить';
}

$cats_list = ['0' => 'Нет'];
foreach ($cats as $category) {
    $cats_list[$category->id] = Html::encode($category->title);
}
?>

<h1><?=Html::encode($this->title) ?></h1>

<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?=$form->field($item, 'title')->textInput()?>
<?=$form->field($item, 'text')->textArea()?>

<?
 $file_hint = $item->file ? '<a href="/uploads/module/' . $item->file . '">' . $item->file . '</a>' : '';
?>
<?=$form->field($item, 'file')->fileInput()->hint($file_hint)?>

<?=$form->field($item, 'cat')->dropDownList($cats_list)?>
<?=Html::submitButton($button_text, ['class' => 'btn btn-primary'])?>
<? ActiveForm::end(); ?>