<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Navigation;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="s-wrapper">
    <header class="s-header">
        <div class="s-container">
            <div class="s-logo">
                <?=Html::img("/i/logo.png");?>
                <h2>Site title</h2>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-default">
        <div class="s-container">
            <form class="navbar-form navbar-right" action="http://www.yandex.ru/yandsearch">
                <input name="stype" value="www" type="hidden">
                <input name="surl" value="<?=Url::base(true)?>" type="hidden">
                <div class="form-group">
                    <input name="text" type="search" class="form-control" placeholder="Текст поиска">
                </div>
                <button type="submit" class="btn btn-default">Найти</button>
            </form>
            <?
            echo Navigation::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/']],
                    ['label' => 'Модуль', 'url' => ['/module']],
                    ['label' => 'Контакты', 'url' => ['/contacts']],
                    ['label' => 'Обратная связь', 'url' => ['/feedback']],
                Yii::$app->user->isGuest
                    ? ['label' => 'Войти', 'url' => ['/site/login']]
                    : ['label' => 'Администрирование', 'url' => ['/admin']]
                ]
            ]);
            ?>
        </div>
    </nav>


    <div class="s-container">
        <?
            echo Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
        ?>
        <div class="row">
            <aside class="s-aside col-xs-6 col-sm-3 sidebar-offcanvas">
                <?
                echo Navigation::widget([
                    'options' => ['class' => 'nav-pills nav-stacked'],
                    'items' => [
                        ['label' => 'Главная', 'url' => ['/']],
                        ['label' => 'Модуль', 'url' => ['/module']],
                        ['label' => 'Контакты', 'url' => ['/contacts']],
                        ['label' => 'Обратная связь', 'url' => ['/feedback']],
                    ],
                ]);
                ?>
            </aside>
            <section class="s-section col-xs-12 col-sm-9">
                <?=$content;?>
            </section>
        </div>
    </div>
</div>

<footer class="s-footer">
    <div class="s-container">
       &copy; My Company <?= date('Y') ?>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>