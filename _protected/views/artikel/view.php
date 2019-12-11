<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'judul',
            // 'konten:ntext',
            [
                'attribute' => 'kategori_id',
                'value' => function($data) {
                    return $data->kategori->name;
                }
            ],
            'created_at:datetime',
        ],
    ]) ?>

</div>
