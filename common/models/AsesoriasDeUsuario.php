<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "asesorias_de_usuario".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $curso_id
 *
 * @property AsesoriaCurso $curso
 * @property User $usuario
 */
class AsesoriasDeUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asesorias_de_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuario_id', 'curso_id'], 'required'],
            [['id', 'usuario_id', 'curso_id'], 'integer'],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => AsesoriaCurso::className(), 'targetAttribute' => ['curso_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'curso_id' => 'Curso ID',
        ];
    }

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaCursoQuery
     */
    public function getCurso()
    {
        return $this->hasOne(AsesoriaCurso::className(), ['id' => 'curso_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'usuario_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AsesoriasDeUsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AsesoriasDeUsuarioQuery(get_called_class());
    }
}
