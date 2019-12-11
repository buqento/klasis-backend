<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wirausaha */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Kewirausahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wirausaha-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'biodata_id',
                'value' => function($data){
                    return $data->biodata->nama;
                }
            ],
            [
                'attribute' => 'kategori_usaha_id',
                'value' => function($data){
                    return $data->kategori->name;
                }
            ],
            [
                'attribute' => 'usaha_id',
                'value' => function($data){
                    return $data->usaha->name;
                }
            ],
        ],
    ]) ?>

</div>
