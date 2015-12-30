<?php
/**
 * @var $this yii\web\View
 * @var app\models\Module $item
 */

use yii\helpers\Html;

$this->title = $item->title;
?>

<h1><?=$this->title?></h1>

<? if (!empty($item->text)) { ?>
    <p><?=Html::encode($item->text)?></p>
<? } ?>

<? if (!empty($item->price)) { ?>
    <p>Цена: <?=Html::encode($item->price)?> руб.</p>
<? } ?>

<? if (!empty($item->name)) { ?>
    <p>Имя: <?=Html::encode($item->name)?></p>
<? } ?>

<? if (!empty($item->phone)) { ?>
    <p>Телефон: <?=Html::encode($item->phone)?></p>
<? } ?>

<? if (!empty($item->url)) { ?>
    <p><a href="<?=$item->url?>"><?=Html::encode($item->url)?></a></p>
<? } ?>

<? if (!empty($item->email)) { ?>
    <p><a href="mailto:<?=$item->email?>"><?=Html::encode($item->email)?></a></p>
<? } ?>

<? if (!empty($item->address)) { ?>
    <p>Адрес: <?=Html::encode($item->address)?></p>
<? } ?>

<? if (!empty($item->date) && $item->date != '0000-00-00') { ?>
    <p>Дата: <?=Yii::$app->formatter->asDate($item->date, 'dd.MM.yyyy');?></p>
<? } ?>

<? if ($item->file) { ?>
    <p><a href="/uploads/module/<?=$item->file?>"><?=$item->file?></a></p>
<? } ?>

<? if ($item->image) { ?>
    <p><a href="/uploads/module/<?=$item->image?>" data-toggle="lightbox"><img src="/uploads/module/s_<?=$item->image?>"></a></p>
<? } ?>