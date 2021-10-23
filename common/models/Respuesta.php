<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "respuesta".
 *
 * @property int $id
 * @property string $replica
 * @property string $fecha
 * @property int $usuario_id
 * @property string $created_by
 * @property int $status 0-inactivo 1-activo 3-editado
 * @property int $comentario_id
 *
 * @property Comentario $comentario
 * @property User $usuario
 */
class Respuesta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['replica', 'fecha', 'usuario_id', 'created_by', 'comentario_id'], 'required'],
            [['fecha'], 'safe'],
            [['usuario_id', 'status', 'comentario_id'], 'integer'],
            [['replica'], 'string', 'max' => 1000],
            [['created_by'], 'string', 'max' => 20],
            [['comentario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comentario::className(), 'targetAttribute' => ['comentario_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'replica' => 'Replica',
            'fecha' => 'Fecha',
            'usuario_id' => 'Usuario ID',
            'created_by' => 'Created By',
            'status' => 'Status',
            'comentario_id' => 'Comentario ID',
        ];
    }

    /**
     * Gets query for [[Comentario]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ComentarioQuery
     */
    public function getComentario()
    {
        return $this->hasOne(Comentario::className(), ['id' => 'comentario_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'usuario_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RespuestaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RespuestaQuery(get_called_class());
    }
}
