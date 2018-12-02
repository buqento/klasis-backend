<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */

$this->title = 'Update Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
