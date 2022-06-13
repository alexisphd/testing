<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fire;

/**
 * FireSearch represents the model behind the search form of `app\models\Fire`.
 */
class FireSearch extends Fire
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'escapedPeople', 'unescapedPeople', 'smogDefence', 'fireDefence', 'alarmSystem', 'fireStationNear', 'fireThings', 'fireFreeEscapes'], 'integer'],
            [['class'], 'safe'],
            [['chastotaFire'], 'number'],
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
        $query = Fire::find();

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
            'chastotaFire' => $this->chastotaFire,
            'escapedPeople' => $this->escapedPeople,
            'unescapedPeople' => $this->unescapedPeople,
            'smogDefence' => $this->smogDefence,
            'fireDefence' => $this->fireDefence,
            'alarmSystem' => $this->alarmSystem,
            'fireStationNear' => $this->fireStationNear,
            'fireThings' => $this->fireThings,
            'fireFreeEscapes' => $this->fireFreeEscapes,
        ]);

        $query->andFilterWhere(['like', 'class', $this->class]);

        return $dataProvider;
    }
}
