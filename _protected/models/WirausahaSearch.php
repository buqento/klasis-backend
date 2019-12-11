<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wirausaha;

/**
 * WirausahaSearch represents the model behind the search form of `app\models\Wirausaha`.
 */
class WirausahaSearch extends Wirausaha
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'biodata_id', 'usaha_id'], 'integer'],
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
        $query = Wirausaha::find();

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
            'biodata_id' => $this->biodata_id,
            'usaha_id' => $this->usaha_id,
        ]);

        return $dataProvider;
    }
}
