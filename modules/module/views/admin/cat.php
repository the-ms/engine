<?php
/**
 * @var $this yii\web\View
 * @var app\modules\module\models\Module[] $items
 * @var app\modules\module\models\ModuleCat $cat
 * @var app\modules\module\models\ModuleCat[] $cats
 */

use yii\helpers\Html;

$this->title = 'Модуль';
?>
<div class="site-module">
    <h1>Модуль</h1>

    <? if (isset($cat)) { ?>
        <h2><?=$cat->title?></h2>
    <? } ?>

    <? if (Yii::$app->session->hasFlash('edit')) { ?>
        <div class="alert alert-success">Запись успешно сохранена</div>
    <? } ?>

    <? if (Yii::$app->session->hasFlash('delete')) { ?>
        <div class="alert alert-success">Запись успешно удалена</div>
    <? } ?>

    <table class="table">
        <? foreach ($cats as $cat) { ?>
            <tr>
                <td><span class="glyphicon glyphicon-folder-open"></span> &nbsp; <a href="/module/admin/cat/<?=$cat->id?>"><?=Html::encode($cat->title);?></a></td>
                <td><a href="/module/cat/<?=$cat->id?>" class="glyphicon glyphicon-eye-open" title="Посмотреть"></a></td>
                <td><a href="/module/admin/editcat/<?=$cat->id?>" class="glyphicon glyphicon-pencil" title="Редактировать"></a></td>
                <td><a href="/module/admin/deletecat/<?=$cat->id?>" class="glyphicon glyphicon-trash js-delete" title="Удалить"></a></td>
            </tr>
        <? } ?>
        <? foreach ($items as $item) { ?>
            <tr>
                <td><?=Html::encode($item->title);?></td>
                <td><a href="/module/view/<?=$item->id?>" class="glyphicon glyphicon-eye-open" title="Посмотреть"></a></td>
                <td><a href="/module/admin/edit/<?=$item->id?>" class="glyphicon glyphicon-pencil" title="Редактировать"></a></td>
                <td><a href="/module/admin/delete/<?=$item->id?>" class="glyphicon glyphicon-trash js-delete" title="Удалить"></a></td>
            </tr>
        <? } ?>
    </table>
    <a href="/module/admin/add" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Добавить</a>
    <a href="/module/admin/addcat" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Добавить категорию</a>
</div>