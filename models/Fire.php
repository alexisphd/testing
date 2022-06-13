<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fire".
 *
 * @property int $id
 * @property string $class
 * @property float $chastotaFire
 * @property int $escapedPeople
 * @property int $unescapedPeople
 * @property int $smogDefence
 * @property int $fireDefence
 * @property int $alarmSystem
 * @property int $fireStationNear
 * @property int $fireThings
 * @property int $fireFreeEscapes
 */
class Fire extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fire';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class', 'chastotaFire', 'escapedPeople', 'unescapedPeople', 'smogDefence', 'fireDefence', 'alarmSystem', 'fireStationNear', 'fireThings', 'fireFreeEscapes'], 'required'],
            [['chastotaFire'], 'number'],
            [['escapedPeople', 'unescapedPeople', 'smogDefence', 'fireDefence', 'alarmSystem', 'fireStationNear', 'fireThings', 'fireFreeEscapes'], 'integer'],
            [['class'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
            'chastotaFire' => 'Chastota Fire',
            'escapedPeople' => 'Escaped People',
            'unescapedPeople' => 'Unescaped People',
            'smogDefence' => 'Smog Defence',
            'fireDefence' => 'Fire Defence',
            'alarmSystem' => 'Alarm System',
            'fireStationNear' => 'Fire Station Near',
            'fireThings' => 'Fire Things',
            'fireFreeEscapes' => 'Fire Free Escapes',
        ];
    }
}
