<?php
/**
 * @var $this yii\web\View
 * @var app\models\Module[] $items
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
                <a href="view/<?=$item->id?>"><?=Html::encode($item->title) ?></a>
            </li>
        <? } ?>
    </ul>
</div>