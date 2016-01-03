<?php

namespace app\modules\module\controllers;

use Yii;
use yii\web\Controller;
use app\modules\module\models\Module;
use app\modules\module\models\ModuleCat;
use yii\web\HttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $items = Module::findAll(['cat_id' => 0]);
        $cats = ModuleCat::findAll(['cat_id' => 0]);
        return $this->render('cat', ['items' => $items, 'cats' => $cats]);
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

    public function actionAdd()
    {
        $item = new Module();
        $item->date = date('Y-m-d');
        $cats = ModuleCat::find()->all();

        if ($item->load(Yii::$app->request->post()) && $item->save()) {
            Yii::$app->session->setFlash('edit');
            $parent_dir = empty($item->cat_id) ? '' : '/cat/' . $item->cat_id;
            return $this->redirect('/module' . $parent_dir);
        }

        return $this->render('edit', ['action' => 'add', 'item' => $item, 'cats' => $cats]);
    }

    public function actionCat($id)
    {
        $cat = ModuleCat::findOne($id);
        $items = Module::findAll(['cat_id' => $id]);
        $cats = ModuleCat::findAll(['cat_id' => $id]);
        return $this->render('cat', ['cat_id' => $cat, 'items' => $items, 'cats' => $cats]);
    }
}
