<?php

namespace app\modules\module\models;

use yii\db\ActiveRecord;

/**
 * @property int id
 * @property string title
 * @property string text
 */
class Module extends ActiveRecord {

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
        ];
    }

    public function scenarios()
    {
        return [
            'default' => ['title', 'text'],
        ];
    }
}