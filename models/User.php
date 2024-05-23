<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string $phone
 * @property string $login
 * @property string $password
 * @property int $user_role_id
 *
 * @property Comment[] $comments
 * @property RequestMaster[] $requestMasters
 * @property Request[] $requests
 * @property UserRole $userRole
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
            [['surname', 'name', 'phone', 'login', 'password', 'user_role_id'], 'required'],
            [['user_role_id'], 'integer'],
            [['surname', 'name', 'patronymic', 'phone', 'login', 'password'], 'string', 'max' => 255],
            [['user_role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::class, 'targetAttribute' => ['user_role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'phone' => 'Phone',
            'login' => 'Login',
            'password' => 'Password',
            'user_role_id' => 'User Role ID',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['master_id' => 'id']);
    }

    /**
     * Gets query for [[RequestMasters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestMasters()
    {
        return $this->hasMany(RequestMaster::class, ['master_id' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[UserRole]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserRole()
    {
        return $this->hasOne(UserRole::class, ['id' => 'user_role_id']);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($login)
    {
        return User::findOne(['login' => $login]);
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
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
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

    public function isManager()
    {
        return $this->userRole->code === 'manager';
    }

    public function isMaster() {
        return $this->userRole->code === 'master';
    }

    public function isClient() {
        return $this->userRole->code === 'user';
    }

    public function isOperator() {
        return $this->userRole->code === 'operator';
    }
}
