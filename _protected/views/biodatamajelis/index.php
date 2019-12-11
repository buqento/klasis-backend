<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BiodatamajelisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biodata Majelis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodatamajelis-index">

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
                'attribute' => 'jemaat_id',
                'value' => function($data) {
                    return $data->jemaat->nama_jemaat;
                }
            ],
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'jabatan',
            'alamat',
            'telepon',
            //'email:email',
            //'foto:ntext',
            [
                'attribute' => 'pendidikan_id',
                'value' => function($data) {
                    return $data->pendidikan->name;
                }
            ],
            'pekerjaan',
            //'keterangan',
            //'status_aktif',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
