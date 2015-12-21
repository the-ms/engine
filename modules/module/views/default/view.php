<?php
/**
 * @var $this yii\web\View
 * @var app\models\Module $item
 */

use yii\helpers\Html;

$this->title = $item->title;
?>

<h1><?=$this->title?></h1>

<p><?=Html::encode($item->text)?></p>

<? if ($item->file) { ?>
    <p><a href="/uploads/module/<?=$item->file?>"><?=$item->file?></a></p>
<? } ?>

<? if ($item->image) { ?>
    <p><a href="/uploads/module/<?=$item->image?>"><img src="/uploads/module/s_<?=$item->image?>"></a></p>
<? } ?>