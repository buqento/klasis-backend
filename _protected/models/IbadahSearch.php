<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ibadah;

/**
 * IbadahSearch represents the model behind the search form of `app\models\Ibadah`.
 */
class IbadahSearch extends Ibadah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pelayan_id', 'gereja_id'], 'integer'],
            [['waktu', 'deskripsi', 'created_at'], 'safe'],
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
        $query = Ibadah::find();

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
            'pelayan_id' => $this->pelayan_id,
            'gereja_id' => $this->gereja_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'waktu', $this->waktu])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
