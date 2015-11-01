<?php
/**
 * @var yii\web\View $this
 * @var string $action 'add' or 'edit'
 * @var yii\bootstrap\ActiveForm $form
 * @var app\modules\module\models\ModuleCat $cat
 * @var app\modules\module\models\ModuleCat[] $cats
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if ($action == 'add') {
    $this->title = 'Добавление категории';
    $button_text = 'Добавить категорию';
} else {
    $this->title = 'Редактирование категории';
    $button_text = 'Сохранить категорию';
}

$cats_list = ['0' => 'Нет'];
foreach ($cats as $category) {
    $cats_list[$category->id] = Html::encode($category->title);
}
?>

<h1><?=Html::encode($this->title) ?></h1>

<? $form = ActiveForm::begin(); ?>
<?=$form->field($cat, 'title')->textInput()?>
<?=$form->field($cat, 'cat')->dropDownList($cats_list)?>
<?=Html::submitButton($button_text, ['class' => 'btn btn-primary'])?>
<? ActiveForm::end(); ?>