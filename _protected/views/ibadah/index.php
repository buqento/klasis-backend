<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IbadahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ibadah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibadah-index">

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'pelayan_id',
                'value' => function($data){
                    return $data->pendeta->nama;
                }
            ],
            [
                'attribute' => 'gereja_id',
                'value' => function($data){
                    return $data->gereja->name;
                }
            ],
            'waktu',
            'deskripsi',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
