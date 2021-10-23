<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "suscripcion".
 *
 * @property int $id
 * @property string $plan_suscrito
 * @property float $precio_unitario
 * @property int $cantidad
 * @property string $empieza
 * @property string $termina
 * @property float $precio_total
 * @property int $status
 * @property int $usuario_id
 * @property string|null $observaciones
 * @property int $asesoria_id
 *
 * @property AsesoriaCurso $asesoria
 * @property User $usuario
 */
class Suscripcion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suscripcion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_suscrito', 'precio_unitario', 'empieza', 'termina', 'precio_total', 'status', 'usuario_id', 'asesoria_id'], 'required'],
            [['precio_unitario', 'precio_total'], 'number'],
            [['cantidad', 'status', 'usuario_id', 'asesoria_id'], 'integer'],
            [['empieza', 'termina'], 'safe'],
            [['observaciones'], 'string'],
            [['plan_suscrito'], 'string', 'max' => 255],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['asesoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => AsesoriaCurso::className(), 'targetAttribute' => ['asesoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_suscrito' => 'Plan Suscrito',
            'precio_unitario' => 'Precio Unitario',
            'cantidad' => 'Cantidad',
            'empieza' => 'Empieza',
            'termina' => 'Termina',
            'precio_total' => 'Precio Total',
            'status' => 'Status',
            'usuario_id' => 'Usuario ID',
            'observaciones' => 'Observaciones',
            'asesoria_id' => 'Asesoria ID',
        ];
    }

    /**
     * Gets query for [[Asesoria]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaCursoQuery
     */
    public function getAsesoria()
    {
        return $this->hasOne(AsesoriaCurso::className(), ['id' => 'asesoria_id']);
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
     * @return \common\models\query\SuscripcionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SuscripcionQuery(get_called_class());
    }
}
