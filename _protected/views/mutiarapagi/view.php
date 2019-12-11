<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mutiarapagi */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Mutiara Pagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mutiarapagi-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'tanggal_tampil:date',
            'konten:ntext',
            // 'created_at',
        ],
    ]) ?>

</div>
