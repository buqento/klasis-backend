<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MutiarapagiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mutiara Pagi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mutiarapagi-index">

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'tanggal_tampil:date',
            'konten:ntext',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
