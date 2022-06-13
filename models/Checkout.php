<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checkout".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idCategory
 * @property int $result
 *
 * @property User $user
 */
class Checkout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checkout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['idUser', 'idCategory'], 'required'],
            [['idUser', 'idCategory', 'result'], 'integer'],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'default', 'value' => Yii::$app->user->getId()], //автоматически подставим

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'idUser' => 'Пользователь',
            'idCategory' => 'Тема',
            'result' => 'Результат',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }

}
