<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slides';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-index">

    <p>
        <?= Html::a('Tambah Slide', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'img_url:url',
            'description',       
            [
                'attribute' => 'show',
                'value' => function($data) {
                    if($data->show == 1){
                        $result = 'Ya';
                    }else{
                        $result = 'Tidak';
                    }
                    return $result;
                }
            ],
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
