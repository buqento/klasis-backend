<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BiodatapendetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biodata Pendeta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodatapendeta-index">

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            'tempat_lahir',
            'tanggal_lahir:date',
            'alamat',
            // 'jenis_kelamin',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
