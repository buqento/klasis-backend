<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Biodatapendeta */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Biodata Pendeta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodatapendeta-view">

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'nama',
            'tempat_lahir',
            'tanggal_lahir:date',
            'alamat',
            // 'jenis_kelamin',
            // 'created_at',
        ],
    ]) ?>

</div>
