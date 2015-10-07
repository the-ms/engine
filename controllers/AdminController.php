<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
