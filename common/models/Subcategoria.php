<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subcategoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descipcion
 * @property int $categoria_id
 *
 * @property Asesoria[] $asesorias
 * @property Categoria $categoria
 * @property Subcategoriaasesor[] $subcategoriaasesors
 */
class Subcategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descipcion', 'categoria_id'], 'required'],
            [['descipcion'], 'string'],
            [['categoria_id'], 'integer'],
            [['nombre'], 'string', 'max' => 40],
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
            'nombre' => 'Nombre',
            'descipcion' => 'Descipcion',
            'categoria_id' => 'Categoria ID',
        ];
    }

    /**
     * Gets query for [[Asesorias]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaQuery
     */
    public function getAsesorias()
    {
        return $this->hasMany(Asesoria::className(), ['subcategoria_id' => 'id']);
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
     * Gets query for [[Subcategoriaasesors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubcategoriaasesorQuery
     */
    public function getSubcategoriaasesors()
    {
        return $this->hasMany(Subcategoriaasesor::className(), ['subcategoria_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SubcategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SubcategoriaQuery(get_called_class());
    }
}
