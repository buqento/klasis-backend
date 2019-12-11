<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GerejaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gereja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gereja-index">

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute' => 'jemaat_id',
                'value' => function($data){
                    return $data->jemaat->nama_jemaat;
                }
            ],
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
