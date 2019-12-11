<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ibadah */

$this->title = 'Ubah Data';
$this->params['breadcrumbs'][] = ['label' => 'Ibadah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="ibadah-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
