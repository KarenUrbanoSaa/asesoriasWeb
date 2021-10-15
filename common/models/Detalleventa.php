<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detalleventa".
 *
 * @property int $id
 * @property int $asesoria_id
 * @property int $orden_id
 * @property float $precio
 * @property float $descuento
 *
 * @property Asesoria $asesoria
 * @property Ordencompra $orden
 */
class Detalleventa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalleventa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asesoria_id', 'orden_id', 'precio', 'descuento'], 'required'],
            [['asesoria_id', 'orden_id'], 'integer'],
            [['precio', 'descuento'], 'number'],
            [['orden_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ordencompra::className(), 'targetAttribute' => ['orden_id' => 'id']],
            [['asesoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asesoria::className(), 'targetAttribute' => ['asesoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asesoria_id' => 'Asesoria ID',
            'orden_id' => 'Orden ID',
            'precio' => 'Precio',
            'descuento' => 'Descuento',
        ];
    }

    /**
     * Gets query for [[Asesoria]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaQuery
     */
    public function getAsesoria()
    {
        return $this->hasOne(Asesoria::className(), ['id' => 'asesoria_id']);
    }

    /**
     * Gets query for [[Orden]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrdencompraQuery
     */
    public function getOrden()
    {
        return $this->hasOne(Ordencompra::className(), ['id' => 'orden_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\DetalleventaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\DetalleventaQuery(get_called_class());
    }
}
