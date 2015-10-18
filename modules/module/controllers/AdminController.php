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
        $items = Module::find()->orderBy('id')->all();
        return $this->render('index', ['items' => $items]);
    }

    public function actionAdd()
    {
        $model = new Module();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('edit');

            return $this->redirect('/module/admin');
        }

        return $this->render('edit', ['action' => 'add', 'model' => $model]);
    }

    public function actionEdit($id)
    {
        if (Yii::$app->request->isPost) {
            $model = new Module();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('edit');

                return $this->redirect('/module/admin');
            }
        } else {
            $model = Module::findOne($id);
        }

        return $this->render('edit', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $item = Module::find()->where(['id' => $id])->one();
        $item->delete();
        Yii::$app->session->setFlash('delete');
        return $this->redirect('/module/admin');
    }
}
