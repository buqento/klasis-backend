<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RenunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Renungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="renungan-index">

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'tanggal',
            'ayat',
            'perikop:ntext',
            // 'konten:ntext',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
