<?php

namespace app\modules\module\controllers;

use Yii;
use yii\web\Controller;
use app\modules\module\models\Module;

class AdminController extends Controller
{
    public $layout = '/admin';

    public function actionIndex()
    {
        $items = Module::find()->all();
        return $this->render('index', ['items' => $items]);
    }
}
