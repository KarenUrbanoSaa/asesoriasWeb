<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $num_identificacion
 * @property string|null $foto
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string $rol
 * @property string|null $nombre
 * @property int|null $apellido
 * @property int|null $estudios
 * @property string|null $telefono
 * @property string|null $aptitudes
 * @property string|null $temas_asesoria
 * @property string|null $intereses
 * @property string|null $about_me
 * @property int $categoria_id
 * @property int $subcategoria_id
 * @property string|null $observaciones
 *
 * @property AsesoriaCurso[] $asesoriaCursos
 * @property AsesoriasDeUsuario[] $asesoriasDeUsuarios
 * @property Categoriaasesor[] $categoriaasesors
 * @property Comentario[] $comentarios
 * @property Respuesta[] $respuestas
 * @property Subcategoriaasesor[] $subcategoriaasesors
 * @property Subcripcion[] $subcripcions
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_identificacion', 'status', 'created_at', 'updated_at', 'apellido', 'estudios', 'categoria_id', 'subcategoria_id'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['intereses', 'about_me', 'observaciones'], 'string'],
            [['foto'], 'string', 'max' => 40],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'aptitudes', 'temas_asesoria'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['rol'], 'string', 'max' => 10],
            [['nombre'], 'string', 'max' => 30],
            [['telefono'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED],'message'=>'La contraseña debe tener al menos 8 caracteres'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    // Agregadas después
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_identificacion' => 'Num Identificacion',
            'foto' => 'Foto',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'rol' => 'Rol',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'estudios' => 'Estudios',
            'telefono' => 'Telefono',
            'aptitudes' => 'Aptitudes',
            'temas_asesoria' => 'Temas Asesoria',
            'intereses' => 'Intereses',
            'about_me' => 'About Me',
            'categoria_id' => 'Categoria ID',
            'subcategoria_id' => 'Subcategoria ID',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * Gets query for [[AsesoriaCursos]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaCursoQuery
     */
    public function getAsesoriaCursos()
    {
        return $this->hasMany(AsesoriaCurso::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[AsesoriasDeUsuarios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriasDeUsuarioQuery
     */
    public function getAsesoriasDeUsuarios()
    {
        return $this->hasMany(AsesoriasDeUsuario::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Categoriaasesors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoriaasesorQuery
     */
    public function getCategoriaasesors()
    {
        return $this->hasMany(Categoriaasesor::className(), ['asesor_id' => 'id']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ComentarioQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Respuestas]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RespuestaQuery
     */
    public function getRespuestas()
    {
        return $this->hasMany(Respuesta::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Subcategoriaasesors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubcategoriaasesorQuery
     */
    public function getSubcategoriaasesors()
    {
        return $this->hasMany(Subcategoriaasesor::className(), ['asesor_id' => 'id']);
    }

    //ensayando a ver si las puedo sacar categorías y subcategorías directamente sin la tabla intermedia de muchos a muchos
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    public function getSubcategoria()
    {
        return $this->hasOne(Subcategoria::className(), ['id' => 'subcategoria_id']);
    }

    /**
     * Gets query for [[Subcripcions]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubcripcionQuery
     */
    public function getSubcripcions()
    {
        return $this->hasMany(Suscripcion::className(), ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserQuery(get_called_class());
    }

    public function getUrlImagen(){
        return Yii::$app->params['frontendUrl'].'Imag/';
    }
}

