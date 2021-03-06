<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JemaatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-index">

    <p>
        <?= Html::a('Tambah Jemaat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama_jemaat',
            'nama_gereja',
            'alamat',
            'telepon',
            // 'email:email',
            //'gambar:ntext',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
