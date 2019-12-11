<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Biodata */

$this->title = 'Update Biodata';
$this->params['breadcrumbs'][] = ['label' => 'Biodata', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biodata-update">
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
