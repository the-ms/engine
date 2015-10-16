<?php
/**
 * @var yii\web\View $this
 * @var string $action 'add' or 'edit'
 * @var yii\bootstrap\ActiveForm $form
 * @var app\modules\module\models\Module $model
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

?>

<h1><?=Html::encode($this->title) ?></h1>

<? $form = ActiveForm::begin(); ?>
<?=$form->field($model, 'title')->textInput()?>
<?=$form->field($model, 'text')->textArea()?>
<?=Html::submitButton($button_text, ['class' => 'btn btn-primary'])?>
<? ActiveForm::end(); ?>