<?php

namespace app\modules\module\models;

use yii\db\ActiveRecord;

/**
 * @property int id
 * @property string title
 * @property string text
 * @property string file
 * @property string image
 */
class Module extends ActiveRecord {

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
            'file' => 'Файл',
            'image' => 'Изображение',
            'cat' => 'Категория',
        ];
    }

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'gif,png,jpg,jpeg'],
        ];
    }

    public function scenarios()
    {
        return [
            'default' => ['title', 'text', 'file', 'image', 'cat'],
        ];
    }
}