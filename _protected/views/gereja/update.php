<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gereja */

$this->title = 'Ubah Data';
$this->params['breadcrumbs'][] = ['label' => 'Gereja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gereja-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
