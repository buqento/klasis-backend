<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gereja */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Gereja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gereja-view">

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            [
                'attribute' => 'jemaat_id',
                'value' => function($data){
                    return $data->jemaat->nama_jemaat;
                }
            ],
            'created_at',
        ],
    ]) ?>

</div>
