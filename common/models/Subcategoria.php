<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subcategoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property int $categoria_id
 * @property string $logo
 * @property int $status
 *
 * @property AsesoriaCurso[] $asesoriaCursos
 * @property Categoria $categoria
 * @property Subcategoriaasesor[] $subcategoriaasesors
 * @property User[] $users
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
            [['nombre', 'categoria_id'], 'required'],
            [['descripcion'], 'string'],
            [['categoria_id', 'status'], 'integer'],
            [['nombre'], 'string', 'max' => 40],
            [['imagen', 'logo'], 'string', 'max' => 100],
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
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'categoria_id' => 'Categoria ID',
            'logo' => 'Logo',
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
        return $this->hasMany(AsesoriaCurso::className(), ['subcategoria_id' => 'id']);
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
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['subcategoria_id' => 'id']);
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
