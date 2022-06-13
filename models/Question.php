<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property string $name
 * @property string $correct
 * @property string $answer1
 * @property string $answer2
 * @property int $idCategory
 *
 * @property Category $category
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'correct', 'answer1', 'answer2', 'idCategory'], 'required'],
            [['name', 'correct', 'answer1', 'answer2'], 'string'],
            [['idCategory'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Вопрос',
            'correct' => 'Верный ответ',
            'answer1' => 'Ответ',
            'answer2' => 'Ответ',
            'idCategory' => 'Тема',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }
}
