<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produkkelembagaan */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Produk Kelembagaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produkkelembagaan-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'kategori_id',
                'value' => function($data) {
                    return $data->kategori->name;
                }
            ],
            [
                'attribute' => 'jemaat_id',
                'value' => function($data) {
                    return $data->jemaat->nama_jemaat;
                }
            ],
            'nama_file',
            'created_at:datetime',
        ],
    ]) ?>

</div>
