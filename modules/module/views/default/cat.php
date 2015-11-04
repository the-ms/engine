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

    <ul class="list-unstyled">
        <? foreach ($cats as $cat) { ?>
            <li>
                <a href="/module/cat/<?=$cat->id?>"><?=Html::encode($cat->title) ?></a>
            </li>
        <? } ?>
        <? foreach ($items as $item) { ?>
            <li>
                <a href="/module/view/<?=$item->id?>"><?=Html::encode($item->title) ?></a>
            </li>
        <? } ?>
    </ul>
    <a href="/module/add" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Добавить</a>
</div>