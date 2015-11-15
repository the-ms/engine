<?php

namespace app\modules\module\models;

use yii\db\ActiveRecord;

/**
 * @property int id
 * @property string title
 * @property string text
 * @property string file
 */
class Module extends ActiveRecord {

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
            'file' => 'Файл',
            'cat' => 'Категория',
        ];
    }

    public function scenarios()
    {
        return [
            'default' => ['title', 'text', 'file', 'cat'],
        ];
    }
}