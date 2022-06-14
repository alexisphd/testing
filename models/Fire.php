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
 * @property float $smogDefence
 * @property float $fireDefence
 * @property float $alarmSystem
 * @property float $fireStationNear
 * @property float $fireThings
 * @property float $fireFreeEscapes
 * @property int $timeOnwork
 * @property int $escapeTime
 * @property int $escapeBlocking
 * @property int $startEscape
 * @property int $timeZator
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
            [['class', 'chastotaFire', 'escapedPeople', 'unescapedPeople', 'smogDefence', 'fireDefence', 'alarmSystem', 'fireStationNear', 'fireThings', 'fireFreeEscapes', 'timeOnwork', 'escapeTime', 'escapeBlocking', 'startEscape', 'timeZator'], 'required'],
            [['chastotaFire', 'smogDefence', 'fireDefence', 'alarmSystem', 'fireStationNear', 'fireThings', 'fireFreeEscapes'], 'number'],
            [['escapedPeople', 'unescapedPeople', 'timeOnwork', 'escapeTime', 'escapeBlocking', 'startEscape', 'timeZator'], 'integer'],
            [['class'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'class' => 'Класс функциональной пожарной опасности',
            'chastotaFire' => 'Частота возникновения пожара',
            'escapedPeople' => 'Количество эвакуирующихся людей',
            'unescapedPeople' => 'Количество неэвакуировавшихся людей',
            'smogDefence' => 'Вероятность срабатывания противодымной защиты',
            'fireDefence' => 'Вероятность срабатывания системы пожаротушения',
            'alarmSystem' => 'Вероятность срабатывания системы оповещения',
            'fireStationNear' => 'Дислокация пожарной охраны соответствует НД по ПБ',
            'fireThings' => 'Соблюдаются требования НД по ПБ к оснащению первичными средствами пожаротушения',
            'fireFreeEscapes' => 'Соблюдаются требования НД по ПБ к путям эвакуации',
            'timeOnwork' => 'Время нахождения людей в здании, час',
            'escapeTime' => 'Расчетное время эвакуации людей, мин',
            'escapeBlocking' => 'Время блокирования путей эвакуации, мин',
            'startEscape' => 'Время начала эвакуации, мин',
            'timeZator' => 'Время существования скопления людей на участках пути, мин',
        ];
    }
}
