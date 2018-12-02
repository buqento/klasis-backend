<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BiodataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biodata Jemaat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-index">

    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_search', ['model' => $searchModel]) ?>
        </div>
    </div>
    <p>

        <?= Html::a('<i class="fa fa-plus"></i> Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            [
                'attribute' => 'jenis_kelamin',
                'value' => 
                    function($data)
                        {
                            switch ($data->jenis_kelamin) {
                                case 1:
                                    $jenis_kelamin = 'Laki-laki';
                                    break;
                                default:
                                    $jenis_kelamin = 'Perempuan';
                                    break;
                            }
                            return $jenis_kelamin;
                        }
            ], 
            'tempat_lahir',
            'tanggal_lahir:date',
            [
                'attribute' => 'golongan_id',
                'value' => function($data){
                    return $data->golongan->name;
                }
            ],
            [
                'attribute' => 'pendidikan_id',
                'value' => function($data) {
                    return $data->pendidikan->name;
                }
            ],
            // 'alamat',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
