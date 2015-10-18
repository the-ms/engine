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
    <ul class="list-unstyled">
        <?
        foreach ($items as $item) { ?>
            <li>
                <a href="/module/view/<?=$item->id?>"><?=Html::encode($item->title) ?></a>
            </li>
        <? } ?>
    </ul>
    <a href="/module/add" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Добавить</a>
</div>