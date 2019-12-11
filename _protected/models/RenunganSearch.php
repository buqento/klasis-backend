<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Renungan;

/**
 * RenunganSearch represents the model behind the search form of `app\models\Renungan`.
 */
class RenunganSearch extends Renungan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tanggal', 'ayat', 'perikop', 'konten', 'created_at'], 'safe'],
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
        $query = Renungan::find();

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
            'tanggal' => $this->tanggal,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'ayat', $this->ayat])
            ->andFilterWhere(['like', 'perikop', $this->perikop])
            ->andFilterWhere(['like', 'konten', $this->konten]);

        return $dataProvider;
    }
}
