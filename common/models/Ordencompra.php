<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ordencompra".
 *
 * @property int $id
 * @property string|null $tipo_comprobante
 * @property int|null $num_comprobante
 * @property string $fecha_orden
 * @property float $impuesto
 * @property int $total
 * @property int $estado
 * @property int $asesor_id
 * @property int $usuario_id
 *
 * @property Asesor $asesor
 * @property Detalleventa[] $detalleventas
 * @property Usuario $usuario
 */
class Ordencompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordencompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_comprobante', 'total', 'estado', 'asesor_id', 'usuario_id'], 'integer'],
            [['fecha_orden', 'impuesto', 'total', 'estado', 'asesor_id', 'usuario_id'], 'required'],
            [['fecha_orden'], 'safe'],
            [['impuesto'], 'number'],
            [['tipo_comprobante'], 'string', 'max' => 30],
            [['asesor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asesor::className(), 'targetAttribute' => ['asesor_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_comprobante' => 'Tipo Comprobante',
            'num_comprobante' => 'Num Comprobante',
            'fecha_orden' => 'Fecha Orden',
            'impuesto' => 'Impuesto',
            'total' => 'Total',
            'estado' => 'Estado',
            'asesor_id' => 'Asesor ID',
            'usuario_id' => 'Usuario ID',
        ];
    }

    /**
     * Gets query for [[Asesor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesorQuery
     */
    public function getAsesor()
    {
        return $this->hasOne(Asesor::className(), ['id' => 'asesor_id']);
    }

    /**
     * Gets query for [[Detalleventas]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\DetalleventaQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['orden_id' => 'id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UsuarioQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\OrdencompraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OrdencompraQuery(get_called_class());
    }
}
