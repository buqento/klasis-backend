<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usaha';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usaha-index">
    
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
                'attribute' => 'kategori_usaha_id',
                'value' => function($data){
                    return $data->kategori->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
