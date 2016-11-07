<?php

namespace app\models;

use Yii;


class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PrivilegeID', 'IsActive'], 'integer'],
            [['FirstName', 'LastName'], 'string', 'max' => 55],
            [['Email', 'UserName'], 'string', 'max' => 50],
            [['Password', 'PasswordHash'], 'string', 'max' => 75],
            [['PhoneNum'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UserID' => 'User ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Email' => 'Email',
            'UserName' => 'User Name',
            'Password' => 'Password',
            'PasswordHash' => 'Password Hash',
            'PhoneNum' => 'Phone Num',
            'PrivilegeID' => 'Privilege ID',
            'IsActive' => 'Is Active',
        ];
    }

    public function verifyPassword($password)
    {
        if($this->Password == $password)
            return true;
        else
            return false;
    }

    public static function findByUsername($username)
    {
        $data = Users::find()->where(['UserName' => $username])->one();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return NULL;
        }
    }

    public static function findByEmail($email)
    {
        $data = Users::find()->where(['Email' => $email])->one();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return NULL;
        }
    }

    public static function findIdentity($id)
    {
        $data = Users::find()->where(['UserID' => $id])->one();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return NULL;
        }
    }

    public function getId()
    {
        return $this->UserID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }
}

?>