<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jemaat */

$this->title = 'Update Jemaat';
$this->params['breadcrumbs'][] = ['label' => 'Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jemaat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
