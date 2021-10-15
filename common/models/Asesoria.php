<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "asesoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property float $precio
 * @property int $asesor_id
 * @property int $categoria_id
 * @property int $subcategoria_id
 * @property int $usuario_id
 *
 * @property Asesor $asesor
 * @property Categoria $categoria
 * @property Detalleventa[] $detalleventas
 * @property Subcategoria $subcategoria
 * @property Usuario $usuario
 */
class Asesoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asesoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'precio', 'asesor_id', 'categoria_id', 'subcategoria_id', 'usuario_id'], 'required'],
            [['precio'], 'number'],
            [['asesor_id', 'categoria_id', 'subcategoria_id', 'usuario_id'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['descripcion'], 'string', 'max' => 255],
            [['asesor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asesor::className(), 'targetAttribute' => ['asesor_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            [['subcategoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategoria::className(), 'targetAttribute' => ['subcategoria_id' => 'id']],
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
            'precio' => 'Precio',
            'asesor_id' => 'Asesor ID',
            'categoria_id' => 'Categoria ID',
            'subcategoria_id' => 'Subcategoria ID',
            'usuario_id' => 'Usuario ID',
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
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoriaQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * Gets query for [[Detalleventas]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\DetalleventaQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['asesoria_id' => 'id']);
    }

    /**
     * Gets query for [[Subcategoria]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubcategoriaQuery
     */
    public function getSubcategoria()
    {
        return $this->hasOne(Subcategoria::className(), ['id' => 'subcategoria_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UsuarioQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AsesoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AsesoriaQuery(get_called_class());
    }
}
