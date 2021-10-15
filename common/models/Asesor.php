<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "asesor".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $mail
 * @property string $pass
 * @property string|null $estudios
 * @property string|null $aptitudes
 * @property string|null $temas_asesoria
 * @property string|null $about_me
 * @property int $categoria_id
 * @property int $subcategoria_id
 *
 * @property Asesoria[] $asesorias
 * @property Categoriaasesor[] $categoriaasesors
 * @property Ordencompra[] $ordencompras
 * @property Subcategoriaasesor[] $subcategoriaasesors
 */
class Asesor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'telefono', 'mail', 'pass', 'categoria_id', 'subcategoria_id'], 'required'],
            [['estudios', 'aptitudes', 'temas_asesoria', 'about_me'], 'string'],
            [['categoria_id', 'subcategoria_id'], 'integer'],
            [['nombre', 'apellido', 'pass'], 'string', 'max' => 30],
            [['telefono'], 'string', 'max' => 15],
            [['mail'], 'string', 'max' => 40],
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
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
            'mail' => 'Mail',
            'pass' => 'Pass',
            'estudios' => 'Estudios',
            'aptitudes' => 'Aptitudes',
            'temas_asesoria' => 'Temas Asesoria',
            'about_me' => 'About Me',
            'categoria_id' => 'Categoria ID',
            'subcategoria_id' => 'Subcategoria ID',
        ];
    }

    /**
     * Gets query for [[Asesorias]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaQuery
     */
    public function getAsesorias()
    {
        return $this->hasMany(Asesoria::className(), ['asesor_id' => 'id']);
    }

    /**
     * Gets query for [[Categoriaasesors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoriaasesorQuery
     */
    public function getCategoriaasesors()
    {
        return $this->hasMany(Categoriaasesor::className(), ['asesor_id' => 'id']);
    }

    /**
     * Gets query for [[Ordencompras]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrdencompraQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['asesor_id' => 'id']);
    }

    /**
     * Gets query for [[Subcategoriaasesors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubcategoriaasesorQuery
     */
    public function getSubcategoriaasesors()
    {
        return $this->hasMany(Subcategoriaasesor::className(), ['asesor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AsesorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AsesorQuery(get_called_class());
    }
    public function getUrlImagen(){
        return Yii::$app->params['frontendUrl'].'Imag/';
    }
}
