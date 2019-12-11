<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Slide */
$this->title = 'Detail Slide';
$this->params['breadcrumbs'][] = ['label' => 'Slide', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="slide-view">
    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="col-md-3">
        <img class="img-thumbnail" src="<?= $model->img_url ?>">
    </div>
    <div class="col-md-9">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'description',
                // 'img_url:url',
                [
                    'attribute' => 'show',
                    'value' => function($data) {
                        if($data->show == 1){
                            $result = 'Ya';
                        }else{
                            $result = 'Tidak';
                        }
                        return $result;
                    }
                ],
                'created_at',
            ],
        ]) ?>
    </div>

</div>
