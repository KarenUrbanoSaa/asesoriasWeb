<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string|null $telefono
 * @property string $correo
 * @property string $contrasena
 * @property string $intereses
 *
 * @property Asesoria[] $asesorias
 * @property Ordencompra[] $ordencompras
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'correo', 'contrasena', 'intereses'], 'required'],
            [['intereses'], 'string'],
            [['nombre', 'apellido', 'contrasena'], 'string', 'max' => 30],
            [['telefono'], 'string', 'max' => 11],
            [['correo'], 'string', 'max' => 40],
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
            'correo' => 'Correo',
            'contrasena' => 'Contrasena',
            'intereses' => 'Intereses',
        ];
    }

    /**
     * Gets query for [[Asesorias]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaQuery
     */
    public function getAsesorias()
    {
        return $this->hasMany(Asesoria::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Ordencompras]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrdencompraQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UsuarioQuery(get_called_class());
    }
}
