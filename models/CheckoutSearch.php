<?php

namespace app\models;

use app\models\Checkout;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CheckoutSearch represents the model behind the search form of `app\models\Checkout`.
 */
class CheckoutSearch extends Checkout
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'idCategory', 'result'], 'integer'],
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
        $query = Checkout::find();

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
            'idCategory' => $this->idCategory,
            'result' => $this->result,
        ]);

        return $dataProvider;
    }

    public function byUserSearch($params, $idUser)
    {
        $query = Checkout::find();

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
        $query->andWhere(['idUser'=>$idUser]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
          //  'idUser' => $this->idUser,
            'idCategory' => $this->idCategory,
            'result' => $this->result,
        ]);

        return $dataProvider;
    }
}
