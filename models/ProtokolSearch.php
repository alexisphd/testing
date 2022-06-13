<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Protokol;

/**
 * ProtokolSearch represents the model behind the search form of `app\models\Protokol`.
 */
class ProtokolSearch extends Protokol
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'userResult'], 'integer'],
            [['companyName', 'detailPrikaz', 'detailComission', 'obuchenieName', 'detailReestr'], 'safe'],
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
        $query = Protokol::find();

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
            'idUser' => $this->idUser,
            'userResult' => $this->userResult,
            'detailReestr' => $this->detailReestr,
        ]);

        $query->andFilterWhere(['like', 'companyName', $this->companyName])
            ->andFilterWhere(['like', 'detailPrikaz', $this->detailPrikaz])
            ->andFilterWhere(['like', 'detailComission', $this->detailComission])
            ->andFilterWhere(['like', 'obuchenieName', $this->obuchenieName]);

        return $dataProvider;
    }
}
