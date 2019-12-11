<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Renungan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Renungan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="renungan-view">
    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'tanggal',
            'ayat',
            'perikop:ntext',
            'konten:ntext',
            // 'created_at',
        ],
    ]) ?>

</div>
