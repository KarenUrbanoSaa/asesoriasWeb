<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clases".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string $hora
 * @property string $dia
 * @property int $curso_id
 *
 * @property Cursos $curso
 */
class Clases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hora', 'dia', 'curso_id'], 'required'],
            [['curso_id'], 'integer'],
            [['titulo'], 'string', 'max' => 100],
            [['hora', 'dia'], 'string', 'max' => 10],
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
            'hora' => 'Hora',
            'dia' => 'Dia',
            'curso_id' => 'Curso ID',
        ];
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
     * {@inheritdoc}
     * @return \common\models\query\ClasesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ClasesQuery(get_called_class());
    }
}
