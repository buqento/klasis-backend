<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usaha */

$this->title = 'Update Usaha';
$this->params['breadcrumbs'][] = ['label' => 'Usaha', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usaha-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
