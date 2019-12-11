<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ibadah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ibadah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibadah-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'pelayan_id',
                'value' => function($data){
                    return $data->pendeta->nama;
                }
            ],
            [
                'attribute' => 'gereja_id',
                'value' => function($data){
                    return $data->gereja->name;
                }
            ],
            'waktu',
            'deskripsi',
            // 'created_at',
        ],
    ]) ?>

</div>
