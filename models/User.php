<?php

namespace app\models;

use Yii;
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
class User extends \yii\db\ActiveRecord implements IdentityInterface
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
    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'password', 'idDepartment', 'idObligation', 'idPosition'], 'required'],
            [['name', 'surname'], 'string'],
            ['name', 'match', 'pattern'=>'/^[А-Яа-я\s\-]{3,}$/u', 'message'=>'Разрешена только кириллица, пробел и дефис'],
            ['surname', 'match', 'pattern'=>'/^[А-Яа-я\s\-]{3,}$/u', 'message'=>'Разрешена только кириллица, пробел и дефис'],
            [['idDepartment', 'idObligation', 'idPosition', 'role'], 'integer'],
            [['login', 'password'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Checkout::className(), 'targetAttribute' => ['id' => 'idUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'login' => 'Логин',
            'password' => 'Пароль',
            'idDepartment' => 'Отдел',
            'idObligation' => 'Обязанности',
            'idPosition' => 'Должность',
            'role'=>'Admin'
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'idDepartment']);
    }

    public function isAdmin(){
        return $this->role==1;
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */

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

    public static function findIdentity($id)
    {
       return self::findOne($id);
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
       /* foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }*/

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
       /* foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }*/

        return self::find()->where(['login'=>$username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
       // return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        //return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
