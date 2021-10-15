<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subcategoriaasesor".
 *
 * @property int $id
 * @property int $asesor_id
 * @property int $subcategoria_id
 *
 * @property Asesor $asesor
 * @property Subcategoria $subcategoria
 */
class Subcategoriaasesor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategoriaasesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asesor_id', 'subcategoria_id'], 'required'],
            [['asesor_id', 'subcategoria_id'], 'integer'],
            [['asesor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asesor::className(), 'targetAttribute' => ['asesor_id' => 'id']],
            [['subcategoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategoria::className(), 'targetAttribute' => ['subcategoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asesor_id' => 'Asesor ID',
            'subcategoria_id' => 'Subcategoria ID',
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
     * Gets query for [[Subcategoria]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubcategoriaQuery
     */
    public function getSubcategoria()
    {
        return $this->hasOne(Subcategoria::className(), ['id' => 'subcategoria_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SubcategoriaasesorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SubcategoriaasesorQuery(get_called_class());
    }
}
