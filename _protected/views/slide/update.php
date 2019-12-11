<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slide */

$this->title = 'Update Slide';
$this->params['breadcrumbs'][] = ['label' => 'Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slide-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
