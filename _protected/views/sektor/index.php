<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SektorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sektor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sektor-index">
    <p>
        <?= Html::a('Tambah Sektor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'jemaat_id',
                'value' => function($data) {
                    return $data->jemaat->nama_jemaat;
                }
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
