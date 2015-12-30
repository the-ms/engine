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

<? if (Yii::$app->session->hasFlash('deletefile')) { ?>
    <div class="alert alert-success">Файл успешно удален</div>
<? } ?>

<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?=$form->field($item, 'title')->textInput()?>
<?=$form->field($item, 'text')->textArea()?>
<?=$form->field($item, 'price')->textInput()?>
<?=$form->field($item, 'name')->textInput()?>
<?=$form->field($item, 'phone')->textInput()?>
<?=$form->field($item, 'url')->input('url')?>
<?=$form->field($item, 'email')->input('email')?>
<?=$form->field($item, 'address')->textInput()?>
<?=$form->field($item, 'date')->textInput()?>
<?=$form->field($item, 'active')->checkbox()?>

<?
    $file_hint = '';
    if ($item->file) {
        $file_link = '<a href="/uploads/module/' . $item->file . '">' . $item->file . '</a>';
        $file_delete = '<a href="/module/admin/deletefile/' . $item->id . '" class="glyphicon glyphicon-trash js-delete" title="Удалить"></a>';
    }
?>
<?=$form->field($item, 'file')->fileInput()->hint($file_link . ' '. $file_delete)?>

<?
$image_hint = '';
if ($item->image) {
    $image_link = '<a href="/uploads/module/' . $item->image . '" data-toggle="lightbox"><img src="/uploads/module/s_' . $item->image . '"></a>';
    $image_delete = '<a href="/module/admin/deleteimage/' . $item->id . '" class="glyphicon glyphicon-trash js-delete" title="Удалить"></a>';
}
?>
<?=$form->field($item, 'image')->fileInput()->hint($image_link . ' '. $image_delete)?>

<?=$form->field($item, 'cat')->dropDownList($cats_list)?>

<?=Html::submitButton($button_text, ['class' => 'btn btn-primary'])?>
<? ActiveForm::end(); ?>