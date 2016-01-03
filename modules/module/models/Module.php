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
            'cat_id' => 'Категория',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'price' => 'Цена',
            'image' => 'Изображение',
            'file' => 'Файл',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'url' => 'Адрес сайта',
            'email' => 'E-mail',
            'address' => 'Адрес',
            'user_id' => 'Id пользователя',
            'date' => 'Дата',
            'active' => 'Отображать на сайте?',
        ];
    }

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'gif,png,jpg,jpeg'],
            ['title', 'required'],
            ['url', 'url'],
            ['email', 'email'],
        ];
    }

    public function scenarios()
    {
        return [
            'default' => ['cat_id', 'title', 'text', 'image', 'file'],
            'admin' => ['cat_id', 'title', 'text', 'price', 'image', 'file', 'name', 'phone', 'url', 'email', 'address', 'user_id', 'date', 'active'],
        ];
    }
}