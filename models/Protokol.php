<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "protokol".
 *
 * @property int $id
 * @property string $companyName
 * @property string $detailPrikaz
 * @property string $detailComission
 * @property string $obuchenieName
 * @property int $idUser
 * @property int $userResult
 * @property string $detailReestr
 *
 */
class Protokol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protokol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyName', 'detailPrikaz', 'detailComission', 'obuchenieName', 'idUser', ], 'required'],
            [['companyName', 'detailPrikaz', 'detailComission', 'obuchenieName'], 'string'],
            [['idUser', 'userResult'], 'integer'],
            [['detailReestr'], 'safe'],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'companyName' => 'Предприятие',
            'detailPrikaz' => 'Приказ',
            'detailComission' => 'Комиссия',
            'obuchenieName' => 'Обучение',
            'idUser' => 'Id User',
            'userResult' => 'Результаты',
            'detailReestr' => 'Дата',
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
