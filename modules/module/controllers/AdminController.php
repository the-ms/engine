<?php

namespace app\modules\module\controllers;

use Yii;
use yii\web\Controller;
use app\modules\module\models\Module;
use app\modules\module\models\ModuleCat;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    public $layout = '/admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $items = Module::findAll(['cat' => 0]);
        $cats = ModuleCat::findAll(['cat' => 0]);
        return $this->render('cat', ['items' => $items, 'cats' => $cats]);
    }

    public function actionAdd()
    {
        $item = new Module();
        $cats = ModuleCat::find()->all();

        if ($item->load(Yii::$app->request->post()) && $item->save()) {
            Yii::$app->session->setFlash('edit');
            $parent_dir = empty($item->cat) ? '' : '/cat/' . $item->cat;
            return $this->redirect('/module/admin' . $parent_dir);
        }

        return $this->render('edit', ['action' => 'add', 'item' => $item, 'cats' => $cats]);
    }

    public function actionEdit($id)
    {
        /* @var Module $item */
        $item = Module::findOne($id);
        $cats = ModuleCat::find()->all();

        if (Yii::$app->request->isPost) {
            if ($item->load(Yii::$app->request->post()) && $item->save()) {
                Yii::$app->session->setFlash('edit');
                $parent_dir = empty($item->cat) ? '' : '/cat/' . $item->cat;
                return $this->redirect('/module/admin' . $parent_dir);
            }
        }

        return $this->render('edit', ['item' => $item, 'cats' => $cats]);
    }

    public function actionDelete($id)
    {
        /* @var Module $item */
        $item = Module::findOne($id);
        $parent_dir = empty($item->cat) ? '' : '/cat/' . $item->cat;
        $item->delete();
        Yii::$app->session->setFlash('delete');
        return $this->redirect('/module/admin' . $parent_dir);
    }

    public function actionCat($id)
    {
        $cat = ModuleCat::findOne($id);
        $items = Module::findAll(['cat' => $id]);
        $cats = ModuleCat::findAll(['cat' => $id]);
        return $this->render('cat', ['cat' => $cat, 'items' => $items, 'cats' => $cats]);
    }

    public function actionAddcat()
    {
        $cat = new ModuleCat();
        $cats = ModuleCat::findAll(['cat' => 0]);
        if ($cat->load(Yii::$app->request->post()) && $cat->save()) {
            Yii::$app->session->setFlash('editcat');
            $parent_dir = empty($cat->cat) ? '' : '/cat/' . $cat->cat;
            return $this->redirect('/module/admin' . $parent_dir);
        }

        return $this->render('editcat', ['action' => 'add', 'cat' => $cat, 'cats' => $cats]);
    }

    public function actionEditcat($id)
    {
        /* @var ModuleCat $cat */
        $cat = ModuleCat::findOne($id);
        $cats = ModuleCat::findAll(['cat' => 0]);

        if (Yii::$app->request->isPost) {
            if ($cat->load(Yii::$app->request->post()) && $cat->save()) {
                Yii::$app->session->setFlash('editcat');
                $parent_dir = empty($cat->cat) ? '' : '/cat/' . $cat->cat;
                return $this->redirect('/module/admin' . $parent_dir);
            }
        }

        return $this->render('editcat', ['cat' => $cat, 'cats' => $cats]);
    }

    public function actionDeletecat($id)
    {
        /* @var ModuleCat $cat */
        $cat = ModuleCat::findOne($id);
        $parent_dir = empty($cat->cat) ? '' : '/cat/' . $cat->cat;
        $cat->delete();
        Yii::$app->session->setFlash('deletecat');
        return $this->redirect('/module/admin' . $parent_dir);
    }

}
