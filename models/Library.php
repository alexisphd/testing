<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $filename
 */
class Library extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'library';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'filename'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['filename'], 'file', 'extensions' => 'jpg, jpeg, pdf, doc', 'message' => 'Некорректный файл'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Название',
            'description' => 'Описание',
            'filename' => 'Файл',
        ];
    }
}
