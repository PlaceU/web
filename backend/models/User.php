<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $name
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property int $isadmin
 *
 * @property MembrosOrganizacao[] $membrosOrganizacaos
 * @property Organizacao[] $organizacaos
 * @property Organizacao[] $organizacaos0
 */
class User extends \yii\db\ActiveRecord
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
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'isadmin'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'name', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'isadmin' => 'Isadmin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembrosOrganizacaos()
    {
        return $this->hasMany(MembrosOrganizacao::className(), ['id_utilizador' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizacaos()
    {
        return $this->hasMany(Organizacao::className(), ['id' => 'id_organizacao'])->viaTable('membros_organizacao', ['id_utilizador' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizacaos0()
    {
        return $this->hasMany(Organizacao::className(), ['id_owner' => 'id']);
    }
}
