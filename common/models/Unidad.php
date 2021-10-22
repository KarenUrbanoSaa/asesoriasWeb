<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unidad".
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property string|null $imagen
 * @property int $curso_id
 *
 * @property Archivo[] $archivos
 * @property Audio[] $audios
 * @property Comentarios[] $comentarios
 * @property Cursos $curso
 * @property Video $video
 */
class Unidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion', 'curso_id'], 'required'],
            [['curso_id'], 'integer'],
            [['titulo', 'imagen'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 1000],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cursos::className(), 'targetAttribute' => ['curso_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'curso_id' => 'Curso ID',
        ];
    }

    /**
     * Gets query for [[Archivos]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ArchivoQuery
     */
    public function getArchivos()
    {
        return $this->hasMany(Archivo::className(), ['unidad_id' => 'id']);
    }

    /**
     * Gets query for [[Audios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AudioQuery
     */
    public function getAudios()
    {
        return $this->hasMany(Audio::className(), ['unidad_id' => 'id']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ComentariosQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['unidad_id' => 'id']);
    }

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CursosQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Cursos::className(), ['id' => 'curso_id']);
    }

    /**
     * Gets query for [[Video]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\VideoQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['unidad_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UnidadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UnidadQuery(get_called_class());
    }
}
