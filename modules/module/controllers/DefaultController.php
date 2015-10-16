<?php

namespace app\modules\module\controllers;

use Yii;
use yii\web\Controller;
use app\modules\module\models\Module;
use yii\web\HttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $items = Module::find()->orderBy('id')->all();
        return $this->render('index', ['items' => $items]);
    }

    public function actionView($id = null)
    {
        if ($id === null) {
            throw new HttpException(404, 'Not Found');
        }

        $item = Module::findOne($id);

        if ($item === null) {
            throw new HttpException(404, 'Not Found');
        }

        return $this->render('view', ['item' => $item]);
    }
}