<?php

namespace app\modules\module\models;

use yii\db\ActiveRecord;

/**
 * @property int id
 * @property string title
 */
class ModuleCat extends ActiveRecord {

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'cat_id' => 'Родительская категория',
        ];
    }

    public function scenarios()
    {
        return [
            'default' => ['title', 'cat_id'],
        ];
    }
}