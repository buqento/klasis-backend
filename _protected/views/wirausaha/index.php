<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WirausahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kewirausahaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wirausaha-index">

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'biodata_id',
                'value' => function($data){
                    return $data->biodata->nama;
                }
            ],
            [
                'attribute' => 'kategori_usaha_id',
                'value' => function($data){
                    return $data->kategori->name;
                }
            ],
            [
                'attribute' => 'usaha_id',
                'value' => function($data){
                    return $data->usaha->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
