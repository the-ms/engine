<?php

namespace app\modules\module\controllers;

use Yii;
use app\modules\module\models\Module;
use app\modules\module\models\ModuleCat;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\imagine\Image;

class AdminController extends DefaultController
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

    public function actionAdd()
    {
        $item = new Module();
        $item->scenario = 'admin';
        $cats = ModuleCat::find()->all();
        $item->date = date('Y-m-d');
        $item->user_id = 1;

        if (Yii::$app->request->isPost) {
            $uploaded_file = $item->file = UploadedFile::getInstance($item, 'file');
            $uploaded_image = $item->image = UploadedFile::getInstance($item, 'image');

            if ($item->load(Yii::$app->request->post()) && $item->validate()) {
                $item->file = '';
                $item->image = '';

                if ($item->save()) {
                    if ($uploaded_file) {
                        $item->file = $item->id . '.' . $uploaded_file->extension;
                        $uploaded_file->saveAs('uploads/' . $this->module->id . '/' . $item->file);
                        $item->save();
                    }
                    if ($uploaded_image) {
                        $item->image = $item->id . '.' . $uploaded_image->extension;
                        $uploaded_image->saveAs('uploads/' . $this->module->id . '/' . $item->image);
                        Image::thumbnail('uploads/' . $this->module->id . '/' . $item->image, 120, 120)
                            ->save('uploads/' . $this->module->id . '/s_' . $item->image);
                        $item->save();
                    }

                    Yii::$app->session->setFlash('edit');
                    $parent_dir = empty($item->cat_id) ? '' : '/cat/' . $item->cat_id;
                    return $this->redirect('/module/admin' . $parent_dir);
                }
            }
        }

        return $this->render('edit', ['action' => 'add', 'item' => $item, 'cats' => $cats]);
    }

    public function actionEdit($id)
    {
        /* @var Module $item */
        $item = Module::findOne($id);
        $item->scenario = 'admin';
        $cats = ModuleCat::find()->all();

        if (Yii::$app->request->isPost) {
            $uploaded_file = $item->file = UploadedFile::getInstance($item, 'file');
            $uploaded_image = $item->image = UploadedFile::getInstance($item, 'image');

            if ($item->load(Yii::$app->request->post()) && $item->validate()) {
                $item->file = '';
                $item->image = '';

                if ($item->save()) {
                    if ($uploaded_file) {
                        $item->file = $item->id . '.' . $uploaded_file->extension;
                        $uploaded_file->saveAs('uploads/' . $this->module->id . '/' . $item->file);
                        $item->save();
                    }
                    if ($uploaded_image) {
                        $item->image = $item->id . '.' . $uploaded_image->extension;
                        $uploaded_image->saveAs('uploads/' . $this->module->id . '/' . $item->image);
                        $item->save();
                    }

                    Yii::$app->session->setFlash('edit');
                    $parent_dir = empty($item->cat_id) ? '' : '/cat/' . $item->cat_id;
                    return $this->redirect('/module/admin' . $parent_dir);
                }
            }
        }

        return $this->render('edit', ['item' => $item, 'cats' => $cats]);
    }

    public function actionDelete($id)
    {
        /* @var Module $item */
        $item = Module::findOne($id);
        $item->scenario = 'admin';
        $parent_dir = empty($item->cat_id) ? '' : '/cat/' . $item->cat_id;
        $item->delete();
        Yii::$app->session->setFlash('delete');
        return $this->redirect('/module/admin' . $parent_dir);
    }

    public function actionDeletefile($id)
    {
        /* @var Module $item */
        $item = Module::findOne($id);
        $item->scenario = 'admin';
        $item->file = '';
        $item->save();
        Yii::$app->session->setFlash('deletefile');
        return $this->redirect('/module/admin/edit/' . $id);
    }

    public function actionDeleteimage($id)
    {
        /* @var Module $item */
        $item = Module::findOne($id);
        $item->scenario = 'admin';
        $item->image = '';
        $item->save();
        Yii::$app->session->setFlash('deletefile');
        return $this->redirect('/module/admin/edit/' . $id);
    }

    public function actionAddcat()
    {
        $cat = new ModuleCat();
        $cats = ModuleCat::findAll(['cat_id' => 0]);
        if ($cat->load(Yii::$app->request->post()) && $cat->save()) {
            Yii::$app->session->setFlash('editcat');
            $parent_dir = empty($cat->cat_id) ? '' : '/cat/' . $cat->cat_id;
            return $this->redirect('/module/admin' . $parent_dir);
        }

        return $this->render('editcat', ['action' => 'add', 'cat' => $cat, 'cats' => $cats]);
    }

    public function actionEditcat($id)
    {
        /* @var ModuleCat $cat */
        $cat = ModuleCat::findOne($id);
        $cats = ModuleCat::findAll(['cat_id' => 0]);

        if (Yii::$app->request->isPost) {
            if ($cat->load(Yii::$app->request->post()) && $cat->save()) {
                Yii::$app->session->setFlash('editcat');
                $parent_dir = empty($cat->cat_id) ? '' : '/cat/' . $cat->cat_id;
                return $this->redirect('/module/admin' . $parent_dir);
            }
        }

        return $this->render('editcat', ['cat' => $cat, 'cats' => $cats]);
    }

    public function actionDeletecat($id)
    {
        /* @var ModuleCat $cat */
        $cat = ModuleCat::findOne($id);
        $parent_dir = empty($cat->cat_id) ? '' : '/cat/' . $cat->cat_id;
        $cat->delete();
        Yii::$app->session->setFlash('deletecat');
        return $this->redirect('/module/admin' . $parent_dir);
    }

}
