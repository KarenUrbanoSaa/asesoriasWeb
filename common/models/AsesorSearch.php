<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Asesor;

/**
 * AsesorSearch represents the model behind the search form of `common\models\Asesor`.
 */
class AsesorSearch extends Asesor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categoria_id', 'subcategoria_id'], 'integer'],
            [['nombre', 'apellido', 'telefono', 'mail', 'pass', 'estudios', 'aptitudes', 'temas_asesoria', 'about_me'], 'safe'],
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
        $query = Asesor::find();

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
            'categoria_id' => $this->categoria_id,
            'subcategoria_id' => $this->subcategoria_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['like', 'estudios', $this->estudios])
            ->andFilterWhere(['like', 'aptitudes', $this->aptitudes])
            ->andFilterWhere(['like', 'temas_asesoria', $this->temas_asesoria])
            ->andFilterWhere(['like', 'about_me', $this->about_me]);

        return $dataProvider;
    }
}
