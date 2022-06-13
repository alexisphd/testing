<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string $name
 * @property int $remark
 *
 * @property User $id0
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'remark'], 'required'],
            [['name'], 'string'],
            [['remark'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'idPosition']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Должность',
            'remark' => 'Примечания',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['idPosition' => 'id']);
    }
}
