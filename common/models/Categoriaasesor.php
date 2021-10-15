<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoriaasesor".
 *
 * @property int $id
 * @property int $asesor_id
 * @property int $categoria_id
 *
 * @property Asesor $asesor
 * @property Categoria $categoria
 */
class Categoriaasesor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoriaasesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asesor_id', 'categoria_id'], 'required'],
            [['asesor_id', 'categoria_id'], 'integer'],
            [['asesor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asesor::className(), 'targetAttribute' => ['asesor_id' => 'id']],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
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
            'categoria_id' => 'Categoria ID',
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
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoriaQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CategoriaasesorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CategoriaasesorQuery(get_called_class());
    }
}
