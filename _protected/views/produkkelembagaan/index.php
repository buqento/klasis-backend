<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdukkelembagaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produk Kelembagaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produkkelembagaan-index">

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
                'attribute' => 'kategori_id',
                'value' => function($data) {
                    return $data->kategori->name;
                }
            ],
            [
                'attribute' => 'jemaat_id',
                'value' => function($data) {
                    return $data->jemaat->nama_jemaat;
                }
            ],
            'nama_file',
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
