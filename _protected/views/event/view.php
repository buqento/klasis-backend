<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'jemaat_id',
                'value' => function($data) {
                    return $data->jemaat->nama_jemaat;
                }
            ],
            'judul',
            'tanggal_jam:datetime',
            'tempat',
            'keterangan:ntext',
            'created_at:datetime',
        ],
    ]) ?>

</div>
