<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Batch */

$this->title = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Import Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'file_import',
            'created_at',
        ],
    ]) ?>

</div>
