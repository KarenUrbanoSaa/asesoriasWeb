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
 * @property string $icono
 * @property int $status
 *
 * @property AsesoriaCurso[] $asesoriaCursos
 * @property Categoriaasesor[] $categoriaasesors
 * @property Subcategoria[] $subcategorias
 * @property User[] $users
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
            [['status'], 'integer'],
            [['nombre'], 'string', 'max' => 40],
            [['descripcion'], 'string', 'max' => 255],
            [['imagen'], 'string', 'max' => 200],
            [['icono'], 'string', 'max' => 50],
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
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'icono' => 'Icono',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[AsesoriaCursos]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaCursoQuery
     */
    public function getAsesoriaCursos()
    {
        return $this->hasMany(AsesoriaCurso::className(), ['categoria_id' => 'id']);
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
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['categoria_id' => 'id']);
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
