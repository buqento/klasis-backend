<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-index">

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'judul',
            // 'konten:ntext',
            [
                'attribute' => 'kategori_id',
                'value' => function($data) {
                    return $data->kategori->name;
                }
            ],
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
