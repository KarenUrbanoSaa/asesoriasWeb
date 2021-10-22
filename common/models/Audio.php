<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "audio".
 *
 * @property int $id
 * @property string $ruta
 * @property int $unidad_id
 *
 * @property Unidad $unidad
 */
class Audio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'audio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ruta', 'unidad_id'], 'required'],
            [['unidad_id'], 'integer'],
            [['ruta'], 'string', 'max' => 200],
            [['unidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::className(), 'targetAttribute' => ['unidad_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ruta' => 'Ruta',
            'unidad_id' => 'Unidad ID',
        ];
    }

    /**
     * Gets query for [[Unidad]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UnidadQuery
     */
    public function getUnidad()
    {
        return $this->hasOne(Unidad::className(), ['id' => 'unidad_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AudioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AudioQuery(get_called_class());
    }
}
