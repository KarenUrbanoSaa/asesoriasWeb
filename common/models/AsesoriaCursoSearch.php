<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AsesoriaCurso;

/**
 * AsesoriaCursoSearch represents the model behind the search form of `common\models\AsesoriaCurso`.
 */
class AsesoriaCursoSearch extends AsesoriaCurso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by', 'num_subscriptores', 'categoria_id'], 'integer'],
            [['titulo', 'descripcion', 'imagen', 'url_video', 'fecha', 'likes'], 'safe'],
            [['url_video','subcategorias_pertenece'], 'string', 'max' => 255],//LAY
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AsesoriaCurso::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'num_subscriptores' => $this->num_subscriptores,
            'categoria_id' => $this->categoria_id,
            'subcategorias_pertenece' =>$this->subcategorias_pertenece,//lo agregué yo
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'imagen', $this->imagen])
            ->andFilterWhere(['like', 'url_video', $this->url_video])
            ->andFilterWhere(['like', 'likes', $this->likes]);

        return $dataProvider;
    }
}
