<?php

namespace app\models;

use Yii;
use yii\web\Controller;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $login
 * @property string $password
 * @property int $idDepartment
 * @property int $idObligation
 * @property int $idPosition
 *
 * @property Department $department
 * @property Checkout $id0
 * @property Obligation $obligation
 * @property Position $position
 */
class Admin extends User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */


    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'idDepartment']);
    }



    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId()
    {
        return $this->hasOne(Checkout::className(), ['idUser' => 'id']);
    }

    /**
     * Gets query for [[Obligation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObligation()
    {
        return $this->hasOne(Obligation::className(), ['id' => 'idObligation']);
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'idPosition']);
    }


}
