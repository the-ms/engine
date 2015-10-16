<?php
/**
 * @var $this yii\web\View
 * @var app\modules\module\models\Module[] $items
 */

use yii\helpers\Html;

$this->title = 'Модуль';
?>
<div class="site-module">
    <h1>Модуль</h1>

    <? if (Yii::$app->session->hasFlash('edit')) { ?>
        <div class="alert alert-success">Запись успешно сохранена</div>
    <? } ?>

    <table class="table">
        <?
        foreach ($items as $item) { ?>
            <tr>
                <td><?=Html::encode($item->title);?></td>
                <td><a href="/module/view/<?=$item->id?>" class="glyphicon glyphicon-eye-open" title="Посмотреть"></a></td>
                <td><a href="http://engine/module/admin/edit/<?=$item->id?>" class="glyphicon glyphicon-pencil" title="Редактировать"></a></td>
                <td><a href="http://engine/module/admin/delete/<?=$item->id?>" class="glyphicon glyphicon-trash" title="Удалить"></a></td>
            </tr>
        <? } ?>
    </table>
    <a href="http://engine/module/admin/add" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Добавить</a>
</div>