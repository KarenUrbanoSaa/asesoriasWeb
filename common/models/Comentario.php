<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property string $comentario
 * @property string $fecha
 * @property string $created_by si es asesor o usuario
 * @property int $usuario_id
 * @property int $status 0-inactivo 1-activo 3-editado
 * @property int $unidad_id
 *
 * @property Respuesta[] $respuestas
 * @property UnidadTema $unidad
 * @property User $usuario
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comentario', 'created_by', 'usuario_id', 'unidad_id'], 'required'],
            [['fecha'], 'safe'],
            [['usuario_id', 'status', 'unidad_id'], 'integer'],
            [['comentario'], 'string', 'max' => 1000],
            [['created_by'], 'string', 'max' => 20],
            [['unidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadTema::className(), 'targetAttribute' => ['unidad_id' => 'id']],
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
            'comentario' => 'Comentario',
            'fecha' => 'Fecha',
            'created_by' => 'Created By',
            'usuario_id' => 'Usuario ID',
            'status' => 'Status',
            'unidad_id' => 'Unidad ID',
        ];
    }

    /**
     * Gets query for [[Respuestas]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RespuestaQuery
     */
    public function getRespuestas()
    {
        return $this->hasMany(Respuesta::className(), ['comentario_id' => 'id']);
    }

    /**
     * Gets query for [[Unidad]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UnidadTemaQuery
     */
    public function getUnidad()
    {
        return $this->hasOne(UnidadTema::className(), ['id' => 'unidad_id']);
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
     * @return \common\models\query\ComentarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ComentarioQuery(get_called_class());
    }
}
