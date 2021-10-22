<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cursos".
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property string $fecha
 * @property int $status
 * @property int $asesor_id
 *
 * @property Asesor $asesor
 * @property Clases[] $clases
 * @property Unidad[] $unidads
 * @property UsuarioCurso[] $usuarioCursos
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'fecha', 'asesor_id'], 'required'],
            [['fecha'], 'safe'],
            [['status', 'asesor_id'], 'integer'],
            [['titulo', 'imagen'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500],
            [['asesor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asesor::className(), 'targetAttribute' => ['asesor_id' => 'id']],
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
            'descripcion' => 'Descripción',
            'imagen' => 'Imagen',
            'fecha' => 'Fecha',
            'status' => 'Status',
            'asesor_id' => 'Asesor ID',
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
     * Gets query for [[Clases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ClasesQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clases::className(), ['curso_id' => 'id']);
    }

    /**
     * Gets query for [[Unidads]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UnidadQuery
     */
    public function getUnidads()
    {
        return $this->hasMany(Unidad::className(), ['curso_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioCursos]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UsuarioCursoQuery
     */
    public function getUsuarioCursos()
    {
        return $this->hasMany(UsuarioCurso::className(), ['curso_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CursosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CursosQuery(get_called_class());
    }
}
