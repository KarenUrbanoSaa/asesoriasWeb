<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "asesoria_curso".
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property string|null $url_video
 * @property string $fecha
 * @property int $status
 * @property string|null $likes
 * @property int $created_by
 * @property int $num_subscriptores
 * @property string|null $subcategorias_pertenece
 * @property int $categoria_id
 *
 * @property AsesoriaSubcategoria[] $asesoriaSubcategorias
 * @property AsesoriasDeUsuario[] $asesoriasDeUsuarios
 * @property Categoria $categoria
 * @property Clases[] $clases
 * @property User $createdBy
 * @property PrecioAsesoria $precioAsesoria
 * @property Subcategoria $subcategoria
 * @property Suscripcion[] $suscripcions
 * @property UnidadTema[] $unidadTemas
 */
class AsesoriaCurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asesoria_curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'fecha'], 'required'],
            [['fecha'], 'safe'],
            [['status', 'created_by', 'num_subscriptores', 'categoria_id'], 'integer'],
            [['titulo', 'imagen'], 'string', 'max' => 100],
            [['descripcion'], 'string'],
            [['url_video','subcategorias_pertenece'], 'string', 'max' => 255],
            [['likes'], 'string', 'max' => 20],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'titulo' => 'Dale un título a tu asesoría',
            'descripcion' => 'Detalla qué se aprenderá con tu asesoría',
            'imagen' => 'Imagen',
            'url_video' => 'Url Video',
            'fecha' => 'Fecha',
            'status' => 'Estatus',
            'likes' => 'Likes',
            'created_by' => 'Asesor',
            'num_subscriptores' => 'Subscriptores',
            'categoria_id' => 'Categoria',
            'subcategorias_pertenece' => 'Subcategorias',
        ];
    }

    /**
     * Gets query for [[AsesoriaSubcategorias]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriaSubcategoriaQuery
     */
    public function getAsesoriaSubcategorias()
    {
        return $this->hasMany(AsesoriaSubcategoria::className(), ['asesoria_id' => 'id']);
    }

    /**
     * Gets query for [[AsesoriasDeUsuarios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsesoriasDeUsuarioQuery
     */
    public function getAsesoriasDeUsuarios()
    {
        return $this->hasMany(AsesoriasDeUsuario::className(), ['curso_id' => 'id']);
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
     * Gets query for [[Clases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ClasesQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clases::className(), ['curso_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[PrecioAsesoria]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PrecioAsesoriaQuery
     */
    public function getPrecioAsesoria()
    {
        return $this->hasOne(PrecioAsesoria::className(), ['asesoria_id' => 'id']);
    }

    /**
     * Gets query for [[Suscripcions]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SuscripcionQuery
     */
    public function getSuscripcions()
    {
        return $this->hasMany(Suscripcion::className(), ['asesoria_id' => 'id']);
    }

    /**
     * Gets query for [[UnidadTemas]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UnidadTemaQuery
     */
    public function getUnidadTemas()
    {
        return $this->hasMany(UnidadTema::className(), ['curso_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AsesoriaCursoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AsesoriaCursoQuery(get_called_class());
    }

    //obtener el id del usuario logueado
    public function idUsuario(){
        return Yii::$app->user->identity->id;
    }
}
