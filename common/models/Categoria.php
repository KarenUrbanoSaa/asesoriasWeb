<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $imagen
 *
 * @property Asesoria[] $asesorias
 * @property Categoriaasesor[] $categoriaasesors
 * @property Subcategoria[] $subcategorias
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'imagen'], 'required'],
            [['nombre'], 'string', 'max' => 40],
            [['descripcion'], 'string', 'max' => 255],
            [['imagen'], 'string', 'max' => 200],
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
            'descripcion' => 'Descripción',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[Asesorias]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaQuery
     */
    public function getAsesorias()
    {
        return $this->hasMany(Asesoria::className(), ['categoria_id' => 'id']);
    }

    /**
     * Gets query for [[Categoriaasesors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoriaasesorQuery
     */
    public function getCategoriaasesors()
    {
        return $this->hasMany(Categoriaasesor::className(), ['categoria_id' => 'id']);
    }

    /**
     * Gets query for [[Subcategorias]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubcategoriaQuery
     */
    public function getSubcategorias()
    {
        return $this->hasMany(Subcategoria::className(), ['categoria_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CategoriaQuery(get_called_class());
    }

    public function getUrlImagen(){
        return Yii::$app->params['frontendUrl'].'Imag/';
    }
}
